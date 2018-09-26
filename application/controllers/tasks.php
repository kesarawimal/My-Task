<?php 

class Tasks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			$this->session->set_userdata('no_access','You are NOT allow to access! Please login');
			redirect('home/index');
		}
	}
	

	public function index(){

		$data['tasks'] = $this->task_model->get_user_tasks($this->session->userdata('user_id'));

		$data['main_view'] = "Projects/task_view";

		$this->load->view('layouts/main', $data);

	}

	public function view($task_id){
		$data['task_data'] = $this->task_model->get_task($task_id);
		$data['main_view'] = "Projects/task";

		$this->load->view('layouts/main', $data);

	}

	public function create($project_id)
	{
		//validations
		$this->form_validation->set_rules('task_name','Task Name','trim|required');
		$this->form_validation->set_rules('task_body','Task Description','trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main_view'] = "projects/create_task";
			$this->load->view('layouts/main',$data);
		} else {
			$data = array(
				'tast_project_id' => $project_id,
				'task_date' => date("Y-m-d", strtotime($this->input->post('task_date'))), 
				'task_name' => $this->input->post('task_name'), 
				'task_body' => $this->input->post('task_body') 
			);
			if ($this->task_model->create_task($data)) {
				$this->session->set_userdata('task_create','Your task has successfully created');
				redirect('projects/display/' . $project_id);
			} else {

			}
		}
	}

	public function edit($task_id,$project_id)
	{
		//validations
		$this->form_validation->set_rules('task_name','Task Name','trim|required');
		$this->form_validation->set_rules('task_body','Task Description','trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['task_data'] = $this->task_model->get_task($task_id);
			$data['main_view'] = "projects/edit_task";
			$this->load->view('layouts/main',$data);
		} else {
			$data = array(
				'task_id' => $task_id,
				'task_date' => date("Y-m-d", strtotime($this->input->post('task_date'))), 
				'task_name' => $this->input->post('task_name'), 
				'task_body' => $this->input->post('task_body')
			);
			if ($this->task_model->edit_task($data)) {
				$this->session->set_userdata('task_update','Your task has been successfully updated');
				redirect('projects/display/' .$project_id);
			} else {

			}
		}
	}

	public function delete($task_id,$project_id)
	{
		if ($this->task_model->delete_task($task_id)) {
			$this->session->set_userdata('task_delete','Your task has been successfully deleted');
			redirect('projects/display/' .$project_id);
		} else {
			$data['main_view'] = "projects/display";
			$this->load->view('layouts/main',$data);
		}
	}

	public function completed($task_id,$project_id,$status)
	{
		if ($this->task_model->completed_task($task_id,$status)) {
			if ($status == 1) {
				$this->session->set_userdata('task_complete','Your task has been successfully marked as completed');
			} else {
				$this->session->set_userdata('task_not_complete','Your task has been successfully marked as not completed');
			}
			redirect('projects/display/' .$project_id);
		} else {
			$data['main_view'] = "projects/display";
			$this->load->view('layouts/main',$data);
		}
	}

}
?>