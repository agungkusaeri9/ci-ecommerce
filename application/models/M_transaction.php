<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_transaction extends CI_Model{

	public $table = 'transactions';
    public function get()
    {
		$this->db->select('tr.*');
		$this->db->from('transactions tr');
        return $this->db->get();
    }


	public function getByUser($user_id)
    {
		$this->db->select('tr.*');
		$this->db->where('tr.user_id',$user_id);
		$this->db->order_by('id','DESC');
		$this->db->from('transactions tr');
        return $this->db->get();
    }

	public function create($data,$carts)
	{
		$this->db->insert('transactions',$data);
		$insert_id = $this->db->insert_id();
		if($insert_id)
		{
			foreach($carts as $cart){
				$this->db->insert('transaction_details',array(
					'product_id' => $cart->product_id,
					'amount' => $cart->amount,
					'transaction_id' => $insert_id,
					'notes' => $cart->notes
				));
			}
		}
		return $insert_id;
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}

	public function find($arr)
	{
		$this->db->where($arr);
		return $this->db->get($this->table);
	}

	public function update($arr,$data)
	{
		$this->db->where($arr);
		$this->db->set($data);
		return $this->db->update($this->table);
	}

	public function detail($arr)
	{
		$this->db->select('td.*,prod.name as product_name,prod.price as product_price');
		$this->db->where($arr);
		$this->db->join('products prod','prod.id=td.product_id');
		$this->db->from('transaction_details td');
        return $this->db->get();
	}

	public function count()
	{
		return $this->db->get($this->table)->num_rows();
	}
}
