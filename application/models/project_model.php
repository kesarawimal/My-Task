<?php 

class Project_model extends CI_Model	
{
	// public function get_projects()
	// {
	// 	$query = $this->db->get('projects');
	// 	return $query->result();
	// }

	public function get_user_projects($id)
	{
		$this->db->where(['project_user_id' => $id]);
		$query = $this->db->get('projects');
		if ($query->num_rows() > 0) {
		    return $query->result();
		} else {
		    return FALSE;
		}
	}

	public function get_project($id)
	{
		$this->db->where(['id' => $id]);
		$query = $this->db->get('projects');
		return $query->row();
	}

	public function create_project($data)
	{
		if ($this->db->insert("projects", $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_project($data)
	{
		$this->db->where(['id' => $data['id']]);
		if ($this->db->update("projects", $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function delete_project($data)
	{
		$this->db->where(['tast_project_id' => $data]);
		$this->db->delete("tasks");

		$this->db->where(['id' => $data]);
		if ($this->db->delete("projects")) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


}
?>