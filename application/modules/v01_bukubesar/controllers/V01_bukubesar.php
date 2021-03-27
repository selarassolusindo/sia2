<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V01_bukubesar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('V01_bukubesar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'v01_bukubesar/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'v01_bukubesar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'v01_bukubesar/index.html';
            $config['first_url'] = base_url() . 'v01_bukubesar/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->V01_bukubesar_model->total_rows($q);
        $v01_bukubesar = $this->V01_bukubesar_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'v01_bukubesar_data' => $v01_bukubesar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('v01_bukubesar/v01_bukubesar_list', $data);
        $data['_view'] = 'v01_bukubesar/v01_bukubesar_list';
        $data['_caption'] = 'Buku Besar';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->V01_bukubesar_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'idakun' => $row->idakun,
        		'Kode' => $row->Kode,
        		'Nama' => $row->Nama,
        		'Induk' => $row->Induk,
        		'Urut' => $row->Urut,
        		'Debit' => $row->Debit,
        		'Kredit' => $row->Kredit,
    	    );
            // $this->load->view('v01_bukubesar/v01_bukubesar_read', $data);
            $data['_view'] = 'v01_bukubesar/v01_bukubesar_read';
            $data['_caption'] = 'Buku Besar';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v01_bukubesar'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('v01_bukubesar/create_action'),
    	    'idakun' => set_value('idakun'),
    	    'Kode' => set_value('Kode'),
    	    'Nama' => set_value('Nama'),
    	    'Induk' => set_value('Induk'),
    	    'Urut' => set_value('Urut'),
    	    'Debit' => set_value('Debit'),
    	    'Kredit' => set_value('Kredit'),
    	);
        // $this->load->view('v01_bukubesar/v01_bukubesar_form', $data);
        $data['_view'] = 'v01_bukubesar/v01_bukubesar_form';
        $data['_caption'] = 'Buku Besar';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'idakun' => $this->input->post('idakun',TRUE),
        		'Kode' => $this->input->post('Kode',TRUE),
        		'Nama' => $this->input->post('Nama',TRUE),
        		'Induk' => $this->input->post('Induk',TRUE),
        		'Urut' => $this->input->post('Urut',TRUE),
        		'Debit' => $this->input->post('Debit',TRUE),
        		'Kredit' => $this->input->post('Kredit',TRUE),
    	    );

            $this->V01_bukubesar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('v01_bukubesar'));
        }
    }

    public function update($id)
    {
        $row = $this->V01_bukubesar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('v01_bukubesar/update_action'),
        		'idakun' => set_value('idakun', $row->idakun),
        		'Kode' => set_value('Kode', $row->Kode),
        		'Nama' => set_value('Nama', $row->Nama),
        		'Induk' => set_value('Induk', $row->Induk),
        		'Urut' => set_value('Urut', $row->Urut),
        		'Debit' => set_value('Debit', $row->Debit),
        		'Kredit' => set_value('Kredit', $row->Kredit),
    	    );
            // $this->load->view('v01_bukubesar/v01_bukubesar_form', $data);
            $data['_view'] = 'v01_bukubesar/v01_bukubesar_form';
            $data['_caption'] = 'Buku Besar';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v01_bukubesar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
        		'idakun' => $this->input->post('idakun',TRUE),
        		'Kode' => $this->input->post('Kode',TRUE),
        		'Nama' => $this->input->post('Nama',TRUE),
        		'Induk' => $this->input->post('Induk',TRUE),
        		'Urut' => $this->input->post('Urut',TRUE),
        		'Debit' => $this->input->post('Debit',TRUE),
        		'Kredit' => $this->input->post('Kredit',TRUE),
    	    );

            $this->V01_bukubesar_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('v01_bukubesar'));
        }
    }

    public function delete($id)
    {
        $row = $this->V01_bukubesar_model->get_by_id($id);

        if ($row) {
            $this->V01_bukubesar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('v01_bukubesar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v01_bukubesar'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('idakun', 'idakun', 'trim|required');
	$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('Induk', 'induk', 'trim|required');
	$this->form_validation->set_rules('Urut', 'urut', 'trim|required');
	$this->form_validation->set_rules('Debit', 'debit', 'trim|required|numeric');
	$this->form_validation->set_rules('Kredit', 'kredit', 'trim|required|numeric');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "v01_bukubesar.xls";
        $judul = "v01_bukubesar";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Idakun");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Induk");
	xlsWriteLabel($tablehead, $kolomhead++, "Urut");
	xlsWriteLabel($tablehead, $kolomhead++, "Debit");
	xlsWriteLabel($tablehead, $kolomhead++, "Kredit");

	foreach ($this->V01_bukubesar_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idakun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Induk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Urut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Debit);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Kredit);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=v01_bukubesar.doc");

        $data = array(
            'v01_bukubesar_data' => $this->V01_bukubesar_model->get_all(),
            'start' => 0
        );

        $this->load->view('v01_bukubesar/v01_bukubesar_doc',$data);
    }

}

/* End of file V01_bukubesar.php */
/* Location: ./application/controllers/V01_bukubesar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-27 21:03:39 */
/* http://harviacode.com */
