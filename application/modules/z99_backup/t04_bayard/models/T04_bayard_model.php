<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T04_bayard_model extends CI_Model
{

    public $table = 't04_bayard';
    public $id = 'idbayard';
    public $order = 'ASC';

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
        // $this->db->like('idbayard', $q);
		$this->db->or_like('idbayar', $q);
		// $this->db->or_like('tamu', $q);
		// $this->db->or_like('pt_ci', $q);
		// $this->db->or_like('kurs_usd_ci', $q);
		// $this->db->or_like('kurs_aud_ci', $q);
		// $this->db->or_like('usd_ci', $q);
		// $this->db->or_like('aud_ci', $q);
		// $this->db->or_like('paypal_ci', $q);
		// $this->db->or_like('bca_d_ci', $q);
		// $this->db->or_like('rp_ci', $q);
		// $this->db->or_like('cc_bca_ci', $q);
		// $this->db->or_like('cc_mdr_ci', $q);
		// $this->db->or_like('tot_rp_ci', $q);
		// $this->db->or_like('slsh_ci', $q);
		// $this->db->or_like('slsh_blm_ci', $q);
		// $this->db->or_like('slsh_krg_ci', $q);
		// $this->db->or_like('slsh_disc_ci', $q);
		// $this->db->or_like('slsh_chrg_ci', $q);
		// $this->db->or_like('slsh_kurs_ci', $q);
		// $this->db->or_like('sha_inc_piw', $q);
		// $this->db->or_like('sha_inc_ssw', $q);
		// $this->db->or_like('paid_by', $q);
		// $this->db->or_like('idusers', $q);
		// $this->db->or_like('created_at', $q);
		// $this->db->or_like('updated_at', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        // $this->db->like('idbayard', $q);
		$this->db->or_like('idbayar', $q);
		// $this->db->or_like('tamu', $q);
		// $this->db->or_like('pt_ci', $q);
		// $this->db->or_like('kurs_usd_ci', $q);
		// $this->db->or_like('kurs_aud_ci', $q);
		// $this->db->or_like('usd_ci', $q);
		// $this->db->or_like('aud_ci', $q);
		// $this->db->or_like('paypal_ci', $q);
		// $this->db->or_like('bca_d_ci', $q);
		// $this->db->or_like('rp_ci', $q);
		// $this->db->or_like('cc_bca_ci', $q);
		// $this->db->or_like('cc_mdr_ci', $q);
		// $this->db->or_like('tot_rp_ci', $q);
		// $this->db->or_like('slsh_ci', $q);
		// $this->db->or_like('slsh_blm_ci', $q);
		// $this->db->or_like('slsh_krg_ci', $q);
		// $this->db->or_like('slsh_disc_ci', $q);
		// $this->db->or_like('slsh_chrg_ci', $q);
		// $this->db->or_like('slsh_kurs_ci', $q);
		// $this->db->or_like('sha_inc_piw', $q);
		// $this->db->or_like('sha_inc_ssw', $q);
		// $this->db->or_like('paid_by', $q);
		// $this->db->or_like('idusers', $q);
		// $this->db->or_like('created_at', $q);
		// $this->db->or_like('updated_at', $q);
		$this->db->limit($limit, $start);
        $this->db->select($this->table.'.*, t02_tamu.Nama');
        $this->db->from($this->table);
        $this->db->join('t02_tamu', 't02_tamu.idtamu = t04_bayard.tamu');
        return $this->db->get()->result();
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

    // delete by idbayar
    function deleteByIdbayar($idbayar)
    {
        $this->db->where('idbayar', $idbayar);
        $this->db->delete($this->table);
    }

}

/* End of file T04_bayard_model.php */
/* Location: ./application/models/T04_bayard_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-06 09:49:31 */
/* http://harviacode.com */
