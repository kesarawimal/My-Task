<?php 

class Projects extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			$this->session->set_userdata('no_access','You are NOT allow to access! Please login');
			redirect('home/index');
		}
	}
	

	public function index(){

		$data['projects'] = $this->project_model->get_user_projects($this->session->userdata('user_id'));

		$data['main_view'] = "Projects/index";

		$this->load->view('layouts/main', $data);

	}

	public function display($project_id){
		$data['tasks_data'] = $this->task_model->get_project_tasks($project_id);
		$data['project_data'] = $this->project_model->get_project($project_id);
		$data['main_view'] = "Projects/display";

		$this->load->view('layouts/main', $data);

	}

	public function create()
	{
		//validations
		$this->form_validation->set_rules('project_name','Project Name','trim|required');
		$this->form_validation->set_rules('project_body','Project Description','trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main_view'] = "projects/create_project";
			$this->load->view('layouts/main',$data);
		} else {
			$data = array(
				'project_user_id' => $this->session->userdata('user_id'),
				'project_name' => $this->input->post('project_name'), 
				'project_body' => $this->input->post('project_body') 
			);
			if ($this->project_model->create_project($data)) {
				$this->session->set_userdata('project_create','Your project has successfully created');
				redirect('projects/index');
			} else {

			}
		}
	}

	public function edit($project_id)
	{
		//validations
		$this->form_validation->set_rules('project_name','Project Name','trim|required');
		$this->form_validation->set_rules('project_body','Project Description','trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['project_data'] = $this->project_model->get_project($project_id);
			$data['main_view'] = "projects/edit_project";
			$this->load->view('layouts/main',$data);
		} else {
			$data = array(
				'id' => $project_id,
				'project_user_id' => $this->session->userdata('user_id'),
				'project_name' => $this->input->post('project_name'), 
				'project_body' => $this->input->post('project_body') 
			);
			if ($this->project_model->edit_project($data)) {
				$this->session->set_userdata('project_update','Your project has been successfully updated');
				redirect('projects/index');
			} else {

			}
		}
	}

	public function delete($project_id)
	{
		if ($this->project_model->delete_project($project_id)) {
			$this->session->set_userdata('project_delete','Your project has been successfully deleted');
			redirect('projects/index');
		} else {
			$data['main_view'] = "projects/create_project";
			$this->load->view('layouts/main',$data);
		}
	}

}
?>