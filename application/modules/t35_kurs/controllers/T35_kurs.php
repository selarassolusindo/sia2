<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T35_kurs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T35_kurs_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't35_kurs?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't35_kurs?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't35_kurs';
            $config['first_url'] = base_url() . 't35_kurs';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T35_kurs_model->total_rows($q);
        $t35_kurs = $this->T35_kurs_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't35_kurs_data' => $t35_kurs,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t35_kurs/t35_kurs_list', $data);
        $data['_view'] = 't35_kurs/t35_kurs_list';
        $data['_caption'] = 'Kurs';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T35_kurs_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idbkm' => $row->idbkm,
				'no' => $row->no,
				'tgl' => $row->tgl,
				'company' => $row->company,
				'kurs' => $row->kurs,
			);
            $this->load->view('t35_kurs/t35_kurs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t35_kurs'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t35_kurs/create_action'),
			'idbkm' => set_value('idbkm'),
			'no' => set_value('no'),
			'tgl' => set_value('tgl'),
			'company' => set_value('company'),
			'kurs' => set_value('kurs'),
		);
        // $this->load->view('t35_kurs/t35_kurs_form', $data);
        $data['_view'] = 't35_kurs/t35_kurs_form';
        $data['_caption'] = 'Kurs';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'no' => $this->input->post('no',TRUE),
				'tgl' => $this->input->post('tgl',TRUE),
				'company' => $this->input->post('company',TRUE),
				'kurs' => $this->input->post('kurs',TRUE),
			);
            $this->T35_kurs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t35_kurs'));
        }
    }

    public function update($id)
    {
        $row = $this->T35_kurs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t35_kurs/update_action'),
				'idbkm' => set_value('idbkm', $row->idbkm),
				'no' => set_value('no', $row->no),
				'tgl' => set_value('tgl', $row->tgl),
				'company' => set_value('company', $row->company),
				'kurs' => set_value('kurs', $row->kurs),
			);
            // $this->load->view('t35_kurs/t35_kurs_form', $data);
            $data['_view'] = 't35_kurs/t35_kurs_form';
            $data['_caption'] = 'Kurs';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t35_kurs'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idbkm', TRUE));
        } else {
            $data = array(
				'no' => $this->input->post('no',TRUE),
				'tgl' => $this->input->post('tgl',TRUE),
				'company' => $this->input->post('company',TRUE),
				'kurs' => $this->input->post('kurs',TRUE),
			);
            $this->T35_kurs_model->update($this->input->post('idbkm', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t35_kurs'));
        }
    }

    public function delete($id)
    {
        $row = $this->T35_kurs_model->get_by_id($id);

        if ($row) {
            $this->T35_kurs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t35_kurs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t35_kurs'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('no', 'no', 'trim|required');
		$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
		$this->form_validation->set_rules('company', 'company', 'trim|required');
		$this->form_validation->set_rules('kurs', 'kurs', 'trim|required');
		$this->form_validation->set_rules('idbkm', 'idbkm', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t35_kurs.xls";
        $judul = "t35_kurs";
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
		xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
		xlsWriteLabel($tablehead, $kolomhead++, "Company");
		xlsWriteLabel($tablehead, $kolomhead++, "Kurs");
		foreach ($this->T35_kurs_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->no);
			xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
			xlsWriteLabel($tablebody, $kolombody++, $data->company);
			xlsWriteLabel($tablebody, $kolombody++, $data->kurs);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t35_kurs.doc");
        $data = array(
            't35_kurs_data' => $this->T35_kurs_model->get_all(),
            'start' => 0
        );
        $this->load->view('t35_kurs/t35_kurs_doc',$data);
    }

}

/* End of file T35_kurs.php */
/* Location: ./application/controllers/T35_kurs.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-28 10:03:43 */
/* http://harviacode.com */
