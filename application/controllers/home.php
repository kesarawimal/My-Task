<?php 

class Home extends CI_Controller {

	public function index(){
		$data['tasks'] = $this->task_model->get_user_tasks($this->session->userdata('user_id'));
		$data['projects'] = $this->project_model->get_user_projects($this->session->userdata('user_id'));
		$data['main_view'] = "home_view";

		$this->load->view('layouts/main', $data);

	}

	
}

?>