<?php 

class User_model extends CI_Model	
{
	
	public function get_users($user_id)
	{


		$this->db->where(['id' => $user_id]);
		// $this->db->where('id', $user_id);
		$query = $this->db->get('users');
		return $query->result();



		// $query = $this->db->query("select * from users");

		// return $query->num_rows();

		// return $query->num_fields();



		// $query = $this->db->get('users');
		// return $query->result();


		// $config['hostname'] = "localhost";
		// $config['username'] = "root";
		// $config['password'] = "root";
		// $config['database'] = "mid";

		// $connection = $this->load->database('$config');

	}

	public function register_user()
	{
		$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, ["cost" => 12]);

		$data = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $password
		);

		$insert_data = $this->db->insert('users', $data);

		return $insert_data;
	}

	public function login_user($username,$password){

		$this->db->where('username' , $username);
		$result = $this->db->get('users');

		if ($result->num_rows() > 0) {
		
			$db_password = $result->row(2)->password;
			$user_id = $result->row(0)->id;

			if (password_verify($password , $db_password)) {
				return $user_id;
			} else {
				return false;
			}
		} else {
			return FALSE;
		}

	}
}


?>