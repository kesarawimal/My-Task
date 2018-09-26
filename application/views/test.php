<?php

$this->load->database();

$data = array(
'roll_no' => '1',
'name' => 'Virat'
);
$this->db->insert("stud", $data);

?>