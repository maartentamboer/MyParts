<?php if (!defined('BASEPATH')) die();
class Parts extends Main_Controller {
	
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
            if (!$this->ion_auth->logged_in())
	    {
			//redirect them to the login page
	 		redirect('auth/login', 'refresh');
	    }
            $this->load->database();
            $this->load->library('table');
            $this->db->select('*');    
            $this->db->from('Components');
            $this->db->join('Categories', 'Components.Categories_id = Categories.id');
            $this->db->join('Manufacturers', 'Components.Manufacturers_id = Manufacturers.id');
            $this->db->join('Footprints', 'Components.Footprints_id = Footprints.id');
            $this->db->join('Distributors', 'Components.Distributors_id = Distributors.id');
            $this->db->order_by("Components.Comp_id", "asc");
            $query = $this->db->get();
            foreach ($query->result() as $row)
            {
                $this->table->add_row($row->Comp_id, $row->Cat_name, $row->Nam, $row->Description, $row->Location, $row->Quantity, $row->Datasheet, $row->Manuf_name, $row->Footp_name, $row->Dist_name);
            }
            $tmpl = array (
                                'table_open'          => '<table id="voorbeeld_table" class="table table-striped">',

                                'heading_row_start'   => '<tr>',
                                'heading_row_end'     => '</tr>',
                                'heading_cell_start'  => '<th>',
                                'heading_cell_end'    => '</th>',

                                'row_start'           => '<tr>',
                                'row_end'             => '</tr>',
                                'cell_start'          => '<td>',
                                'cell_end'            => '</td>',

                                'row_alt_start'       => '<tr>',
                                'row_alt_end'         => '</tr>',
                                'cell_alt_start'      => '<td>',
                                'cell_alt_end'        => '</td>',

                                'table_close'         => '</table>'
                          );

            $this->table->set_template($tmpl);
            $this->table->set_heading('ID', 'Category', 'Name', 'Description', 'Location', 'Quantity', 'Datasheet', 'Manufacturer', 'Footprint', 'Distributor', 'Edit');
            //$this->tabledata =  $this->table->generate($query);
            $this->topage["tabledata"] = $this->table->generate();
            $this->_render('table', $this->topage);
	}

	public function testdb()
	{
            if (!$this->ion_auth->logged_in())
	    {
			//redirect them to the login page
	 		redirect('auth/login', 'refresh');
	    }
            $this->load->database();
            $this->load->library('table');
            //$query = $this->db->query("SELECT * FROM Components");
            $this->db->select('*');    
            $this->db->from('Components');
            $this->db->join('Categories', 'Components.Categories_id = Categories.id');
            $this->db->join('Manufacturers', 'Components.Manufacturers_id = Manufacturers.id');
            $this->db->join('Footprints', 'Components.Footprints_id = Footprints.id');
            $this->db->join('Distributors', 'Components.Distributors_id = Distributors.id');
            $this->db->order_by("Components.Comp_id", "asc");
            $query = $this->db->get();
            $this->table->set_heading('ID', 'Name', 'Description', 'Location', 'Quantity', 'Datasheet', 'Category', 'Manufacturer', 'Footprint', 'Distributor', 'Edit');
            $ar = array();
            foreach ($query->result() as $row)
            {
                $this->table->add_row($row->Comp_id, $row->Nam, $row->Description, $row->Location, $row->Quantity, $row->Datasheet, $row->Cat_name, $row->Manuf_name, $row->Footp_name, $row->Dist_name);
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
                //var_dump($row);
                //echo "<br/>";
            }
            //echo $this->table->generate();
            //echo "<br/>";
            echo json_encode($ar);
	}
   
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
