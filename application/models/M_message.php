<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_message extends CI_Model{

    public $table = 'messages';
    public function get()
    {
        return $this->db->get($this->table);
    }
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
}
