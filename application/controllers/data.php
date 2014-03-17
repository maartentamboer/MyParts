<?php if (!defined('BASEPATH')) die();
class Data extends Main_Controller {
	
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
            redirect('/', 'refresh');
	}
    public function get_categories()
	{	
            $sql = 'SELECT * FROM Categories';
            $query = $this->db->query($sql);
            echo json_encode($query->result());
	}
    public function get_manufacturers()
	{	
            $sql = 'SELECT * FROM Manufacturers';
            $query = $this->db->query($sql);
            echo json_encode($query->result());
	}
     public function get_distributors()
	{	
            $sql = 'SELECT * FROM Distributors';
            $query = $this->db->query($sql);
            echo json_encode($query->result());
	}
     public function get_footprints()
	{	
            $sql = 'SELECT * FROM Footprints';
            $query = $this->db->query($sql);
            echo json_encode($query->result());
	}
        
     	public function get_components()
	{
            $this->load->database();
            //$query = $this->db->query("SELECT * FROM Components");
            $this->db->select('*');    
            $this->db->from('Components');
            $this->db->join('Categories', 'Components.Categories_id = Categories.id');
            $this->db->join('Manufacturers', 'Components.Manufacturers_id = Manufacturers.id');
            $this->db->join('Footprints', 'Components.Footprints_id = Footprints.id');
            $this->db->join('Distributors', 'Components.Distributors_id = Distributors.id');
            $this->db->order_by("Components.Comp_id", "asc");
            $query = $this->db->get();
            $ar = array();
            foreach ($query->result() as $row)
            {
                $temp = array(
                    'id' => $row->Comp_id,
                    'category' => $row->Cat_name,
                    'name' => $row->Nam,
                    'description' => $row->Description,
                    'location' => $row->Location,
                    'quantity'=> $row->Quantity,
                    'datasheet' => $row->Datasheet,
                    'manufacturer' => $row->Manuf_name,
                    'footprint' => $row->Footp_name,
                    'distributor' => $row->Dist_name,
                    'edit' => ""
                );
                array_push($ar, $temp);
            }
            echo json_encode($ar);
	}
        
     public function add_component()
	{	
            if (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
            {
                return show_404();
	    }
            else
            {
                //echo var_dump($this->input->post(NULL, TRUE)); // returns all POST items with XSS filter 
                $data = $this->input->post(NULL, TRUE);
                $this->db->insert('Components', $data); 
            }
	}
     public function change_component()
	{	
            if (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
            {
                return show_404();
	    }
            else
            {
                //echo var_dump($this->input->post(NULL, TRUE)); // returns all POST items with XSS filter 
                $data = $this->input->post(NULL, TRUE);
                echo var_dump($data);
                //$this->db->insert('Components', $data); 
            }
	}
     public function incr_component()
        {
            if (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
            {
                   return show_404();
            }
            else 
            {
                if($this->input->post("idval", TRUE))
                {
                    $idval =  $this->input->post("idval", TRUE);
                    $this->db->where('Comp_id', $idval);
                    $this->db->set('Quantity', 'Quantity+1', FALSE);
                    $this->db->update('Components');
                }
                else
                {
                    show_error("Only Post allowed", 403);
                }
            } 
        }
      public function decr_component()
        {
            if (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
            {
                   return show_404();
            }
            else 
            {
                if($this->input->post("idval", TRUE))
                {
                    $idval =  $this->input->post("idval", TRUE);
                    $this->db->where('Comp_id', $idval);
                    $this->db->set('Quantity', 'Quantity-1', FALSE);
                    $this->db->update('Components');
                }
                else
                {
                    show_error("Only Post allowed", 403);
                }
            } 
        }
     public function delete_component()
        {
            if (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
            {
                   return show_404();
            }
            else 
            {
                if($this->input->post("idval", TRUE))
                {
                    $idval =  $this->input->post("idval", TRUE);
                    $this->db->where('Comp_id', $idval);
                    $this->db->delete('Components'); 
                }
                else
                {
                    show_error("Only Post allowed", 403);
                }
            } 
        }
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
