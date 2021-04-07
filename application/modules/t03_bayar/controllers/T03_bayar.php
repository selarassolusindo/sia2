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

        $this->load->model('t02_tamu/T02_tamu_model');
        $this->load->model('t04_bayard/T04_bayard_model');
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
        $data['_caption'] = 'Pembayaran';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T03_bayar_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idbayar' => $row->idbayar,
				'TripNo' => $row->TripNo,
				'TripTgl' => $row->TripTgl,
				'Total' => $row->Total,
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
            'button' => 'Proses',
            'action' => site_url('t03_bayar/create_action'),
			'idbayar' => set_value('idbayar'),
			'TripNo' => set_value('TripNo'),
			'TripTgl' => set_value('TripTgl'),
			'Total' => set_value('Total'),
			// 'idusers' => set_value('idusers'),
			// 'created_at' => set_value('created_at'),
			// 'updated_at' => set_value('updated_at'),
		);
        // $this->load->view('t03_bayar/t03_bayar_form', $data);
        $data['_view'] = 't03_bayar/t03_bayar_form';
        $data['_caption'] = 'Pembayaran';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            /**
             * cari data tanggal trip berdasarkan nomor trip
             */
            $row = $this->T02_tamu_model->getByTripNo($this->input->post('TripNo',TRUE));
            if ($row) {

                /**
                 * simpan data master bayar
                 */
                $data = array(
    				'TripNo' => $this->input->post('TripNo',TRUE),
    				'TripTgl' => $row->TripTgl,
    				'Total' => 0,
    				'idusers' => $this->session->userdata('user_id'),
    				// 'created_at' => $this->input->post('created_at',TRUE),
    				// 'updated_at' => $this->input->post('updated_at',TRUE),
    			);
                $this->T03_bayar_model->insert($data);

                /**
                 * simpan id master bayar terbaru
                 */
                $insert_id = $this->T03_bayar_model->getInsertId();

                /**
                 * simpan data setiap tamu ke tabel detail
                */
                $data = $this->T02_tamu_model->getAllByTripNo($this->input->post('TripNo',TRUE));
                foreach ($data as $row) {
                    $detail = [
                        'idbayar' => $insert_id,
                        'tamu' => $row->idtamu,
                        'idusers' => $this->session->userdata('user_id'),
                        ];
                    $this->T04_bayard_model->insert($detail);
                }

                // $this->session->set_flashdata('message', 'Create Record Success');
                // redirect(site_url('t03_bayar'));
                // redirect(site_url('t04_bayard?q=' . $insert_id));
                redirect(site_url('t03_bayar/proses/' . $insert_id));
            } else {
                $this->session->set_flashdata('message', 'Tanggal Trip Ditemukan');
                redirect(site_url('t03_bayar'));
            }
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
				'TripNo' => set_value('TripNo', $row->TripNo),
				'TripTgl' => set_value('TripTgl', $row->TripTgl),
				'Total' => set_value('Total', $row->Total),
				// 'idusers' => set_value('idusers', $row->idusers),
				// 'created_at' => set_value('created_at', $row->created_at),
				// 'updated_at' => set_value('updated_at', $row->updated_at),
			);
            // $this->load->view('t03_bayar/t03_bayar_form', $data);
            $data['_view'] = 't03_bayar/t03_bayar_form';
            $data['_caption'] = 'Pembayaran';
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
				'TripNo' => $this->input->post('TripNo',TRUE),
				'TripTgl' => $this->input->post('TripTgl',TRUE),
				'Total' => $this->input->post('Total',TRUE),
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
		$this->form_validation->set_rules('TripNo', 'tripno', 'trim|required');
		// $this->form_validation->set_rules('TripTgl', 'triptgl', 'trim|required');
		// $this->form_validation->set_rules('Total', 'total', 'trim|required|numeric');
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
		xlsWriteLabel($tablehead, $kolomhead++, "TripNo");
		xlsWriteLabel($tablehead, $kolomhead++, "TripTgl");
		xlsWriteLabel($tablehead, $kolomhead++, "Total");
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->T03_bayar_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->TripNo);
			xlsWriteLabel($tablebody, $kolombody++, $data->TripTgl);
			xlsWriteNumber($tablebody, $kolombody++, $data->Total);
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

    /**
     * proses pembayaran yang menyertakan detail data
     */
    public function proses($id)
    {
        $row = $this->T03_bayar_model->get_by_id($id);

        if ($row) {

            /**
             * ambil data master
             */
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t03_bayar/proses_action'),
				'idbayar' => set_value('idbayar', $row->idbayar),
				'TripNo' => set_value('TripNo', $row->TripNo),
				'TripTgl' => set_value('TripTgl', $row->TripTgl),
				'Total' => set_value('Total', $row->Total),
			);

            /**
             * ambil data detail
             */
            $dataTamu = $this->T04_bayard_model->get_limit_data(1000, 0, $row->idbayar);
            $data['dataTamu'] = $dataTamu;

            // $this->load->view('t03_bayar/t03_bayar_form', $data);
            $data['_view'] = 't03_bayar/t03_bayar_proses';
            $data['_caption'] = 'Pembayaran';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_bayar'));
        }
    }

    public function proses_action()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
            // $this->update($this->input->post('idbayar', TRUE));
        // } else {
            $data = array(
				// 'TripNo' => $this->input->post('TripNo',TRUE),
				// 'TripTgl' => $this->input->post('TripTgl',TRUE),
				// 'Total' => $this->input->post('Total',TRUE),
                'idusers' => $this->session->userdata('user_id'),
				// 'created_at' => $this->input->post('created_at',TRUE),
				// 'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->T03_bayar_model->update($this->input->post('idbayar', TRUE), $data);

            /**
             * simpan id data yang akan diupdate dari tabel master
             */
            $idbayar = $this->input->post('idbayar', TRUE);

            /**
             * hapus dulu data lama di tabel detail
             */
            $this->T04_bayard_model->deleteByIdbayar($idbayar);

            /**
             * simpan data di tabel detail
             */
            $totalJumlah = 0;
            $data = $this->input->post();
            foreach ($data['pt_ci'] as $key => $item) {
  				$detail = [
  					'idbayar' => $idbayar,
                    'tamu' => $data['tamu'][$key],
  					'pt_ci' => $item,
                    'kurs_usd_ci' => $data['kurs_usd_ci'][$key],
                    'kurs_aud_ci' => $data['kurs_aud_ci'][$key],
                    'usd_ci' => $data['usd_ci'][$key],
                    'aud_ci' => $data['aud_ci'][$key],
                    'paypal_ci' => $data['paypal_ci'][$key],
                    'bca_d_ci' => $data['bca_d_ci'][$key],
                    'rp_ci' => $data['rp_ci'][$key],
                    'cc_bca_ci' => $data['cc_bca_ci'][$key],
                    'cc_mdr_ci' => $data['cc_mdr_ci'][$key],
                    'tot_rp_ci' => $data['tot_rp_ci'][$key],
                    'slsh_ci' => $data['slsh_ci'][$key],
                    'slsh_blm_ci' => $data['slsh_blm_ci'][$key],
                    'slsh_krg_ci' => $data['slsh_krg_ci'][$key],
                    'slsh_disc_ci' => $data['slsh_disc_ci'][$key],
                    'slsh_chrg_ci' => $data['slsh_chrg_ci'][$key],
                    'slsh_kurs_ci' => $data['slsh_kurs_ci'][$key],
                    'sha_inc_piw' => $data['sha_inc_piw'][$key],
                    'sha_inc_ssw' => $data['sha_inc_ssw'][$key],
                    'paid_by' => $data['paid_by'][$key],
  				];
                // $totalJumlah += $data['jumlah'][$key];
                $this->T04_bayard_model->insert($detail);
  			}

            // $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t03_bayar'));
        // }
    }

}

/* End of file T03_bayar.php */
/* Location: ./application/controllers/T03_bayar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-06 11:25:03 */
/* http://harviacode.com */
