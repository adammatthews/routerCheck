<?php
/**
 * Check Model - main logic to undertake the checks
 * @Author  Adam Matthews
 * @Date    15/10/13 (last update 05/12/13)
 * 
 * 
 * Controls getting the data from the database for displaying on the site
 */
class checkModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
        
    /**
     * Undertake the main router check - UNDERLYING LOGIC!!!
     * @param type $router //built URL with Port etc
     * @param type $id //router_id
     * @return boolean
     */
    function check($router, $id)
    {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $router);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5); //3 second timeout on a check
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//don't echo the curl output
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); //ensure we can curl into an HTTPS router
      curl_setopt($ch, CURLOPT_HEADER, 1);  //get headers only to speed things up
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); //added after error returning 0 on tuxmail.
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

      $c = curl_exec($ch);  //exec the curl command
      $code = curl_getinfo($ch, CURLINFO_HTTP_CODE); //grab the Response code
      $ping = curl_getinfo($ch, CURLINFO_CONNECT_TIME); //grab the ping value

      $reply = Array('code'=> $code,'ping'=> $ping);
      curl_error($ch);
      // print_r($reply);
      // echo $router;
      return $reply;
    }  
   
     /**
     * Undertake the router checks, called from the checker controller under CRON
     */
    function runChecks()
    {
        //call the get routers from the display model
        $CI =& get_instance();
        $CI->load->model('display_model');
        $data = $CI->display_model->getRouters()->result();
        foreach ($data as $row)
            {
                $id = $row->router_id;
                $url = $row->url;
                $response = $this->check($url, $id);
                $code = $response["code"];                
                $i = 0;
                $a = 0;
                $limit = 1; //amount of times to re-check
                while($i < 1){
                    if($code < "404" && $response["code"] > 0) {
                      //This is a check pass. No errors here.
                        $this->storeResponse($id, True, $response['ping'], $code);
                        $i++;
                    }
                    else if($a < $limit && $response["code"] >= "404") {
                        //check again if we have a fail - just to make sure
                        $response = $this->check($url, $id);
                        $code = $response['code'];
                        $a++;
                    }
                    else{
                        //if check fail, store failure response.
                        $this->storeResponse($id, False, $response['ping'], $code);
                        $i++;
                    } 
                }
            };   
    }
    
    /**
     * Store the response in the database
     * @param type $id
     * @param type $ack_type
     */
    function storeResponse($id, $ack_type, $ping, $code)
    {
        $data = array('router_id' => $id, 'type' => $ack_type, 'ping' => $ping, 'code' => $code);
        $this->db->insert('response', $data);  
    }
    
}    
?>