<?php 

class Task_model extends CI_Model	
{
	// public function get_projects()
	// {
	// 	$query = $this->db->get('projects');
	// 	return $query->result();
	// }

	public function get_project_tasks($id)
	{
		$this->db->where(['tast_project_id' => $id]);
		$query = $this->db->get('tasks');
		if ($query->num_rows() > 0) {
		    return $query->result();
		} else {
		    return FALSE;
		}
	}

	public function get_task($id)
	{
		$this->db->where(['task_id' => $id]);
		$query = $this->db->get('tasks');
		return $query->row();
	}

	public function create_task($data)
	{
		if ($this->db->insert("tasks", $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_task($data)
	{
		$this->db->where(['task_id' => $data['task_id']]);
		if ($this->db->update("tasks", $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function completed_task($id,$status)
	{
		$this->db->set('status', $status);
		$this->db->where(['task_id' => $id]);
		if ($this->db->update("tasks")) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function delete_task($data)
	{
		$this->db->where(['task_id' => $data]);
		if ($this->db->delete("tasks")) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_user_tasks($id)
	{
		$this->db->where(['project_user_id' => $id]);
		$this->db->join('tasks', 'projects.id = tasks.tast_project_id', 'LEFT');
		$query = $this->db->get('projects');
		if ($query->num_rows() > 0) {
		    return $query->result();
		} else {
		    return FALSE;
		}
	}


}
?>