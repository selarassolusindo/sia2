<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T34_bayars2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T34_bayars2_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't34_bayars2?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't34_bayars2?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't34_bayars2';
            $config['first_url'] = base_url() . 't34_bayars2';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T34_bayars2_model->total_rows($q);
        $t34_bayars2 = $this->T34_bayars2_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't34_bayars2_data' => $t34_bayars2,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t34_bayars2/t34_bayars2_list', $data);
    }

    public function read($id)
    {
        $row = $this->T34_bayars2_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idbayars2' => $row->idbayars2,
				'idbayar' => $row->idbayar,
				'idtos2' => $row->idtos2,
				'Jumlah' => $row->Jumlah,
				'idusers' => $row->idusers,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('t34_bayars2/t34_bayars2_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t34_bayars2'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t34_bayars2/create_action'),
			'idbayars2' => set_value('idbayars2'),
			'idbayar' => set_value('idbayar'),
			'idtos2' => set_value('idtos2'),
			'Jumlah' => set_value('Jumlah'),
			'idusers' => set_value('idusers'),
			'created_at' => set_value('created_at'),
			'updated_at' => set_value('updated_at'),
		);
        $this->load->view('t34_bayars2/t34_bayars2_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'idbayar' => $this->input->post('idbayar',TRUE),
				'idtos2' => $this->input->post('idtos2',TRUE),
				'Jumlah' => $this->input->post('Jumlah',TRUE),
				'idusers' => $this->input->post('idusers',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T34_bayars2_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t34_bayars2'));
        }
    }

    public function update($id)
    {
        $row = $this->T34_bayars2_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t34_bayars2/update_action'),
				'idbayars2' => set_value('idbayars2', $row->idbayars2),
				'idbayar' => set_value('idbayar', $row->idbayar),
				'idtos2' => set_value('idtos2', $row->idtos2),
				'Jumlah' => set_value('Jumlah', $row->Jumlah),
				'idusers' => set_value('idusers', $row->idusers),
				'created_at' => set_value('created_at', $row->created_at),
				'updated_at' => set_value('updated_at', $row->updated_at),
			);
            $this->load->view('t34_bayars2/t34_bayars2_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t34_bayars2'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idbayars2', TRUE));
        } else {
            $data = array(
				'idbayar' => $this->input->post('idbayar',TRUE),
				'idtos2' => $this->input->post('idtos2',TRUE),
				'Jumlah' => $this->input->post('Jumlah',TRUE),
				'idusers' => $this->input->post('idusers',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T34_bayars2_model->update($this->input->post('idbayars2', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t34_bayars2'));
        }
    }

    public function delete($id)
    {
        $row = $this->T34_bayars2_model->get_by_id($id);

        if ($row) {
            $this->T34_bayars2_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t34_bayars2'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t34_bayars2'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('idbayar', 'idbayar', 'trim|required');
		$this->form_validation->set_rules('idtos2', 'idtos2', 'trim|required');
		$this->form_validation->set_rules('Jumlah', 'jumlah', 'trim|required|numeric');
		$this->form_validation->set_rules('idusers', 'idusers', 'trim|required');
		$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('idbayars2', 'idbayars2', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t34_bayars2.xls";
        $judul = "t34_bayars2";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Idbayar");
		xlsWriteLabel($tablehead, $kolomhead++, "Idtos2");
		xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->T34_bayars2_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->idbayar);
			xlsWriteNumber($tablebody, $kolombody++, $data->idtos2);
			xlsWriteNumber($tablebody, $kolombody++, $data->Jumlah);
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
        header("Content-Disposition: attachment;Filename=t34_bayars2.doc");
        $data = array(
            't34_bayars2_data' => $this->T34_bayars2_model->get_all(),
            'start' => 0
        );
        $this->load->view('t34_bayars2/t34_bayars2_doc',$data);
    }

}

/* End of file T34_bayars2.php */
/* Location: ./application/controllers/T34_bayars2.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-20 21:05:45 */
/* http://harviacode.com */