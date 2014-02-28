<?php
/**
 * Manage Database - add / update client, router details etc
 * @Author  Adam Matthews
 * @Date    30/10/13
 * 
 * 
 * Controls getting the data from the database for displaying on the site
 */
class Manage_db extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('form');
    }
    
    function getClientIDs()
    {

        $this->db->select('id, name');
        $query = $this->db->get('client');
        return $query->result();
    }    

    function getClientSites()
    {
        $query = $this->db->query('
            SELECT client.name as client_name, site.name as site_name, site.id
            FROM client, site
            WHERE site.client_id = client.id
            ORDER BY client_name ASC
            ');
        return $query->result();
    }


    // function insert_client()
    // {
    //     if(!empty($this->input->post('inputClient'))) {
    //         $data = array(
    //                        'name' => $this->input->post('inputClient'),
    //                        'details' => $this->input->post('inputLink')
    //                     );
    //         $this->db->insert('client', $data);
    //         return "Done!"; 
    //     }
    // }

    // function insert_site()
    // {
    //     if(!empty($this->input->post('site_name'))){
    //         $site = array(
    //                        'client_id' => $this->input->post('client_id'),
    //                        'name' => $this->input->post('site_name')
    //                     );
    //         $this->db->trans_start();
    //         $this->db->insert('site', $site);
           
    //         $site_id = $this->db->insert_id();

    //         $router = array(
    //                         'site_id' => $site_id,
    //                         'url' => $this->input->post('router_url'),
    //                         'note' => $this->input->post('router_note')
    //                     );
    //         $this->db->insert('router', $router);

    //         $this->db->trans_complete();
    //         return "Done"; //TODO not a good response 
    //     }
    // }

    // function insert_monitor()
    // {
    //     if(!empty($this->input->post('router_url')))
    //     {
    //        $router = array(
    //                         'site_id' => $this->input->post('site_id'),
    //                         'url' => $this->input->post('router_url'),
    //                         'note' => $this->input->post('router_note')
    //                     );
    //         $this->db->insert('router', $router);
    //         return "Done"; 
    //     }
    //     return "None";
    // }
    
}    
?>