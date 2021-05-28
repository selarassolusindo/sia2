<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T31_bayar_model extends CI_Model
{

    public $table = 't31_bayar';
    public $id = 'idbayar';
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
        $this->db->select($this->table.'.*');
        $this->db->select('t30_tamu.Name');
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $this->db->join('t30_tamu', 't30_tamu.idtamu = '.$this->table.'.idtamu', 'left');
        return $this->db->get()->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('t30_tamu.Name');
        $this->db->or_like('t30_tamu.TripNo');
        $this->db->or_like('t30_tamu.TripTgl');
        $this->db->select($this->table.'.*');
        $this->db->from($this->table);
        $this->db->join('t30_tamu', 't30_tamu.idtamu = '.$this->table.'.idtamu');
        // $this->db->join('t32_bayard', 't32_bayard.idbayar = '.$this->table.'.idbayar');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('t30_tamu.Name', $q);
        $this->db->or_like('t30_tamu.TripNo', $q);
        $this->db->or_like('t30_tamu.TripTgl', $q);
        $this->db->or_like('pb.Name', $q);
		$this->db->limit($limit, $start);
        $this->db->select($this->table.'.*');
        $this->db->select('t30_tamu.TripNo, t30_tamu.TripTgl, t30_tamu.Name');
        $this->db->select('pb.Name as NamePaidBy');
        $this->db->from($this->table);
        $this->db->join('t30_tamu', 't30_tamu.idtamu = '.$this->table.'.idtamu');
        $this->db->join('t30_tamu pb', 'pb.idtamu = '.$this->table.'.PaidBy', 'left'); //echo $this->db->get_compiled_select();
        return $this->db->get()->result();
    }

    /**
     * ambil data tamu sesuai trip plus data detail pembayaran
     */
    function get_limit_data_bayard($q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('t30_tamu.Name');
        $this->db->or_like('t30_tamu.TripNo');
        $this->db->or_like('t30_tamu.TripTgl');
        $this->db->limit($limit, $start);
        $this->db->select($this->table.'.*');
        $this->db->select('t30_tamu.TripNo, t30_tamu.TripTgl, t30_tamu.Name');
        $this->db->select('t32_bayard.idtop, t32_bayard.Jumlah, concat(t32_bayard.idbayar, t32_bayard.idtop) as idbayar_idtop');
        $this->db->from($this->table);
        $this->db->join('t30_tamu', 't30_tamu.idtamu = '.$this->table.'.idtamu');
        $this->db->join('t32_bayard', 't32_bayard.idbayar = '.$this->table.'.idbayar');
        return $this->db->get()->result();
    }

    /**
     * ambil data tamu sesuai trip plus data detail pembayaran
     */
    function get_limit_data_bayars($q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('t30_tamu.Name');
        $this->db->or_like('t30_tamu.TripNo');
        $this->db->or_like('t30_tamu.TripTgl');
        $this->db->limit($limit, $start);
        $this->db->select($this->table.'.*');
        $this->db->select('t30_tamu.TripNo, t30_tamu.TripTgl, t30_tamu.Name');
        $this->db->select('t33_bayars.idtos, t33_bayars.Jumlah, concat(t33_bayars.idbayar, t33_bayars.idtos) as idbayar_idtos');
        $this->db->from($this->table);
        $this->db->join('t30_tamu', 't30_tamu.idtamu = '.$this->table.'.idtamu');
        $this->db->join('t33_bayars', 't33_bayars.idbayar = '.$this->table.'.idbayar');
        return $this->db->get()->result();
    }

    /**
     * ambil data tamu sesuai trip plus data detail pembayaran
     */
    function get_limit_data_bayars2($q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('t30_tamu.Name');
        $this->db->or_like('t30_tamu.TripNo');
        $this->db->or_like('t30_tamu.TripTgl');
        $this->db->limit($limit, $start);
        $this->db->select($this->table.'.*');
        $this->db->select('t30_tamu.TripNo, t30_tamu.TripTgl, t30_tamu.Name');
        $this->db->select('t34_bayars2.idtos2, t34_bayars2.Jumlah, concat(t34_bayars2.idbayar, t34_bayars2.idtos2) as idbayar_idtos2');
        $this->db->from($this->table);
        $this->db->join('t30_tamu', 't30_tamu.idtamu = '.$this->table.'.idtamu');
        $this->db->join('t34_bayars2', 't34_bayars2.idbayar = '.$this->table.'.idbayar');
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

    // ambil idbayar
    function getInsertId()
    {
        return $this->db->insert_id();
    }

    /**
     * hapus data berdasarkan Trip No.
     */
    function deleteTripNo($TripNo, $company)
    {
        $q = "
            delete
            from
                t31_bayar
            where
                idtamu in (select idtamu from t30_tamu where TripNo = '".$TripNo."' and Company = '".$company."')
        ";
        $this->db->query($q);
    }

    /**
     * ambil data berdasarkan idtamu
     */
    function getByIdtamu($idtamu)
    {
        $this->db->where('idtamu', $idtamu);
        return $this->db->get($this->table)->row();
    }

    // update data by parameter
    function updateByParam($param, $value, $data)
    {
        // echo pre($data);
        //$this->db->set($data);
        // foreach ($data as $key => $val) {
        //     $this->db->set($key, $val, FALSE);
        // }
        // $this->db->set('PriceList', 'PriceList + 1', FALSE);
        // $data = array(
        //     'PriceList' => PriceList + 100,
        // );
        $this->db->where($param, $value);
        $this->db->update($this->table, $data);
        // echo $this->db->get_compiled_update();
        // $this->db->update($this->table, $data);
    }

}

/* End of file T31_bayar_model.php */
/* Location: ./application/models/T31_bayar_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-10 20:14:46 */
/* http://harviacode.com */
