<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T30_tamu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T30_tamu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't30_tamu?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't30_tamu?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't30_tamu';
            $config['first_url'] = base_url() . 't30_tamu';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T30_tamu_model->total_rows($q);
        $t30_tamu = $this->T30_tamu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't30_tamu_data' => $t30_tamu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t30_tamu/t30_tamu_list', $data);
    }

    public function read($id)
    {
        $row = $this->T30_tamu_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idtamu' => $row->idtamu,
				'TripNo' => $row->TripNo,
				'TripTgl' => $row->TripTgl,
				'Name' => $row->Name,
				'PackageName' => $row->PackageName,
				'Night' => $row->Night,
				'CheckIn' => $row->CheckIn,
				'CheckOut' => $row->CheckOut,
				'Agent' => $row->Agent,
				'PriceList' => $row->PriceList,
				'FeeTanas' => $row->FeeTanas,
				'PricePay' => $row->PricePay,
				'Remarks' => $row->Remarks,
				'idusers' => $row->idusers,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('t30_tamu/t30_tamu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_tamu'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t30_tamu/create_action'),
			'idtamu' => set_value('idtamu'),
			'TripNo' => set_value('TripNo'),
			'TripTgl' => set_value('TripTgl'),
			'Name' => set_value('Name'),
			'PackageName' => set_value('PackageName'),
			'Night' => set_value('Night'),
			'CheckIn' => set_value('CheckIn'),
			'CheckOut' => set_value('CheckOut'),
			'Agent' => set_value('Agent'),
			'PriceList' => set_value('PriceList'),
			'FeeTanas' => set_value('FeeTanas'),
			'PricePay' => set_value('PricePay'),
			'Remarks' => set_value('Remarks'),
			'idusers' => set_value('idusers'),
			'created_at' => set_value('created_at'),
			'updated_at' => set_value('updated_at'),
		);
        $this->load->view('t30_tamu/t30_tamu_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'TripNo' => $this->input->post('TripNo',TRUE),
				'TripTgl' => $this->input->post('TripTgl',TRUE),
				'Name' => $this->input->post('Name',TRUE),
				'PackageName' => $this->input->post('PackageName',TRUE),
				'Night' => $this->input->post('Night',TRUE),
				'CheckIn' => $this->input->post('CheckIn',TRUE),
				'CheckOut' => $this->input->post('CheckOut',TRUE),
				'Agent' => $this->input->post('Agent',TRUE),
				'PriceList' => $this->input->post('PriceList',TRUE),
				'FeeTanas' => $this->input->post('FeeTanas',TRUE),
				'PricePay' => $this->input->post('PricePay',TRUE),
				'Remarks' => $this->input->post('Remarks',TRUE),
				'idusers' => $this->input->post('idusers',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T30_tamu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t30_tamu'));
        }
    }

    public function update($id)
    {
        $row = $this->T30_tamu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t30_tamu/update_action'),
				'idtamu' => set_value('idtamu', $row->idtamu),
				'TripNo' => set_value('TripNo', $row->TripNo),
				'TripTgl' => set_value('TripTgl', $row->TripTgl),
				'Name' => set_value('Name', $row->Name),
				'PackageName' => set_value('PackageName', $row->PackageName),
				'Night' => set_value('Night', $row->Night),
				'CheckIn' => set_value('CheckIn', $row->CheckIn),
				'CheckOut' => set_value('CheckOut', $row->CheckOut),
				'Agent' => set_value('Agent', $row->Agent),
				'PriceList' => set_value('PriceList', $row->PriceList),
				'FeeTanas' => set_value('FeeTanas', $row->FeeTanas),
				'PricePay' => set_value('PricePay', $row->PricePay),
				'Remarks' => set_value('Remarks', $row->Remarks),
				'idusers' => set_value('idusers', $row->idusers),
				'created_at' => set_value('created_at', $row->created_at),
				'updated_at' => set_value('updated_at', $row->updated_at),
			);
            $this->load->view('t30_tamu/t30_tamu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_tamu'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idtamu', TRUE));
        } else {
            $data = array(
				'TripNo' => $this->input->post('TripNo',TRUE),
				'TripTgl' => $this->input->post('TripTgl',TRUE),
				'Name' => $this->input->post('Name',TRUE),
				'PackageName' => $this->input->post('PackageName',TRUE),
				'Night' => $this->input->post('Night',TRUE),
				'CheckIn' => $this->input->post('CheckIn',TRUE),
				'CheckOut' => $this->input->post('CheckOut',TRUE),
				'Agent' => $this->input->post('Agent',TRUE),
				'PriceList' => $this->input->post('PriceList',TRUE),
				'FeeTanas' => $this->input->post('FeeTanas',TRUE),
				'PricePay' => $this->input->post('PricePay',TRUE),
				'Remarks' => $this->input->post('Remarks',TRUE),
				'idusers' => $this->input->post('idusers',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T30_tamu_model->update($this->input->post('idtamu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t30_tamu'));
        }
    }

    public function delete($id)
    {
        $row = $this->T30_tamu_model->get_by_id($id);

        if ($row) {
            $this->T30_tamu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t30_tamu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_tamu'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('TripNo', 'tripno', 'trim|required');
		$this->form_validation->set_rules('TripTgl', 'triptgl', 'trim|required');
		$this->form_validation->set_rules('Name', 'name', 'trim|required');
		$this->form_validation->set_rules('PackageName', 'packagename', 'trim|required');
		$this->form_validation->set_rules('Night', 'night', 'trim|required');
		$this->form_validation->set_rules('CheckIn', 'checkin', 'trim|required');
		$this->form_validation->set_rules('CheckOut', 'checkout', 'trim|required');
		$this->form_validation->set_rules('Agent', 'agent', 'trim|required');
		$this->form_validation->set_rules('PriceList', 'pricelist', 'trim|required|numeric');
		$this->form_validation->set_rules('FeeTanas', 'feetanas', 'trim|required|numeric');
		$this->form_validation->set_rules('PricePay', 'pricepay', 'trim|required|numeric');
		$this->form_validation->set_rules('Remarks', 'remarks', 'trim|required');
		$this->form_validation->set_rules('idusers', 'idusers', 'trim|required');
		$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('idtamu', 'idtamu', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t30_tamu.xls";
        $judul = "t30_tamu";
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
		xlsWriteLabel($tablehead, $kolomhead++, "TripNo");
		xlsWriteLabel($tablehead, $kolomhead++, "TripTgl");
		xlsWriteLabel($tablehead, $kolomhead++, "Name");
		xlsWriteLabel($tablehead, $kolomhead++, "PackageName");
		xlsWriteLabel($tablehead, $kolomhead++, "Night");
		xlsWriteLabel($tablehead, $kolomhead++, "CheckIn");
		xlsWriteLabel($tablehead, $kolomhead++, "CheckOut");
		xlsWriteLabel($tablehead, $kolomhead++, "Agent");
		xlsWriteLabel($tablehead, $kolomhead++, "PriceList");
		xlsWriteLabel($tablehead, $kolomhead++, "FeeTanas");
		xlsWriteLabel($tablehead, $kolomhead++, "PricePay");
		xlsWriteLabel($tablehead, $kolomhead++, "Remarks");
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->T30_tamu_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->TripNo);
			xlsWriteLabel($tablebody, $kolombody++, $data->TripTgl);
			xlsWriteLabel($tablebody, $kolombody++, $data->Name);
			xlsWriteLabel($tablebody, $kolombody++, $data->PackageName);
			xlsWriteLabel($tablebody, $kolombody++, $data->Night);
			xlsWriteLabel($tablebody, $kolombody++, $data->CheckIn);
			xlsWriteLabel($tablebody, $kolombody++, $data->CheckOut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Agent);
			xlsWriteNumber($tablebody, $kolombody++, $data->PriceList);
			xlsWriteNumber($tablebody, $kolombody++, $data->FeeTanas);
			xlsWriteNumber($tablebody, $kolombody++, $data->PricePay);
			xlsWriteLabel($tablebody, $kolombody++, $data->Remarks);
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
        header("Content-Disposition: attachment;Filename=t30_tamu.doc");
        $data = array(
            't30_tamu_data' => $this->T30_tamu_model->get_all(),
            'start' => 0
        );
        $this->load->view('t30_tamu/t30_tamu_doc',$data);
    }

}

/* End of file T30_tamu.php */
/* Location: ./application/controllers/T30_tamu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-12 17:27:06 */
/* http://harviacode.com */