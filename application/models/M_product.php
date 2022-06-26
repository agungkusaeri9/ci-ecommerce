<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_product extends CI_Model{

    public $table = 'products';
    public function get()
    {
		$this->db->select('products.*,product_categories.name as category_name');
		$this->db->join('product_categories','product_categories.id=products.product_category');
		$this->db->from($this->table);
        return $this->db->get();
    }

	public function create($data)
	{
		$this->db->insert($this->table,$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function find($arr)
	{
		$this->db->where($arr);
		$this->db->select('products.*,product_categories.name as category_name');
		$this->db->join('product_categories','product_categories.id=products.product_category');
		$this->db->from($this->table);
		return $this->db->get();
	}

	public function update($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->set($data);
		return $this->db->update($this->table);
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}

	public function count()
	{
		return $this->db->get($this->table)->num_rows();
	}

	public function getBanner($limit)
	{
		$this->db->select('products.*,product_categories.name as category_name');
		$this->db->join('product_categories','product_categories.id=products.product_category');
		$this->db->order_by('id','RANDOM');
		$this->db->limit($limit);
		$this->db->from($this->table);
        return $this->db->get();
	}

	public function bestProducts($limit)
	{
		$this->db->select('products.*,product_categories.name as category_name');
		$this->db->join('product_categories','product_categories.id=products.product_category');
		$this->db->order_by('sold','DESC');
		$this->db->limit($limit);
		$this->db->from($this->table);
        return $this->db->get();
	}

	public function latestProducts($limit)
	{
		$this->db->select('products.*,product_categories.name as category_name');
		$this->db->join('product_categories','product_categories.id=products.product_category');
		$this->db->order_by('id','DESC');
		$this->db->limit($limit);
		$this->db->from($this->table);
        return $this->db->get();
	}

}
