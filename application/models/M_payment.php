<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_payment extends CI_Model{

    public $table = 'payments';
    public function get()
    {
        return $this->db->get($this->table);
    }

}