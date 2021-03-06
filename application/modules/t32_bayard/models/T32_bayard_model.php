<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T32_bayard_model extends CI_Model
{

    public $table = 't32_bayard';
    public $id = 'idbayard';
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
        $this->db->like('idbayard', $q);
		$this->db->or_like('idbayar', $q);
		$this->db->or_like('idtop', $q);
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
        $this->db->like('idbayard', $q);
		$this->db->or_like('idbayar', $q);
		$this->db->or_like('idtop', $q);
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

    /**
     * ambil data pembayaran detail berdasarkan idbayar
     */
    function getDataByIdbayar($idbayar)
    {
        $this->db->where('idbayar', $idbayar);
        $this->db->order_by('idtop', 'ASC');
        return $this->db->get($this->table)->result();
    }

    /**
     * hapus data berdasarkan Trip No.
     */
    function deleteTripNo($TripNo, $company)
    {
        $q = "
        delete
        from
            t32_bayard
        where
            idbayar in (
                select
                    idbayar
                from
                    t31_bayar
                where
                    idtamu in (select idtamu from t30_tamu where TripNo = '".$TripNo."' and Company = '".$company."')
                    )
        ";
        $this->db->query($q);
    }

    /**
     * delete data berdasarkan idbayar
     */
    function deleteByIdbayar($idbayar)
    {
        $this->db->where('idbayar', $idbayar);
        $this->db->delete($this->table);
    }

}

/* End of file T32_bayard_model.php */
/* Location: ./application/models/T32_bayard_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-11 03:39:47 */
/* http://harviacode.com */
