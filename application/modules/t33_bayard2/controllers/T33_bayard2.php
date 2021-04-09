<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T33_bayard2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T33_bayard2_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't33_bayard2?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't33_bayard2?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't33_bayard2';
            $config['first_url'] = base_url() . 't33_bayard2';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T33_bayard2_model->total_rows($q);
        $t33_bayard2 = $this->T33_bayard2_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't33_bayard2_data' => $t33_bayard2,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t33_bayard2/t33_bayard2_list', $data);
    }

    public function read($id)
    {
        $row = $this->T33_bayard2_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idbayard2' => $row->idbayard2,
				'idbayard' => $row->idbayard,
				'idtop' => $row->idtop,
				'Jumlah' => $row->Jumlah,
				'idusers' => $row->idusers,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('t33_bayard2/t33_bayard2_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t33_bayard2'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t33_bayard2/create_action'),
			'idbayard2' => set_value('idbayard2'),
			'idbayard' => set_value('idbayard'),
			'idtop' => set_value('idtop'),
			'Jumlah' => set_value('Jumlah'),
			'idusers' => set_value('idusers'),
			'created_at' => set_value('created_at'),
			'updated_at' => set_value('updated_at'),
		);
        $this->load->view('t33_bayard2/t33_bayard2_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'idbayard' => $this->input->post('idbayard',TRUE),
				'idtop' => $this->input->post('idtop',TRUE),
				'Jumlah' => $this->input->post('Jumlah',TRUE),
				'idusers' => $this->input->post('idusers',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T33_bayard2_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t33_bayard2'));
        }
    }

    public function update($id)
    {
        $row = $this->T33_bayard2_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t33_bayard2/update_action'),
				'idbayard2' => set_value('idbayard2', $row->idbayard2),
				'idbayard' => set_value('idbayard', $row->idbayard),
				'idtop' => set_value('idtop', $row->idtop),
				'Jumlah' => set_value('Jumlah', $row->Jumlah),
				'idusers' => set_value('idusers', $row->idusers),
				'created_at' => set_value('created_at', $row->created_at),
				'updated_at' => set_value('updated_at', $row->updated_at),
			);
            $this->load->view('t33_bayard2/t33_bayard2_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t33_bayard2'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idbayard2', TRUE));
        } else {
            $data = array(
				'idbayard' => $this->input->post('idbayard',TRUE),
				'idtop' => $this->input->post('idtop',TRUE),
				'Jumlah' => $this->input->post('Jumlah',TRUE),
				'idusers' => $this->input->post('idusers',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T33_bayard2_model->update($this->input->post('idbayard2', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t33_bayard2'));
        }
    }

    public function delete($id)
    {
        $row = $this->T33_bayard2_model->get_by_id($id);

        if ($row) {
            $this->T33_bayard2_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t33_bayard2'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t33_bayard2'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('idbayard', 'idbayard', 'trim|required');
		$this->form_validation->set_rules('idtop', 'idtop', 'trim|required');
		$this->form_validation->set_rules('Jumlah', 'jumlah', 'trim|required|numeric');
		$this->form_validation->set_rules('idusers', 'idusers', 'trim|required');
		$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('idbayard2', 'idbayard2', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t33_bayard2.xls";
        $judul = "t33_bayard2";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Idbayard");
		xlsWriteLabel($tablehead, $kolomhead++, "Idtop");
		xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->T33_bayard2_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->idbayard);
			xlsWriteLabel($tablebody, $kolombody++, $data->idtop);
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
        header("Content-Disposition: attachment;Filename=t33_bayard2.doc");
        $data = array(
            't33_bayard2_data' => $this->T33_bayard2_model->get_all(),
            'start' => 0
        );
        $this->load->view('t33_bayard2/t33_bayard2_doc',$data);
    }

    public function getJumlah($idbayard, $idtop)
    {
        echo $this->T33_bayard2_model->getJumlah($idbayard, $idtop)->Jumlah;
    }

}

/* End of file T33_bayard2.php */
/* Location: ./application/controllers/T33_bayard2.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-08 18:00:59 */
/* http://harviacode.com */
