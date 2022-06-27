<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_cart extends CI_Model{

    public $table = 'carts';

	public function addToCart($data)
	{
		$this->db->insert($this->table,$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
}
