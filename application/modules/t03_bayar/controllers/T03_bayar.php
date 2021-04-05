<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T03_bayar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T03_bayar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't03_bayar?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't03_bayar?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't03_bayar';
            $config['first_url'] = base_url() . 't03_bayar';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T03_bayar_model->total_rows($q);
        $t03_bayar = $this->T03_bayar_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't03_bayar_data' => $t03_bayar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t03_bayar/t03_bayar_list', $data);
        $data['_view'] = 't03_bayar/t03_bayar_list';
        $data['_caption'] = 'Pembayaran Tamu';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T03_bayar_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idbayar' => $row->idbayar,
				'Tamu' => $row->Tamu,
				'PT' => $row->PT,
				'Kurs' => $row->Kurs,
				'Mata_Uang' => $row->Mata_Uang,
				'Jumlah' => $row->Jumlah,
				'Paid_By' => $row->Paid_By,
				'idusers' => $row->idusers,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('t03_bayar/t03_bayar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_bayar'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t03_bayar/create_action'),
			'idbayar' => set_value('idbayar'),
			'Tamu' => set_value('Tamu'),
			'PT' => set_value('PT'),
			'Kurs' => set_value('Kurs'),
			'Mata_Uang' => set_value('Mata_Uang'),
			'Jumlah' => set_value('Jumlah'),
			'Paid_By' => set_value('Paid_By'),
			// 'idusers' => set_value('idusers'),
			// 'created_at' => set_value('created_at'),
			// 'updated_at' => set_value('updated_at'),
		);
        // $this->load->view('t03_bayar/t03_bayar_form', $data);
        $data['_view'] = 't03_bayar/t03_bayar_form';
        $data['_caption'] = 'Pembayaran Tamu';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'Tamu' => $this->input->post('Tamu',TRUE),
				'PT' => $this->input->post('PT',TRUE),
				'Kurs' => $this->input->post('Kurs',TRUE),
				'Mata_Uang' => $this->input->post('Mata_Uang',TRUE),
				'Jumlah' => $this->input->post('Jumlah',TRUE),
				'Paid_By' => $this->input->post('Paid_By',TRUE),
				'idusers' => $this->session->userdata('user_id'),
				// 'created_at' => $this->input->post('created_at',TRUE),
				// 'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T03_bayar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t03_bayar'));
        }
    }

    public function update($id)
    {
        $row = $this->T03_bayar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t03_bayar/update_action'),
				'idbayar' => set_value('idbayar', $row->idbayar),
				'Tamu' => set_value('Tamu', $row->Tamu),
				'PT' => set_value('PT', $row->PT),
				'Kurs' => set_value('Kurs', $row->Kurs),
				'Mata_Uang' => set_value('Mata_Uang', $row->Mata_Uang),
				'Jumlah' => set_value('Jumlah', $row->Jumlah),
				'Paid_By' => set_value('Paid_By', $row->Paid_By),
				// 'idusers' => set_value('idusers', $row->idusers),
				// 'created_at' => set_value('created_at', $row->created_at),
				// 'updated_at' => set_value('updated_at', $row->updated_at),
			);
            // $this->load->view('t03_bayar/t03_bayar_form', $data);
            $data['_view'] = 't03_bayar/t03_bayar_form';
            $data['_caption'] = 'Pembayaran Tamu';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_bayar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idbayar', TRUE));
        } else {
            $data = array(
				'Tamu' => $this->input->post('Tamu',TRUE),
				'PT' => $this->input->post('PT',TRUE),
				'Kurs' => $this->input->post('Kurs',TRUE),
				'Mata_Uang' => $this->input->post('Mata_Uang',TRUE),
				'Jumlah' => $this->input->post('Jumlah',TRUE),
				'Paid_By' => $this->input->post('Paid_By',TRUE),
                'idusers' => $this->session->userdata('user_id'),
				// 'created_at' => $this->input->post('created_at',TRUE),
				// 'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T03_bayar_model->update($this->input->post('idbayar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t03_bayar'));
        }
    }

    public function delete($id)
    {
        $row = $this->T03_bayar_model->get_by_id($id);

        if ($row) {
            $this->T03_bayar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t03_bayar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_bayar'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Tamu', 'tamu', 'trim|required');
		$this->form_validation->set_rules('PT', 'pt', 'trim|required');
		$this->form_validation->set_rules('Kurs', 'kurs', 'trim|required');
		$this->form_validation->set_rules('Mata_Uang', 'mata uang', 'trim|required');
		$this->form_validation->set_rules('Jumlah', 'jumlah', 'trim|required|numeric');
		$this->form_validation->set_rules('Paid_By', 'paid by', 'trim|required');
		// $this->form_validation->set_rules('idusers', 'idusers', 'trim|required');
		// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('idbayar', 'idbayar', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t03_bayar.xls";
        $judul = "t03_bayar";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Tamu");
		xlsWriteLabel($tablehead, $kolomhead++, "PT");
		xlsWriteLabel($tablehead, $kolomhead++, "Kurs");
		xlsWriteLabel($tablehead, $kolomhead++, "Mata Uang");
		xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
		xlsWriteLabel($tablehead, $kolomhead++, "Paid By");
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->T03_bayar_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->Tamu);
			xlsWriteLabel($tablebody, $kolombody++, $data->PT);
			xlsWriteLabel($tablebody, $kolombody++, $data->Kurs);
			xlsWriteLabel($tablebody, $kolombody++, $data->Mata_Uang);
			xlsWriteNumber($tablebody, $kolombody++, $data->Jumlah);
			xlsWriteNumber($tablebody, $kolombody++, $data->Paid_By);
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
        header("Content-Disposition: attachment;Filename=t03_bayar.doc");
        $data = array(
            't03_bayar_data' => $this->T03_bayar_model->get_all(),
            'start' => 0
        );
        $this->load->view('t03_bayar/t03_bayar_doc',$data);
    }

}

/* End of file T03_bayar.php */
/* Location: ./application/controllers/T03_bayar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-05 17:58:51 */
/* http://harviacode.com */
