<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T02_top extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T02_top_model');
        $this->load->library('form_validation');

        $this->load->model('t06_currency/T06_currency_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't02_top?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't02_top?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't02_top';
            $config['first_url'] = base_url() . 't02_top';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T02_top_model->total_rows($q);
        $t02_top = $this->T02_top_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't02_top_data' => $t02_top,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t02_top/t02_top_list', $data);
        $data['_view'] = 't02_top/t02_top_list';
        $data['_caption'] = 'Data Jenis Pembayaran';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T02_top_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idtop' => $row->idtop,
				'Type' => $row->Type,
				'idusers' => $row->idusers,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('t02_top/t02_top_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t02_top'));
        }
    }

    public function create()
    {
        $dataCurrency = $this->T06_currency_model->get_all();
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t02_top/create_action'),
			'idtop' => set_value('idtop'),
			'Type' => set_value('Type'),
            'Currency' => set_value('Currency'),
            'dataCurrency' => $dataCurrency,
			// 'idusers' => set_value('idusers'),
			// 'created_at' => set_value('created_at'),
			// 'updated_at' => set_value('updated_at'),
		);
        // $this->load->view('t02_top/t02_top_form', $data);
        $data['_view'] = 't02_top/t02_top_form';
        $data['_caption'] = 'Data Jenis Pembayaran';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'Type' => $this->input->post('Type',TRUE),
                'Currency' => $this->input->post('Currency',TRUE),
				'idusers' => $this->session->userdata('user_id'),
				// 'created_at' => $this->input->post('created_at',TRUE),
				// 'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T02_top_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t02_top'));
        }
    }

    public function update($id)
    {
        $row = $this->T02_top_model->get_by_id($id);

        if ($row) {
            $dataCurrency = $this->T06_currency_model->get_all();
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t02_top/update_action'),
				'idtop' => set_value('idtop', $row->idtop),
				'Type' => set_value('Type', $row->Type),
                'Currency' => set_value('Currency', $row->Currency),
                'dataCurrency' => $dataCurrency,
				// 'idusers' => set_value('idusers', $row->idusers),
				// 'created_at' => set_value('created_at', $row->created_at),
				// 'updated_at' => set_value('updated_at', $row->updated_at),
			);
            // $this->load->view('t02_top/t02_top_form', $data);
            $data['_view'] = 't02_top/t02_top_form';
            $data['_caption'] = 'Data Jenis Pembayaran';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t02_top'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idtop', TRUE));
        } else {
            $data = array(
				'Type' => $this->input->post('Type',TRUE),
                'Currency' => $this->input->post('Currency',TRUE),
				'idusers' => $this->session->userdata('user_id'),
				// 'created_at' => $this->input->post('created_at',TRUE),
				// 'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T02_top_model->update($this->input->post('idtop', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t02_top'));
        }
    }

    public function delete($id)
    {
        $row = $this->T02_top_model->get_by_id($id);

        if ($row) {
            $this->T02_top_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t02_top'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t02_top'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Type', 'type', 'trim|required');
		// $this->form_validation->set_rules('idusers', 'idusers', 'trim|required');
		// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('idtop', 'idtop', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t02_top.xls";
        $judul = "t02_top";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Type");
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->T02_top_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Type);
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
        header("Content-Disposition: attachment;Filename=t02_top.doc");
        $data = array(
            't02_top_data' => $this->T02_top_model->get_all(),
            'start' => 0
        );
        $this->load->view('t02_top/t02_top_doc',$data);
    }

}

/* End of file T02_top.php */
/* Location: ./application/controllers/T02_top.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-08 09:04:00 */
/* http://harviacode.com */
