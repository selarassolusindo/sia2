<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T05_tos2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T05_tos2_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't05_tos2?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't05_tos2?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't05_tos2';
            $config['first_url'] = base_url() . 't05_tos2';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T05_tos2_model->total_rows($q);
        $t05_tos2 = $this->T05_tos2_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't05_tos2_data' => $t05_tos2,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t05_tos2/t05_tos2_list', $data);
        $data['_view'] = 't05_tos2/t05_tos2_list';
        $data['_caption'] = 'Data Jenis Selisih PRICE-LIST';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T05_tos2_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idtos2' => $row->idtos2,
				'Type' => $row->Type,
				'idusers' => $row->idusers,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('t05_tos2/t05_tos2_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t05_tos2'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t05_tos2/create_action'),
			'idtos2' => set_value('idtos2'),
			'Type' => set_value('Type'),
		);
        // $this->load->view('t05_tos2/t05_tos2_form', $data);
        $data['_view'] = 't05_tos2/t05_tos2_form';
        $data['_caption'] = 'Data Selisih PRICE-LIST';
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
				'idusers' => $this->session->userdata('user_id'),
			);
            $this->T05_tos2_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t05_tos2'));
        }
    }

    public function update($id)
    {
        $row = $this->T05_tos2_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t05_tos2/update_action'),
				'idtos2' => set_value('idtos2', $row->idtos2),
				'Type' => set_value('Type', $row->Type),
			);
            // $this->load->view('t05_tos2/t05_tos2_form', $data);
            $data['_view'] = 't05_tos2/t05_tos2_form';
            $data['_caption'] = 'Data Jenis Selisih PRICE-LIST';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t05_tos2'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idtos2', TRUE));
        } else {
            $data = array(
				'Type' => $this->input->post('Type',TRUE),
				'idusers' => $this->session->userdata('user_id'),
			);
            $this->T05_tos2_model->update($this->input->post('idtos2', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t05_tos2'));
        }
    }

    public function delete($id)
    {
        $row = $this->T05_tos2_model->get_by_id($id);

        if ($row) {
            $this->T05_tos2_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t05_tos2'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t05_tos2'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Type', 'type', 'trim|required');
		$this->form_validation->set_rules('idtos2', 'idtos2', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t05_tos2.xls";
        $judul = "t05_tos2";
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
		foreach ($this->T05_tos2_model->get_all() as $data) {
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
        header("Content-Disposition: attachment;Filename=t05_tos2.doc");
        $data = array(
            't05_tos2_data' => $this->T05_tos2_model->get_all(),
            'start' => 0
        );
        $this->load->view('t05_tos2/t05_tos2_doc',$data);
    }

}

/* End of file T05_tos2.php */
/* Location: ./application/controllers/T05_tos2.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-20 19:53:06 */
/* http://harviacode.com */
