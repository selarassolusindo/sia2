<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T04_bayard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T04_bayard_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't04_bayard?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't04_bayard?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't04_bayard';
            $config['first_url'] = base_url() . 't04_bayard';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T04_bayard_model->total_rows($q);
        $t04_bayard = $this->T04_bayard_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't04_bayard_data' => $t04_bayard,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t04_bayard/t04_bayard_list', $data);
        $data['_view'] = 't04_bayard/t04_bayard_list';
        $data['_caption'] = 'Pembayaran';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T04_bayard_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idbayard' => $row->idbayard,
				'idbayar' => $row->idbayar,
				'tamu' => $row->tamu,
				'pt_ci' => $row->pt_ci,
				'kurs_usd_ci' => $row->kurs_usd_ci,
				'kurs_aud_ci' => $row->kurs_aud_ci,
				'usd_ci' => $row->usd_ci,
				'aud_ci' => $row->aud_ci,
				'paypal_ci' => $row->paypal_ci,
				'bca_d_ci' => $row->bca_d_ci,
				'rp_ci' => $row->rp_ci,
				'cc_bca_ci' => $row->cc_bca_ci,
				'cc_mdr_ci' => $row->cc_mdr_ci,
				'tot_rp_ci' => $row->tot_rp_ci,
				'slsh_ci' => $row->slsh_ci,
				'slsh_blm_ci' => $row->slsh_blm_ci,
				'slsh_krg_ci' => $row->slsh_krg_ci,
				'slsh_disc_ci' => $row->slsh_disc_ci,
				'slsh_chrg_ci' => $row->slsh_chrg_ci,
				'slsh_kurs_ci' => $row->slsh_kurs_ci,
				'sha_inc_piw' => $row->sha_inc_piw,
				'sha_inc_ssw' => $row->sha_inc_ssw,
				'paid_by' => $row->paid_by,
				'idusers' => $row->idusers,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('t04_bayard/t04_bayard_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t04_bayard'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t04_bayard/create_action'),
			'idbayard' => set_value('idbayard'),
			'idbayar' => set_value('idbayar'),
			'tamu' => set_value('tamu'),
			'pt_ci' => set_value('pt_ci'),
			'kurs_usd_ci' => set_value('kurs_usd_ci'),
			'kurs_aud_ci' => set_value('kurs_aud_ci'),
			'usd_ci' => set_value('usd_ci'),
			'aud_ci' => set_value('aud_ci'),
			'paypal_ci' => set_value('paypal_ci'),
			'bca_d_ci' => set_value('bca_d_ci'),
			'rp_ci' => set_value('rp_ci'),
			'cc_bca_ci' => set_value('cc_bca_ci'),
			'cc_mdr_ci' => set_value('cc_mdr_ci'),
			'tot_rp_ci' => set_value('tot_rp_ci'),
			'slsh_ci' => set_value('slsh_ci'),
			'slsh_blm_ci' => set_value('slsh_blm_ci'),
			'slsh_krg_ci' => set_value('slsh_krg_ci'),
			'slsh_disc_ci' => set_value('slsh_disc_ci'),
			'slsh_chrg_ci' => set_value('slsh_chrg_ci'),
			'slsh_kurs_ci' => set_value('slsh_kurs_ci'),
			'sha_inc_piw' => set_value('sha_inc_piw'),
			'sha_inc_ssw' => set_value('sha_inc_ssw'),
			'paid_by' => set_value('paid_by'),
			'idusers' => set_value('idusers'),
			'created_at' => set_value('created_at'),
			'updated_at' => set_value('updated_at'),
		);
        // $this->load->view('t04_bayard/t04_bayard_form', $data);
        $data['_view'] = 't04_bayard/t04_bayard_form';
        $data['_caption'] = 'Pembayaran';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'idbayar' => $this->input->post('idbayar',TRUE),
				'tamu' => $this->input->post('tamu',TRUE),
				'pt_ci' => $this->input->post('pt_ci',TRUE),
				'kurs_usd_ci' => $this->input->post('kurs_usd_ci',TRUE),
				'kurs_aud_ci' => $this->input->post('kurs_aud_ci',TRUE),
				'usd_ci' => $this->input->post('usd_ci',TRUE),
				'aud_ci' => $this->input->post('aud_ci',TRUE),
				'paypal_ci' => $this->input->post('paypal_ci',TRUE),
				'bca_d_ci' => $this->input->post('bca_d_ci',TRUE),
				'rp_ci' => $this->input->post('rp_ci',TRUE),
				'cc_bca_ci' => $this->input->post('cc_bca_ci',TRUE),
				'cc_mdr_ci' => $this->input->post('cc_mdr_ci',TRUE),
				'tot_rp_ci' => $this->input->post('tot_rp_ci',TRUE),
				'slsh_ci' => $this->input->post('slsh_ci',TRUE),
				'slsh_blm_ci' => $this->input->post('slsh_blm_ci',TRUE),
				'slsh_krg_ci' => $this->input->post('slsh_krg_ci',TRUE),
				'slsh_disc_ci' => $this->input->post('slsh_disc_ci',TRUE),
				'slsh_chrg_ci' => $this->input->post('slsh_chrg_ci',TRUE),
				'slsh_kurs_ci' => $this->input->post('slsh_kurs_ci',TRUE),
				'sha_inc_piw' => $this->input->post('sha_inc_piw',TRUE),
				'sha_inc_ssw' => $this->input->post('sha_inc_ssw',TRUE),
				'paid_by' => $this->input->post('paid_by',TRUE),
				'idusers' => $this->input->post('idusers',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T04_bayard_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t04_bayard'));
        }
    }

    public function update($id)
    {
        $row = $this->T04_bayard_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t04_bayard/update_action'),
				'idbayard' => set_value('idbayard', $row->idbayard),
				'idbayar' => set_value('idbayar', $row->idbayar),
				'tamu' => set_value('tamu', $row->tamu),
				'pt_ci' => set_value('pt_ci', $row->pt_ci),
				'kurs_usd_ci' => set_value('kurs_usd_ci', $row->kurs_usd_ci),
				'kurs_aud_ci' => set_value('kurs_aud_ci', $row->kurs_aud_ci),
				'usd_ci' => set_value('usd_ci', $row->usd_ci),
				'aud_ci' => set_value('aud_ci', $row->aud_ci),
				'paypal_ci' => set_value('paypal_ci', $row->paypal_ci),
				'bca_d_ci' => set_value('bca_d_ci', $row->bca_d_ci),
				'rp_ci' => set_value('rp_ci', $row->rp_ci),
				'cc_bca_ci' => set_value('cc_bca_ci', $row->cc_bca_ci),
				'cc_mdr_ci' => set_value('cc_mdr_ci', $row->cc_mdr_ci),
				'tot_rp_ci' => set_value('tot_rp_ci', $row->tot_rp_ci),
				'slsh_ci' => set_value('slsh_ci', $row->slsh_ci),
				'slsh_blm_ci' => set_value('slsh_blm_ci', $row->slsh_blm_ci),
				'slsh_krg_ci' => set_value('slsh_krg_ci', $row->slsh_krg_ci),
				'slsh_disc_ci' => set_value('slsh_disc_ci', $row->slsh_disc_ci),
				'slsh_chrg_ci' => set_value('slsh_chrg_ci', $row->slsh_chrg_ci),
				'slsh_kurs_ci' => set_value('slsh_kurs_ci', $row->slsh_kurs_ci),
				'sha_inc_piw' => set_value('sha_inc_piw', $row->sha_inc_piw),
				'sha_inc_ssw' => set_value('sha_inc_ssw', $row->sha_inc_ssw),
				'paid_by' => set_value('paid_by', $row->paid_by),
				'idusers' => set_value('idusers', $row->idusers),
				'created_at' => set_value('created_at', $row->created_at),
				'updated_at' => set_value('updated_at', $row->updated_at),
			);
            // $this->load->view('t04_bayard/t04_bayard_form', $data);
            $data['_view'] = 't04_bayard/t04_bayard_form';
            $data['_caption'] = 'Pembayaran';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t04_bayard'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idbayard', TRUE));
        } else {
            $data = array(
				'idbayar' => $this->input->post('idbayar',TRUE),
				'tamu' => $this->input->post('tamu',TRUE),
				'pt_ci' => $this->input->post('pt_ci',TRUE),
				'kurs_usd_ci' => $this->input->post('kurs_usd_ci',TRUE),
				'kurs_aud_ci' => $this->input->post('kurs_aud_ci',TRUE),
				'usd_ci' => $this->input->post('usd_ci',TRUE),
				'aud_ci' => $this->input->post('aud_ci',TRUE),
				'paypal_ci' => $this->input->post('paypal_ci',TRUE),
				'bca_d_ci' => $this->input->post('bca_d_ci',TRUE),
				'rp_ci' => $this->input->post('rp_ci',TRUE),
				'cc_bca_ci' => $this->input->post('cc_bca_ci',TRUE),
				'cc_mdr_ci' => $this->input->post('cc_mdr_ci',TRUE),
				'tot_rp_ci' => $this->input->post('tot_rp_ci',TRUE),
				'slsh_ci' => $this->input->post('slsh_ci',TRUE),
				'slsh_blm_ci' => $this->input->post('slsh_blm_ci',TRUE),
				'slsh_krg_ci' => $this->input->post('slsh_krg_ci',TRUE),
				'slsh_disc_ci' => $this->input->post('slsh_disc_ci',TRUE),
				'slsh_chrg_ci' => $this->input->post('slsh_chrg_ci',TRUE),
				'slsh_kurs_ci' => $this->input->post('slsh_kurs_ci',TRUE),
				'sha_inc_piw' => $this->input->post('sha_inc_piw',TRUE),
				'sha_inc_ssw' => $this->input->post('sha_inc_ssw',TRUE),
				'paid_by' => $this->input->post('paid_by',TRUE),
				'idusers' => $this->input->post('idusers',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T04_bayard_model->update($this->input->post('idbayard', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t04_bayard'));
        }
    }

    public function delete($id)
    {
        $row = $this->T04_bayard_model->get_by_id($id);

        if ($row) {
            $this->T04_bayard_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t04_bayard'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t04_bayard'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('idbayar', 'idbayar', 'trim|required');
		$this->form_validation->set_rules('tamu', 'tamu', 'trim|required');
		$this->form_validation->set_rules('pt_ci', 'pt ci', 'trim|required');
		$this->form_validation->set_rules('kurs_usd_ci', 'kurs usd ci', 'trim|required|numeric');
		$this->form_validation->set_rules('kurs_aud_ci', 'kurs aud ci', 'trim|required|numeric');
		$this->form_validation->set_rules('usd_ci', 'usd ci', 'trim|required|numeric');
		$this->form_validation->set_rules('aud_ci', 'aud ci', 'trim|required|numeric');
		$this->form_validation->set_rules('paypal_ci', 'paypal ci', 'trim|required|numeric');
		$this->form_validation->set_rules('bca_d_ci', 'bca d ci', 'trim|required|numeric');
		$this->form_validation->set_rules('rp_ci', 'rp ci', 'trim|required|numeric');
		$this->form_validation->set_rules('cc_bca_ci', 'cc bca ci', 'trim|required|numeric');
		$this->form_validation->set_rules('cc_mdr_ci', 'cc mdr ci', 'trim|required|numeric');
		$this->form_validation->set_rules('tot_rp_ci', 'tot rp ci', 'trim|required|numeric');
		$this->form_validation->set_rules('slsh_ci', 'slsh ci', 'trim|required|numeric');
		$this->form_validation->set_rules('slsh_blm_ci', 'slsh blm ci', 'trim|required|numeric');
		$this->form_validation->set_rules('slsh_krg_ci', 'slsh krg ci', 'trim|required|numeric');
		$this->form_validation->set_rules('slsh_disc_ci', 'slsh disc ci', 'trim|required|numeric');
		$this->form_validation->set_rules('slsh_chrg_ci', 'slsh chrg ci', 'trim|required|numeric');
		$this->form_validation->set_rules('slsh_kurs_ci', 'slsh kurs ci', 'trim|required|numeric');
		$this->form_validation->set_rules('sha_inc_piw', 'sha inc piw', 'trim|required|numeric');
		$this->form_validation->set_rules('sha_inc_ssw', 'sha inc ssw', 'trim|required|numeric');
		$this->form_validation->set_rules('paid_by', 'paid by', 'trim|required');
		$this->form_validation->set_rules('idusers', 'idusers', 'trim|required');
		$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('idbayard', 'idbayard', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t04_bayard.xls";
        $judul = "t04_bayard";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Tamu");
		xlsWriteLabel($tablehead, $kolomhead++, "Pt Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Kurs Usd Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Kurs Aud Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Usd Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Aud Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Paypal Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Bca D Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Rp Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Cc Bca Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Cc Mdr Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Tot Rp Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Slsh Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Slsh Blm Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Slsh Krg Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Slsh Disc Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Slsh Chrg Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Slsh Kurs Ci");
		xlsWriteLabel($tablehead, $kolomhead++, "Sha Inc Piw");
		xlsWriteLabel($tablehead, $kolomhead++, "Sha Inc Ssw");
		xlsWriteLabel($tablehead, $kolomhead++, "Paid By");
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->T04_bayard_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->idbayar);
			xlsWriteNumber($tablebody, $kolombody++, $data->tamu);
			xlsWriteNumber($tablebody, $kolombody++, $data->pt_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->kurs_usd_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->kurs_aud_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->usd_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->aud_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->paypal_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->bca_d_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->rp_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->cc_bca_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->cc_mdr_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->tot_rp_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->slsh_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->slsh_blm_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->slsh_krg_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->slsh_disc_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->slsh_chrg_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->slsh_kurs_ci);
			xlsWriteNumber($tablebody, $kolombody++, $data->sha_inc_piw);
			xlsWriteNumber($tablebody, $kolombody++, $data->sha_inc_ssw);
			xlsWriteNumber($tablebody, $kolombody++, $data->paid_by);
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
        header("Content-Disposition: attachment;Filename=t04_bayard.doc");
        $data = array(
            't04_bayard_data' => $this->T04_bayard_model->get_all(),
            'start' => 0
        );
        $this->load->view('t04_bayard/t04_bayard_doc',$data);
    }

}

/* End of file T04_bayard.php */
/* Location: ./application/controllers/T04_bayard.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-06 09:49:31 */
/* http://harviacode.com */
