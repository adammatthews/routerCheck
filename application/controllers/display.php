<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Display extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }
        
    public function index()
    {
            $data['routers'] = $this->Display_model->getRouterOverview();           
            $head['refresh'] = 60;
            $head['title'] = "Router Check - Nova IT Solutions";
                    
            $this->load->view('template/head', $head);
            $this->load->view('template/nav_left');       
            $this->load->view('router_overview', $data);
            $this->load->view('template/footer');           
    }
    
    public function outages()
    {
            $head['title'] = "Outages - Router Check - Nova IT Solutions";
                    
            $router_id = $this->input->get('router', TRUE);
            
            
            
            $this->load->view('template/head', $head);
            $this->load->view('template/nav_left');       
            $this->load->view('outages', $data);
            $this->load->view('template/footer');           
    }    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */