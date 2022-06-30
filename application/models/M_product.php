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

	public function getWhere($where)
    {
		$this->db->select('products.*,product_categories.name as category_name,product_categories.slug as category_slug');
		$this->db->where($where);
		$this->db->join('product_categories','product_categories.id=products.product_category');
		$this->db->from($this->table);
        return $this->db->get();
    }

	public function search($q)
	{
		$this->db->select('products.*,product_categories.name as category_name');
		$this->db->like('products.name',$q);
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
		$this->db->limit($limit);
		$this->db->order_by('products.id','DESC');
		$this->db->from($this->table);
        return $this->db->get();
	}

	public function getProduct()
	{
		$this->load->library('pagination'); // Load librari paginationnya
    
		$query = "SELECT * FROM products"; // Query untuk menampilkan semua data siswa
		
		$config['base_url'] = base_url('product');
		$config['total_rows'] = $this->db->query($query)->num_rows();
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		
		// Style Pagination
		// Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
		$config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = ' <i class="glyphicon glyphicon-menu-right"></i> '; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = ' <i class="glyphicon glyphicon-menu-left"></i> '; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
    
		$this->pagination->initialize($config); // Set konfigurasi paginationnya
		
		$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
		$query .= " LIMIT ".$page.", ".$config['per_page'];
		
		$data['limit'] = $config['per_page'];
		$data['total_rows'] = $config['total_rows'];
		$data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
		$data['products'] = $this->db->query($query)->result();
		
		return $data;
	}

}
