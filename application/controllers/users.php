<?php 

class Users extends CI_Controller {

	// public function index($user_id){

	// 	// $this->load->model('user_model');
	// 	$data['result'] = $this->user_model->get_users($user_id);

	// 	// $data['welcome'] = "welcome mn sdf d";

	// 	$this->load->view('user_view',$data);

	// 	// foreach ($result as $results) {
	// 	// 	echo $results->id . "  -  ";
	// 	// 	echo $results->username . "  -  ";
	// 	// 	echo $results->password;
	// 	// 	echo "<br>";
	// 	// }

	// }

	public function register()
	{
		//validations
		$this->form_validation->set_rules('firstname','First Name','trim|required|min_length[3]');
		$this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[3]');
		$this->form_validation->set_rules('email','Email','trim|required|min_length[3]');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
		$this->form_validation->set_rules('comfirm_password','Comfirm Password','trim|required|min_length[3]|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$data['main_view'] = "users/register_view";
			$this->load->view('layouts/main',$data);
		} else {

			if ($this->user_model->register_user()) {
				$this->session->set_userdata('reg_success','You are successfully registered');
				redirect('home');
			} else {

			}
		}

		
	}

	public function login(){

		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
		$this->form_validation->set_rules('comfirm_password','Comfirm Password','trim|required|min_length[3]|matches[password]');

		if ($this->form_validation->run() == FALSE){
			$data = array('errors' => validation_errors() );

			$this->session->set_flashdata($data);

			redirect('home');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user_id = $this->user_model->login_user($username , $password);

			if ($user_id) {

				$user_data = array('user_id' => $user_id,'username' => $username,'logged_in' => true );

				$this->session->set_userdata($user_data);
				$this->session->set_userdata('login_success','You are now Logged In');

				redirect('home/index');
			} else {
				$this->session->set_userdata('login_unsuccess','You are not Logged In');
				redirect('home/index');

			}
		}

		// echo $this->input->post('username');	

		// $username =	$_POST['username'];
		// $password =	$_POST['password'];

		// echo "Usernamr = " . $username . "<br>";
		// echo "Password = " . $password;

	}

	public function logout() {

		$this->session->sess_destroy();

		redirect('home');

	}

}

?>