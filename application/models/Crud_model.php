<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

	public function student_add($data)
	{
		$this->db->insert('user_details', $data);
	}
    public function student_view()
    {
        $query = $this->db->get('user_details')->result();
        return $query;
    }
    public function student_edit($id)
    {
        $this->db->where('id', $id);
        $student = $this->db->get('user_details')->row();
        return $student;
        
    }
	public function student_update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user_details', $data);
   }
   public function student_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_details');
   }
}
