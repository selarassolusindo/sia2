<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T96_tglsa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T96_tglsa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't96_tglsa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't96_tglsa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't96_tglsa/index.html';
            $config['first_url'] = base_url() . 't96_tglsa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T96_tglsa_model->total_rows($q);
        $t96_tglsa = $this->T96_tglsa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't96_tglsa_data' => $t96_tglsa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t96_tglsa/t96_tglsa_list', $data);
        $data['_view'] = 't96_tglsa/t96_tglsa_list';
        $data['_caption'] = 'Tgl. Saldo Awal';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T96_tglsa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idtglsa' => $row->idtglsa,
		'TglSA' => $row->TglSA,
	    );
            // $this->load->view('t96_tglsa/t96_tglsa_read', $data);
            $data['_view'] = 't96_tglsa/t96_tglsa_read';
            $data['_caption'] = 'Tgl. Saldo Awal';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t96_tglsa'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t96_tglsa/create_action'),
    	    'idtglsa' => set_value('idtglsa'),
    	    'TglSA' => set_value('TglSA'),
    	);
        // $this->load->view('t96_tglsa/t96_tglsa_form', $data);
        $data['_view'] = 't96_tglsa/t96_tglsa_form';
        $data['_caption'] = 'Tgl. Saldo Awal';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'TglSA' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('TglSA',TRUE)))),
    	    );

            $this->T96_tglsa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t96_tglsa'));
        }
    }

    public function update($id)
    {
        $row = $this->T96_tglsa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t96_tglsa/update_action'),
        		'idtglsa' => set_value('idtglsa', $row->idtglsa),
        		'TglSA' => set_value('TglSA', date_format(date_create($row->TglSA), 'd-m-Y')),
    	    );
            // $this->load->view('t96_tglsa/t96_tglsa_form', $data);
            $data['_view'] = 't96_tglsa/t96_tglsa_form';
            $data['_caption'] = 'Tgl. Saldo Awal';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t96_tglsa'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idtglsa', TRUE));
        } else {
            $data = array(
                'TglSA' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('TglSA',TRUE)))),
    	    );

            $this->T96_tglsa_model->update($this->input->post('idtglsa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t96_tglsa'));
        }
    }

    public function delete($id)
    {
        $row = $this->T96_tglsa_model->get_by_id($id);

        if ($row) {
            $this->T96_tglsa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t96_tglsa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t96_tglsa'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('TglSA', 'tglsa', 'trim|required');

	$this->form_validation->set_rules('idtglsa', 'idtglsa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t96_tglsa.xls";
        $judul = "t96_tglsa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "TglSA");

	foreach ($this->T96_tglsa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TglSA);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t96_tglsa.doc");

        $data = array(
            't96_tglsa_data' => $this->T96_tglsa_model->get_all(),
            'start' => 0
        );

        $this->load->view('t96_tglsa/t96_tglsa_doc',$data);
    }

}

/* End of file T96_tglsa.php */
/* Location: ./application/controllers/T96_tglsa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-26 23:03:07 */
/* http://harviacode.com */
