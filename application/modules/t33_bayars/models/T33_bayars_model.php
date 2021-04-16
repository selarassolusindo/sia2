<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T33_bayars_model extends CI_Model
{

    public $table = 't33_bayars';
    public $id = 'idbayars';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('TAMU', true);
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idbayars', $q);
		$this->db->or_like('idbayar', $q);
		$this->db->or_like('idtos', $q);
		$this->db->or_like('Jumlah', $q);
		$this->db->or_like('idusers', $q);
		$this->db->or_like('created_at', $q);
		$this->db->or_like('updated_at', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idbayars', $q);
		$this->db->or_like('idbayar', $q);
		$this->db->or_like('idtos', $q);
		$this->db->or_like('Jumlah', $q);
		$this->db->or_like('idusers', $q);
		$this->db->or_like('created_at', $q);
		$this->db->or_like('updated_at', $q);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file T33_bayars_model.php */
/* Location: ./application/models/T33_bayars_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-17 04:16:23 */
/* http://harviacode.com */
