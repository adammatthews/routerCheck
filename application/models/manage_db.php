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
    }
    
    function getClientIDs()
    {
         $query = $this->db->query('
            SELECT client.id, client.name
            FROM client
            ORDER BY client.name ASC
            '); 
        return  $query->result_array();
    }    

    function insert_client()
    {
        if(isset($_POST['insert_client'])){

            $data = array(
                           'name' => $this->input->post('inputClient')
                        );

            $this->db->insert('client', $data); 

        }  
        unset($_POST['insert_client']);       
    }
    
}    
?>