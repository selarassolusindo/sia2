<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T03_agent extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T03_agent_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't03_agent?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't03_agent?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't03_agent';
            $config['first_url'] = base_url() . 't03_agent';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T03_agent_model->total_rows($q);
        $t03_agent = $this->T03_agent_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't03_agent_data' => $t03_agent,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t03_agent/t03_agent_list', $data);
        $data['_view'] = 't03_agent/t03_agent_list';
        $data['_caption'] = 'Agent';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T03_agent_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idagent' => $row->idagent,
				'Agent' => $row->Agent,
				'idusers' => $row->idusers,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('t03_agent/t03_agent_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_agent'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t03_agent/create_action'),
			'idagent' => set_value('idagent'),
			'Agent' => set_value('Agent'),
			// 'idusers' => set_value('idusers'),
			// 'created_at' => set_value('created_at'),
			// 'updated_at' => set_value('updated_at'),
		);
        // $this->load->view('t03_agent/t03_agent_form', $data);
        $data['_view'] = 't03_agent/t03_agent_form';
        $data['_caption'] = 'Agent';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'Agent' => $this->input->post('Agent',TRUE),
				'idusers' => $this->session->userdata('user_id'),
				// 'created_at' => $this->input->post('created_at',TRUE),
				// 'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T03_agent_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t03_agent'));
        }
    }

    public function update($id)
    {
        $row = $this->T03_agent_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t03_agent/update_action'),
				'idagent' => set_value('idagent', $row->idagent),
				'Agent' => set_value('Agent', $row->Agent),
				// 'idusers' => set_value('idusers', $row->idusers),
				// 'created_at' => set_value('created_at', $row->created_at),
				// 'updated_at' => set_value('updated_at', $row->updated_at),
			);
            // $this->load->view('t03_agent/t03_agent_form', $data);
            $data['_view'] = 't03_agent/t03_agent_form';
            $data['_caption'] = 'Agent';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_agent'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idagent', TRUE));
        } else {
            $data = array(
				'Agent' => $this->input->post('Agent',TRUE),
				'idusers' => $this->session->userdata('user_id'),
				// 'created_at' => $this->input->post('created_at',TRUE),
				// 'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T03_agent_model->update($this->input->post('idagent', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t03_agent'));
        }
    }

    public function delete($id)
    {
        $row = $this->T03_agent_model->get_by_id($id);

        if ($row) {
            $this->T03_agent_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t03_agent'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_agent'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Agent', 'agent', 'trim|required');
		// $this->form_validation->set_rules('idusers', 'idusers', 'trim|required');
		// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('idagent', 'idagent', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t03_agent.xls";
        $judul = "t03_agent";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Agent");
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->T03_agent_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Agent);
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
        header("Content-Disposition: attachment;Filename=t03_agent.doc");
        $data = array(
            't03_agent_data' => $this->T03_agent_model->get_all(),
            'start' => 0
        );
        $this->load->view('t03_agent/t03_agent_doc',$data);
    }

}

/* End of file T03_agent.php */
/* Location: ./application/controllers/T03_agent.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-10 13:25:52 */
/* http://harviacode.com */
