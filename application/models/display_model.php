<?php
/**
 * Display Model - controlls getting and checking of Router details
 * @Author  Adam Matthews
 * @Date    15/10/13
 * 
 * 
 * Controls getting the data from the database for displaying on the site
 */
class Display_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    /**
     * Get all Routers with client / site details
     * @return type
     */
    function getRouters()
    {
        //query to select a line per router, grabs in the site / client info.
        $query = $this->db->query('
            SELECT router.id AS router_id, router.url, client.name AS client_name, client.details AS details, site.name AS site_name, router.note
            FROM router
            RIGHT JOIN  `site` ON router.site_id = site.id
            LEFT JOIN  `client` ON site.client_id = client.id
            ORDER BY client_name ASC
            '); 
        return $query;
    }
    
    function getLastResponses()
    {
        $count = $this->getRouters()->num_rows();
        $query = $this->db->query('SELECT * 
            FROM  `response` 
            ORDER BY TIMESTAMP DESC 
            LIMIT '.$count.'');
        return $query;
    }
    
    function getLastAck($id)
    {
        $query = $this->db->query('
            SELECT * 
            FROM  `response` 
            WHERE type = 1 
            AND router_id = '.$id.'
            ORDER BY TIMESTAMP DESC 
            LIMIT 1'
                );
        return $query;
    }
    
    function getRouterOverview()
    {
        $routers = $this->getRouters()->result(); //grab a list of routers
        $responses = $this->getLastResponses()->result_array(); //grab the last responses
                
        $new = array(); //empty array to start with
        
        foreach($routers as $row){
            //for each router
            // Get last response for this router
            // If its offline, get the last online reponse for reference
            // If online, put latest timestamp in array
            // populate new array with Router Details for display
           $key = $this->searchForId($row->router_id, $responses); 
           if($responses[$key]['type'] == false){ //IF WE HAVE AN OFFLINE ROUTER
                $ack = $this->getLastAck($row->router_id)->result(); //get last ack from db
                $timestamp = $ack[0]->timestamp;
           }
           else{
               $timestamp = $responses[$key]['timestamp'];
           };

           $ping = $responses[$key]['ping']*10000; //convert seconds to MS


           array_push($new,
              array(
                    "router_id" => $row->router_id,
                    "details" => $row->details,
                    "client_name" => $row->client_name,
                    "site_name" => $row->site_name,
                    "status_name" => $responses[$key]['type'],
                    "url" => $row->url,
                    "timestamp" => $timestamp,
                    "code" => $this->getHTMLCode( (int)$responses[$key]['code']),
                    "ping" => (int)$ping)
              );
        }


// with a little help from http://stackoverflow.com/questions/3232965/sort-multidimensional-array-by-multiple-keys
        # get a list of sort columns and their data to pass to array_multisort
        $sort = array();
        foreach($new as $k=>$v) {
            $sort['client_name'][$k] = $v['client_name'];   
            $sort['status_name'][$k] = $v['status_name'];
            $sort['site_name'][$k] = $v['site_name'];
        }
        # sort by event_type desc and then title asc
        array_multisort($sort['status_name'], SORT_ASC, $sort['client_name'], SORT_ASC, $sort['site_name'], SORT_ASC,$new);

        return $new; //return array sorted by fails then alphabetical
    }



    //helper to map a response router ID to the router table ID's
    function searchForId($id, $array)
    {
        foreach ($array as $key => $val) {
            if ($val['router_id'] === $id) {
                return $key;
            }
        }
        return null;
    }


    // Map HTML Response codes to descriptions
    function getHTMLCode($code)
    {

        $http_codes = array(
            0 => 'Offline (No Response at all)',
            100 => 'Continue',
            101 => 'Switching Protocols',
            102 => 'Processing',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            207 => 'Multi-Status',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => 'Switch Proxy',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            418 => 'I\'m a teapot',
            422 => 'Unprocessable Entity',
            423 => 'Locked',
            424 => 'Failed Dependency',
            425 => 'Unordered Collection',
            426 => 'Upgrade Required',
            449 => 'Retry With',
            450 => 'Blocked by Windows Parental Controls',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            506 => 'Variant Also Negotiates',
            507 => 'Insufficient Storage',
            509 => 'Bandwidth Limit Exceeded',
            510 => 'Not Extended'
        );
        return $code." - ".$http_codes[$code];
    }
 
}

?>
