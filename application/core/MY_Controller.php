<?php
class MY_Controller extends CI_Controller
{

    protected $pageName = FALSE;

   function __construct()
   {
      parent::__construct();

      $this->pageName = strToLower(get_class($this));
   }


    protected function _render($view, $vars)
    {
        $vars["pageName"] = $this->pageName;
        $this->load->view('include/header');
        $this->load->view('include/navbar',$vars);
        $this->load->view($view, $vars);
        $this->load->view('include/footer');
    }

}
