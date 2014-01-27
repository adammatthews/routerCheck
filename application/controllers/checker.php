<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller which is currently called from CRON to check the routers.
 */
class Checker extends CI_Controller {
    
    public function go()
    {
            $this->load->model('checkModel');
            $this->checkModel->runChecks();
    }
    
}
