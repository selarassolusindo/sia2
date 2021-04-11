<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T31_bayar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T31_bayar_model');
        $this->load->library('form_validation');

        $this->load->model('t02_top/T02_top_model');
        $this->load->model('t32_bayard/T32_bayard_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't31_bayar?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't31_bayar?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't31_bayar';
            $config['first_url'] = base_url() . 't31_bayar';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T31_bayar_model->total_rows($q);
        $t31_bayar = $this->T31_bayar_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        /**
         * ambil data top (type of payment)
         */
        $dataTop = $this->T02_top_model->get_all();

        /**
         * ambil data detail pembayaran
         */
        $dataBayard = $this->T31_bayar_model->get_limit_data_bayard($config['per_page'], $start, $q);

        // echo pre($t31_bayar);
        // echo pre($dataBayard);

        $data = array(
            't31_bayar_data' => $t31_bayar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'dataTop' => $dataTop,
            'dataBayard' => $dataBayard,
        );
        // $this->load->view('t31_bayar/t31_bayar_list', $data);
        $data['_view'] = 't31_bayar/t31_bayar_list';
        $data['_caption'] = 'Pembayaran';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T31_bayar_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idbayar' => $row->idbayar,
				'idtamu' => $row->idtamu,
				'idusers' => $row->idusers,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('t31_bayar/t31_bayar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t31_bayar'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t31_bayar/create_action'),
			'idbayar' => set_value('idbayar'),
			'idtamu' => set_value('idtamu'),
		);
        // $this->load->view('t31_bayar/t31_bayar_form', $data);
        $data['_view'] = 't31_bayar/t31_bayar_form';
        $data['_caption'] = 'Pembayaran';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'idtamu' => $this->input->post('idtamu',TRUE),
                'idusers' => $this->session->userdata('user_id'),
			);
            $this->T31_bayar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t31_bayar'));
        }
    }

    public function update($id)
    {
        $row = $this->T31_bayar_model->get_by_id($id);

        if ($row) {

            /**
             * ambil data top (type of payment)
             */
            $dataTop = $this->T02_top_model->get_all();

            /**
             * ambil data pembayaran detail
             */
            $dataBayar = $this->T32_bayard_model->getDataByIdbayar($row->idbayar);

            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t31_bayar/update_action'),
				'idbayar' => set_value('idbayar', $row->idbayar),
				'idtamu' => set_value('idtamu', $row->idtamu),
                'dataTop' => $dataTop,
                'dataBayar' => $dataBayar,
			);
            // $this->load->view('t31_bayar/t31_bayar_form', $data);
            $data['_view'] = 't31_bayar/t31_bayar_form';
            $data['_caption'] = 'Pembayaran';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t31_bayar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idbayar', TRUE));
        } else {
            $data = array(
				'idtamu' => $this->input->post('idtamu',TRUE),
				'idusers' => $this->session->userdata('user_id'),
			);
            $this->T31_bayar_model->update($this->input->post('idbayar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t31_bayar'));
        }
    }

    public function delete($id)
    {
        $row = $this->T31_bayar_model->get_by_id($id);

        if ($row) {
            $this->T31_bayar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t31_bayar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t31_bayar'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('idtamu', 'idtamu', 'trim|required');
		// $this->form_validation->set_rules('idusers', 'idusers', 'trim|required');
		// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('idbayar', 'idbayar', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t31_bayar.xls";
        $judul = "t31_bayar";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");
        xlsBOF();
        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Idtamu");
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->T31_bayar_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->idtamu);
			xlsWriteLabel($tablebody, $kolombody++, $data->idusers);
			xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
			xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t31_bayar.doc");
        $data = array(
            't31_bayar_data' => $this->T31_bayar_model->get_all(),
            'start' => 0
        );
        $this->load->view('t31_bayar/t31_bayar_doc',$data);
    }

}

/* End of file T31_bayar.php */
/* Location: ./application/controllers/T31_bayar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-10 20:14:46 */
/* http://harviacode.com */
