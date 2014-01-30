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
                
            $data['data'] = $this->manage_db->insert_client();

            $this->load->view('template/head', $head);
            $this->load->view('template/nav_left');  
            $this->load->view('admin/clientAdd', $data);
            $this->load->view('template/footer');            
    }

    public function addMonitor()
    {
            $head['title'] = "Add Monior - Router Check - Nova IT Solutions";

            $data['router'] = $this->manage_db->insert_monitor();
            $data['sites'] = $this->manage_db->getClientSites();

            $this->load->view('template/head', $head);
            $this->load->view('template/nav_left');  
            $this->load->view('admin/monitorAdd', $data);
            $this->load->view('template/footer');            
    }

    public function addSite()
    {
            $head['title'] = "Add Monior - Router Check - Nova IT Solutions";

            $data['data'] = $this->manage_db->insert_site();
            $data['clients'] = $this->manage_db->getClientIDs();
            $this->load->view('template/head', $head);
            $this->load->view('template/nav_left');  
            $this->load->view('admin/siteAdd', $data);
            $this->load->view('template/footer');            
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */