<?php if (!defined('BASEPATH')) die();
class About extends Main_Controller {
	
        protected $topage;
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');

		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ?
		$this->load->library('mongo_db') :

		$this->load->database();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->helper('language');
                if (!$this->ion_auth->logged_in())
	  	{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
	  	}
                        $id = $this->ion_auth->get_user_id();
            $query = $this->db->get_where('users', array('id' => $id), 1);
            $ret = $query->row();
            $this->username = $ret->first_name." ".$ret->last_name;
            $this->topage["username"] = $this->username;
	}
    
    public function index()
	{	
            $this->_render('about', $this->topage);
	}
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
