<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_cart extends CI_Model{

    public $table = 'carts';

	public function get($user_id)
	{
		$this->db->select('carts.*,products.name as product_name,products.price as product_price,products.image as product_image');
		$this->db->join('products','products.id=carts.product_id');
		$this->db->where('user_id',$user_id);
		$this->db->from($this->table);
		return $this->db->get();
	}

	public function addToCart($data)
	{
		$this->db->insert($this->table,$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function delete($id)
	{
		$this->db->where('carts.id',$id);
		$this->db->from($this->table);
		$this->db->delete();
	}

	public function deleteAll($user_id)
	{
		$this->db->where('carts.user_id',$user_id);
		$this->db->from($this->table);
		$this->db->delete();
	}

	public function sum($column,$user_id)
	{
		$this->db->select_sum($column);
		$this->db->where('user_id',$user_id);
		$this->db->from($this->table);
		return $this->db->get();
	}

	public function count($user_id)
	{
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$this->db->from($this->table);
		return $this->db->get();
	}
}
