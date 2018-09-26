<?php  
class Shrink_model extends CI_Model {

	public function insert($data){
		if ($this->db->insert("shrink", $data)) {
		return true;
		}
	}

	public function get($short){
		$this->db->where(['short' => $short]);
		$query = $this->db->get('shrink');
		return $query->row();
	}
}
?>