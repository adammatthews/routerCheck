<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
     function __construct()
    {
        parent::__construct();
        $this->load->model('manage_db');
        $this->load->helper('form');        
    }
        
    public function index()
    {
            $head['title'] = "Router Check - Nova IT Solutions";
                    
            $this->load->view('template/head', $head);
            $this->load->view('template/nav_left');       
            $this->load->view('admin/home');
            $this->load->view('template/footer');            
    }
    
    public function addClient()
    {
            $head['title'] = "Add Client - Router Check - Nova IT Solutions";
                  

            $this->load->view('template/head', $head);
            $this->load->view('template/nav_left');  
            $this->manage_db->insert_client();     
            $this->load->view('admin/clientAdd');
            $this->load->view('template/footer');            
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */