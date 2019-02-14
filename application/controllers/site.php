<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->home();
	}

	public function home()
	{
		if(mysqli_connect_errno()) {
		die("Database connection failed: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
			);
		}
		$query = 'SELECT * FROM `session` WHERE DATEDIFF(`start_date`, CURDATE()) > 0 ORDER BY `start_date` ASC LIMIT 7';
		$result = $this->db->query($query);

		$data['index'] = $result->result();
		$data['title'] = 'Home';

		$this->load->view('header', $data);
		$this->load->view('index', $data);
		$this->load->view('footer', $data);
	}

	public function findSession()
	{
		if(mysqli_connect_errno()) {
		die("Database connection failed: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
			);
		}

		$query = "SELECT * FROM session WHERE DATEDIFF(start_date, CURDATE()) > 0;";
		$result = $this->db->query($query);
		$data['sessions'] = $result->result();

		$data['title'] = 'Find a Session';
    $this->load->view('header', $data);
    $this->load->view('findSession', $data);
    $this->load->view('footer', $data);
	}
/*
	function get_search(){
		 $match = $this->input->post('search');
		 $this->db->like('session_title',$match);
		 $this->db->or_like('long_description',$match);
		 $this->db->or_like('trainer_name',$match);
		 $this->db->or_like('organizer_name',$match);
		 $query = $this->db->get('findSession');
		 return $query->result();
	}
*/
	public function contact()
	{
		if(mysqli_connect_errno()) {
		die("Database connection failed: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
			);
		}

				$query = "SELECT * FROM organizers;";
				$result = $this->db->query($query);
				$data['contact'] = $result->result();

				$data['title'] = 'Contact';
        $this->load->view('header', $data);
        $this->load->view('contact', $data);
        $this->load->view('footer', $data);
	}

	public function about()
	{
		if(mysqli_connect_errno()) {
		die("Database connection failed: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
			);
		}

		$data['title'] = 'About us';
        $this->load->view('header', $data);
        $this->load->view('about', $data);
        $this->load->view('footer', $data);
	}

	public function bookit ()
	{

		$data['title'] = "Book it now";
		$this->load->view('header', $data);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('surname', 'Surname','trim|required|min_length[0]|max_length[20]|callback_check_name');
		$this->form_validation->set_rules('givenname', 'Given Name','trim|required|min_length[0]|max_length[20]|callback_check_name');
		$this->form_validation->set_rules('gender', 'Gender','trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile Number','trim|required|min_length[8]|max_length[8]|callback_check_tel');
		$this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
		if ($this->form_validation->run()==FALSE){
			$this->load->view('bookIt');
		}else{
			$data['course'] = $this->input->post('course');
			$data['surname'] = $this->input->post('surname');
			$data['givenname'] = $this->input->post('givenname');
			$data['gender'] = $this->input->post('gender');
			$data['mobile'] = $this->input->post('mobile');
			$data['email'] = $this->input->post('email');
			$this->load->view('action', $data);
		}
			$this->load->view('footer', $data);
	}

	public function check_name($str){
		if (!preg_match("/^[a-zA-Z ]*$/", $str)){
			$this->form_validation->set_message('check_name', 'This is not valid!');
			return FALSE;
		}
		return TRUE;
	}

	public function check_tel($str){
		if (!(preg_match("/^[0-9]*$/", $str))){
			$this->form_validation->set_message('check_tel', 'This is not a valid phone number!');
			return FALSE;
		}
		return TRUE;
	}

	public function info()
	{
		if(mysqli_connect_errno()) {
			die("Database connection failed: " .
				mysqli_connect_error() .
				" (" . mysqli_connect_errno() . ")"
			);
		}
		$query = "SELECT * FROM trainers NATURAL JOIN schedule NATURAL JOIN session WHERE trainer_id='";
		$query .= $_GET['trainer_id']."';";
		$result = $this->db->query($query);
		$data['trainer'] = $result->row();
		$data['trainers'] = $result->result();
		$data['photoPath'] = '/booking/images/trainers/'.$data['trainer']->trainer_id.'.png'.'?v='.filemtime('images/trainers/'.$data['trainer']->trainer_id.'.png');

        $this->load->view('info', $data);
	}

	public function organizer()
	{
		if(mysqli_connect_errno()) {
			die("Database connection failed: " .
				mysqli_connect_error() .
				" (" . mysqli_connect_errno() . ")"
			);
		}
		$query = "SELECT * FROM organizers NATURAL JOIN session WHERE organizer_name LIKE '";
		$query .= $_GET['organizer_name']."';";
		$result = $this->db->query($query);
		$data['organizer'] = $result->row();
		$data['organizers'] = $result->result();

				$this->load->view('organizer', $data);
	}

	public function venue()
	{
		if(mysqli_connect_errno()) {
			die("Database connection failed: " .
				mysqli_connect_error() .
				" (" . mysqli_connect_errno() . ")"
			);
		}
		$query = "SELECT * FROM venue NATURAL JOIN session WHERE venue LIKE '";
		$query .= $_GET['venue']."';";
		$result = $this->db->query($query);
		$data['venue'] = $result->row();
		$data['venues'] = $result->result();

				$this->load->view('venue', $data);
	}

	public function details()
	{
		if(mysqli_connect_errno()) {
			die("Database connection failed: " .
				mysqli_connect_error() .
				" (" . mysqli_connect_errno() . ")"
			);
		}

		$query = "SELECT * FROM session NATURAL JOIN venue LEFT JOIN schedule ON schedule.course_code = session.course_code LEFT JOIN trainers ON schedule.trainer_id = trainers.trainer_id WHERE session.course_code='";
		$query .= $_GET['course_code']."'";
		$result = $this->db->query($query);

		$data['session'] = $result->row();
		$data['sessions'] = $result->result();
    $this->load->view('details', $data);
	}

	public function action()
	{
		if(mysqli_connect_errno()) {
			die("Database connection failed: " .
				mysqli_connect_error() .
				" (" . mysqli_connect_errno() . ")"
			);
		}


		$data['title'] = 'Loading';

		$this->load->view('header', $data);
		$this->load->view('action', $data);
		$this->load->view('footer', $data);

	}

}
