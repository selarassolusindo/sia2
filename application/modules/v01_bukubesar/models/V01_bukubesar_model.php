<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V01_bukubesar_model extends CI_Model
{

    public $table = 'v01_bukubesar';
    public $id = 'idakun';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database($this->session->userdata('dbName'), true);
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
        // $this->db->like('', $q);
	$this->db->or_like('idakun', $q);
	$this->db->or_like('Kode', $q);
	$this->db->or_like('Nama', $q);
	$this->db->or_like('Induk', $q);
	$this->db->or_like('Urut', $q);
	$this->db->or_like('Debit', $q);
	$this->db->or_like('Kredit', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('', $q);
	$this->db->or_like('idakun', $q);
	$this->db->or_like('Kode', $q);
	$this->db->or_like('Nama', $q);
	$this->db->or_like('Induk', $q);
	$this->db->or_like('Urut', $q);
	$this->db->or_like('Debit', $q);
	$this->db->or_like('Kredit', $q);
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

/* End of file V01_bukubesar_model.php */
/* Location: ./application/models/V01_bukubesar_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-27 21:03:39 */
/* http://harviacode.com */