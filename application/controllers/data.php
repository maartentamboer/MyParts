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
		$urlfront = "<a target=\"_blank\" href=\"";
		$urlrear = "\">Link</a>";
		foreach ($query->result() as $row)
		{
			$datasheet = "";
			if(!empty($row->Datasheet))
			{
				$datasheet = $urlfront.$row->Datasheet.$urlrear;
			}
			$temp = array(
					'id' => $row->Comp_id,
					'category' => $row->Cat_name,
					'name' => $row->Nam,
					'description' => $row->Description,
					'location' => $row->Location,
					'quantity'=> $row->Quantity,
					'datasheet' => $datasheet,
					'footprint' => $row->Footp_name,
					'edit' => ""
			);
			array_push($ar, $temp);
		}
		echo json_encode($ar);
	}

	public function get_component()
	{
		$this->load->database();
		if($this->input->post("idval", TRUE))
		{
			$idval =  $this->input->post("idval", TRUE);
			$query = $this->db->get_where('Components', array('Comp_id' => $idval), 1);
			$data = $query->result();
			echo json_encode($data);
		}
		else
		{
			show_error("Only Post allowed", 403);
		}
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
			$Comp_id = $data["Comp_id"];
			$this->db->where('Comp_id', $Comp_id);
			unset($data['Comp_id']);
			$this->db->update('Components', $data);
			//echo "ID: ".$Comp_id;
			//echo var_dump($data);
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

  //functions for management code

	public function management_get_categories()
	{
		$sql = 'SELECT * FROM Categories';
		$query = $this->db->query($sql);
		$ar = array();
		foreach ($query->result() as $row)
		{
			$temp = array(
					'id' => $row->id,
					'name' => $row->Cat_name,
					'edit' => ""
			);
			array_push($ar, $temp);
		}
		echo json_encode($ar);
	}

	public function management_get_affected_from_cat()
	{
		if($this->input->post("cat_id", TRUE))
		{
			$cat_id =  $this->input->post("cat_id", TRUE);
			$this->load->library('table');
			//$cat_id =  $this->input->post("idval", TRUE);
			$this->db->select('Comp_id, Nam');
			$querycnt = $this->db->get_where('Components', array('Categories_id'=>$cat_id));
			$numbercomp = $querycnt->num_rows();
			$query = $this->db->get_where('Components', array('Categories_id' => $cat_id), 10);
			foreach ($query->result() as $row)
			{
				$this->table->add_row($row->Comp_id, $row->Nam, $row->Description);
			}
			$tmpl = array ('table_open'          => '<table class="table table-striped">');
			$this->table->set_template($tmpl);
			$this->table->set_heading('ID', 'Name', 'Description');
			$tabl = $this->table->generate();
			$ar = array(
					'number' => $numbercomp,
					'table' => $tabl
			);
			echo json_encode($ar);
		}
		else
		{
			show_error("Only Post allowed", 403);
		}
	}

	public function management_get_manufacturers()
	{
		$sql = 'SELECT * FROM Manufacturers';
		$query = $this->db->query($sql);
		$ar = array();
		foreach ($query->result() as $row)
		{
			$temp = array(
					'id' => $row->id,
					'name' => $row->Manuf_name,
					'edit' => ""
			);
			array_push($ar, $temp);
		}
		echo json_encode($ar);
	}

	public function management_delete_category()
	{
		if($this->input->post("cat_id", TRUE))
		{
			//First set all the components that have this cat_id to 1
			//TODO Check id cat_id==1 then skip or throw error.
			$cat_id =  $this->input->post("cat_id", TRUE);
			$this->db->where('Categories_id', $cat_id);
			$this->db->set('Categories_id', 1, FALSE);
			$this->db->update('Components');
			//Now remove the category
			$cat_id =  $this->input->post("cat_id", TRUE);
			$this->db->where('id', $cat_id);
			$this->db->delete('Categories');
		}
		else
		{
			show_error("Only Post allowed", 403);
		}
	}

	public function management_add_category()
	{
		if($this->input->post("Cat_name", TRUE))
		{
			//TODO implement checking if the name allready exists
			$data = $this->input->post(NULL, TRUE);
			$this->db->insert('Categories', $data);
		}
		else
		{
			show_error("Only Post allowed", 403);
		}
	}


}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
