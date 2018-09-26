<?php 

class Shrink extends CI_Controller {

	public function index(){

		$this->load->view('shrink/shrink_view');

	}

	public function insert(){
		$this->load->model('shrink_model');
		$data = array(
		'url' => $this->input->post('url'),
		'short' => uniqid()
		);
		$this->shrink_model->insert($data);

		$data_send['url'] = $data['short'];
		$this->load->view('shrink/shrink_view', $data_send);

	}

	public function a($short)
	{
		$this->load->model('shrink_model');
		$url = $this->shrink_model->get($short);

		$data_url['send'] = $url;
		$this->load->view('shrink/shrink_view', $data_url);

	}


}

 ?>