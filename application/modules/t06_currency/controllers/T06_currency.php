<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T06_currency extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T06_currency_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't06_currency?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't06_currency?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't06_currency';
            $config['first_url'] = base_url() . 't06_currency';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T06_currency_model->total_rows($q);
        $t06_currency = $this->T06_currency_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't06_currency_data' => $t06_currency,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t06_currency/t06_currency_list', $data);
        $data['_view'] = 't06_currency/t06_currency_list';
        $data['_caption'] = 'Data Mata Uang';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T06_currency_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idcurrency' => $row->idcurrency,
				'Currency' => $row->Currency,
				'Konstanta' => $row->Konstanta,
			);
            $this->load->view('t06_currency/t06_currency_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t06_currency'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t06_currency/create_action'),
			'idcurrency' => set_value('idcurrency'),
			'Currency' => set_value('Currency'),
			'Konstanta' => set_value('Konstanta'),
		);
        // $this->load->view('t06_currency/t06_currency_form', $data);
        $data['_view'] = 't06_currency/t06_currency_form';
        $data['_caption'] = 'Data Mata Uang';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'Currency' => $this->input->post('Currency',TRUE),
				'Konstanta' => $this->input->post('Konstanta',TRUE),
			);
            $this->T06_currency_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t06_currency'));
        }
    }

    public function update($id)
    {
        $row = $this->T06_currency_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t06_currency/update_action'),
				'idcurrency' => set_value('idcurrency', $row->idcurrency),
				'Currency' => set_value('Currency', $row->Currency),
				'Konstanta' => set_value('Konstanta', $row->Konstanta),
			);
            // $this->load->view('t06_currency/t06_currency_form', $data);
            $data['_view'] = 't06_currency/t06_currency_form';
            $data['_caption'] = 'Data Mata Uang';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t06_currency'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idcurrency', TRUE));
        } else {
            $data = array(
				'Currency' => $this->input->post('Currency',TRUE),
				'Konstanta' => $this->input->post('Konstanta',TRUE),
			);
            $this->T06_currency_model->update($this->input->post('idcurrency', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t06_currency'));
        }
    }

    public function delete($id)
    {
        $row = $this->T06_currency_model->get_by_id($id);

        if ($row) {
            $this->T06_currency_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t06_currency'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t06_currency'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Currency', 'currency', 'trim|required');
		$this->form_validation->set_rules('Konstanta', 'konstanta', 'trim|required');
		$this->form_validation->set_rules('idcurrency', 'idcurrency', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t06_currency.xls";
        $judul = "t06_currency";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Currency");
		xlsWriteLabel($tablehead, $kolomhead++, "Konstanta");
		foreach ($this->T06_currency_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Currency);
			xlsWriteLabel($tablebody, $kolombody++, $data->Konstanta);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t06_currency.doc");
        $data = array(
            't06_currency_data' => $this->T06_currency_model->get_all(),
            'start' => 0
        );
        $this->load->view('t06_currency/t06_currency_doc',$data);
    }

}

/* End of file T06_currency.php */
/* Location: ./application/controllers/T06_currency.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-22 19:59:59 */
/* http://harviacode.com */
