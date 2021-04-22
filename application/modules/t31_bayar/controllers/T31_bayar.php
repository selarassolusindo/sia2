<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T31_bayar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T31_bayar_model');
        $this->load->library('form_validation');

        $this->load->model('t02_top/T02_top_model');
        $this->load->model('t32_bayard/T32_bayard_model');
        $this->load->model('t04_tos/T04_tos_model');
        $this->load->model('t33_bayars/T33_bayars_model');
        $this->load->model('t30_tamu/T30_tamu_model');
        $this->load->model('t05_tos2/T05_tos2_model');
        $this->load->model('t34_bayars2/T34_bayars2_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't31_bayar?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't31_bayar?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't31_bayar';
            $config['first_url'] = base_url() . 't31_bayar';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T31_bayar_model->total_rows($q);
        $t31_bayar = $this->T31_bayar_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        /**
         * ambil data top (type of payment)
         */
        $dataTop = $this->T02_top_model->get_all();

        /**
         * ambil data detail pembayaran
         */
        $dataBayard = $this->T31_bayar_model->get_limit_data_bayard($q); //$config['per_page'], $start, $q);

        /**
         * ambil data tos (type of selisih)
         */
        $dataTos = $this->T04_tos_model->get_all();

        /**
         * ambil data detail selisih
         */
        $dataBayars = $this->T31_bayar_model->get_limit_data_bayars($q); //$config['per_page'], $start, $q);

        /**
         * ambil data tos2 (type of selisih price list)
         */
        $dataTos2 = $this->T05_tos2_model->get_all();

        /**
         * ambil data detail selisih
         */
        $dataBayars2 = $this->T31_bayar_model->get_limit_data_bayars2($q); //$config['per_page'], $start, $q);

        // echo pre($t31_bayar);
        // echo pre($dataBayard);

        $data = array(
            't31_bayar_data' => $t31_bayar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'dataTop' => $dataTop,
            'dataBayard' => $dataBayard,
            'dataTos' => $dataTos,
            'dataBayars' => $dataBayars,
            'dataTos2' => $dataTos2,
            'dataBayars2' => $dataBayars2,
        );
        // $this->load->view('t31_bayar/t31_bayar_list', $data);
        $data['_view'] = 't31_bayar/t31_bayar_list';
        $data['_caption'] = 'Pembayaran';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T31_bayar_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idbayar' => $row->idbayar,
				'idtamu' => $row->idtamu,
				'idusers' => $row->idusers,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('t31_bayar/t31_bayar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t31_bayar'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t31_bayar/create_action'),
			'idbayar' => set_value('idbayar'),
			'idtamu' => set_value('idtamu'),
		);
        // $this->load->view('t31_bayar/t31_bayar_form', $data);
        $data['_view'] = 't31_bayar/t31_bayar_form';
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
				'idtamu' => $this->input->post('idtamu',TRUE),
                'idusers' => $this->session->userdata('user_id'),
			);
            $this->T31_bayar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t31_bayar'));
        }
    }

    public function update($id, $TripNo, $TripTgl)
    {
        $row = $this->T31_bayar_model->get_by_id($id);

        if ($row) {

            /**
             * ambil data tamu sesuai dengan trip no.
             */
            $dataTamu = $this->T30_tamu_model->getAllByTrip($TripNo, $TripTgl);
            // echo pre($dataTamu);

            /**
             * ambil data top (type of payment)
             */
            $dataTop = $this->T02_top_model->get_all();

            /**
             * ambil data pembayaran detail
             */
            $dataBayard = $this->T32_bayard_model->getDataByIdbayar($row->idbayar);

            /**
             * ambil data tos (type of selisih)
             */
            $dataTos = $this->T04_tos_model->get_all();

            /**
             * ambil data detail selisih
             */
            $dataBayars = $this->T33_bayars_model->getDataByIdbayar($row->idbayar); //$config['per_page'], $start, $q);

            /**
             * ambil data tos2 (type of selisih price list)
             */
            $dataTos2 = $this->T05_tos2_model->get_all();

            /**
             * ambil data detail selisih
             */
            $dataBayars2 = $this->T34_bayars2_model->getDataByIdbayar($row->idbayar); //$config['per_page'], $start, $q);

            $kurs = unserialize($row->Kurs);
            foreach ($kurs as $dKurs) {
                $dataKurs .= $dKurs['MataUang'] . ' - ' . $dKurs['Nilai'] . ', ';
            }

            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t31_bayar/update_action'),
				'idbayar' => set_value('idbayar', $row->idbayar),
				'idtamu' => set_value('idtamu', $row->idtamu),
                'PriceList' => set_value('PriceList', $row->PriceList),
                'PricePay' => set_value('PricePay', $row->PricePay),
                'Kurs' => set_value('Kurs', $dataKurs),
                'PaidBy' => set_value('PaidBy', $row->PaidBy),
                'SelisihPL' => set_value('SelisihPL', $row->SelisihPL),
                'Total' => set_value('Total', $row->Total),
                'Selisih' => set_value('Selisih', $row->Selisih),
                'ShareP' => set_value('ShareP', $row->ShareP),
                'ShareS' => set_value('ShareS', $row->ShareS),
                'Name' => $row->Name,
                'dataTop' => $dataTop,
                'dataBayard' => $dataBayard,
                'dataTos' => $dataTos,
                'dataBayars' => $dataBayars,
                'dataTamu' => $dataTamu,
                'dataTos2' => $dataTos2,
                'dataBayars2' => $dataBayars2,
                'kursHitung' => $kurs,
			);
            // $this->load->view('t31_bayar/t31_bayar_form', $data);
            $data['_view'] = 't31_bayar/t31_bayar_form';
            $data['_caption'] = 'Pembayaran';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t31_bayar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idbayar', TRUE));
        } else {

            /**
             * simpan data master pembayaran
             */
            $data = array(
				// 'idtamu' => $this->input->post('idtamu',TRUE),
                'PaidBy' => $this->input->post('PaidBy',TRUE),
                'PriceList' => $this->input->post('PriceList',TRUE),
                'PricePay' => $this->input->post('PricePay',TRUE),
                // 'Kurs' => $this->input->post('Kurs',TRUE),
				'idusers' => $this->session->userdata('user_id'),
			);
            $this->T31_bayar_model->update($this->input->post('idbayar', TRUE), $data);

            /**
             * hapus terlebih dahulu data yang sudah ada di tabel t32_bayard berdasarkan idbayar
             */
            $this->T32_bayard_model->deleteByIdbayar($this->input->post('idbayar', TRUE));

            /**
             * ambil data TOP (type of payment)
             */
            $dataTop = $this->T02_top_model->get_all();

            /**
             * simpan data detail pembayaran
             */
            $totalJumlah = 0;
            foreach($dataTop as $dTop) {
                if ($this->input->post('_'.$dTop->idtop, TRUE) <> 0) {
                    $data = array(
                        'idbayar' => $this->input->post('idbayar', TRUE),
                        'idtop' => $dTop->idtop,
                        // 'TglBayar' => dateMysql($this->input->post('_tglbayar'.$dTop->idtop, TRUE)),
                        'Jumlah' => $this->input->post('_'.$dTop->idtop, TRUE),
                        'idusers' => $this->session->userdata('user_id'),
                    );
                    $this->T32_bayard_model->insert($data);
                    $totalJumlah += $this->input->post('_'.$dTop->idtop, TRUE);
                }
            }

            /**
             * update total pembayaran ke master pembayaran
             */
            $data = array(
                'Total' => $this->input->post('totalJumlahBayar', TRUE),
            );
            $this->T31_bayar_model->update($this->input->post('idbayar', TRUE), $data);

            /**
             * hapus terlebih dahulu data yang sudah ada di tabel t33_bayars berdasarkan idbayar
             */
            $this->T33_bayars_model->deleteByIdbayar($this->input->post('idbayar', TRUE));

            /**
             * ambil data TOS (type of selisih)
             */
            $dataTos = $this->T04_tos_model->get_all();

            /**
             * simpan data detail selisih
             */
            $totalJumlah = 0;
            foreach($dataTos as $dTos) {
                if ($this->input->post('__'.$dTos->idtos, TRUE) <> 0) {
                    $data = array(
                        'idbayar' => $this->input->post('idbayar', TRUE),
                        'idtos' => $dTos->idtos,
                        'Jumlah' => $this->input->post('__'.$dTos->idtos, TRUE),
                        'idusers' => $this->session->userdata('user_id'),
                    );
                    $this->T33_bayars_model->insert($data);
                    $totalJumlah += $this->input->post('__'.$dTos->idtos, TRUE);
                }
            }

            /**
             * update total selisih price to pay ke master pembayaran
             */
            $data = array(
                'Selisih' => $totalJumlah,
            );
            $this->T31_bayar_model->update($this->input->post('idbayar', TRUE), $data);

            /**
             * hapus terlebih dahulu data yang sudah ada di tabel t34_bayars2 berdasarkan idbayar
             */
            $this->T34_bayars2_model->deleteByIdbayar($this->input->post('idbayar', TRUE));

            /**
             * ambil data TOS2 (type of selisih price list)
             */
            $dataTos2 = $this->T05_tos2_model->get_all();

            /**
             * simpan data detail selisih
             */
            $totalJumlah = 0;
            foreach($dataTos2 as $dTos2) {
                if ($this->input->post('___'.$dTos2->idtos2, TRUE) <> 0) {
                    $data = array(
                        'idbayar' => $this->input->post('idbayar', TRUE),
                        'idtos2' => $dTos2->idtos2,
                        'Jumlah' => $this->input->post('___'.$dTos2->idtos2, TRUE),
                        'idusers' => $this->session->userdata('user_id'),
                    );
                    $this->T34_bayars2_model->insert($data);
                    $totalJumlah += $this->input->post('___'.$dTos2->idtos2, TRUE);
                }
            }

            /**
             * update total selisih price list ke master pembayaran
             */
            $data = array(
                'SelisihPL' => $totalJumlah,
            );
            $this->T31_bayar_model->update($this->input->post('idbayar', TRUE), $data);

            /**
             * check paid by
             */
            if ($this->input->post('PaidBy',TRUE) <> $this->input->post('PaidByExisting',TRUE)) {

                /**
                 * step 1
                 * ambil nilai price list dan price pay milik idtamu di data tamu
                 */
                $dataByIdtamu = $this->T30_tamu_model->get_by_id($this->input->post('idtamu', TRUE));
                $code = $dataByIdtamu->PackageName;
                $night = $dataByIdtamu->Night;
                // $priceList = T30_tamu->getPriceList($code, $night);
                $priceList = file_get_contents(site_url('t30_tamu/getPriceList/'.$code.'/'.$night.'/outside'));
                $pricePay = $dataByIdtamu->PricePay;

                /**
                 * step 2
                 * nilai price list dan price pay milik tamu existing dikurangi
                 */
                $dataPaidByExisting = $this->T31_bayar_model->getByIdtamu($this->input->post('PaidByExisting', TRUE));
                $data = array(
                    'PriceList' => $dataPaidByExisting->PriceList - $priceList,
                    'PricePay' => $dataPaidByExisting->PricePay - $pricePay,
                );
                $this->T31_bayar_model->updateByParam('idtamu', $this->input->post('PaidByExisting', TRUE), $data);

                /**
                 * step 3
                 * nilai price list dan price pay milik tamu paid by ditambah
                 */
                $dataPaidBy = $this->T31_bayar_model->getByIdtamu($this->input->post('PaidBy', TRUE));
                $data = array(
                    'PriceList' => $dataPaidBy->PriceList + $priceList,
                    'PricePay' => $dataPaidBy->PricePay + $pricePay,
                );
                $this->T31_bayar_model->updateByParam('idtamu', $this->input->post('PaidBy', TRUE), $data);

                /**
                 * step 4
                 * nilai price list dan price pay milik tamu yang bersangkutan di nol kan
                 */
                if ($this->input->post('idtamu', TRUE) == $this->input->post('PaidBy', TRUE)) {
                    $data = array(
                        'PriceList' => $priceList,
                        'PricePay' => $pricePay,
                    );
                    $this->T31_bayar_model->updateByParam('idtamu', $this->input->post('idtamu', TRUE), $data);
                } else {
                    $data = array(
                        'PriceList' => 0,
                        'PricePay' => 0,
                    );
                    $this->T31_bayar_model->updateByParam('idtamu', $this->input->post('idtamu', TRUE), $data);
                }

            }

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t31_bayar'));
        }
    }

    public function delete($id)
    {
        $row = $this->T31_bayar_model->get_by_id($id);

        if ($row) {
            $this->T31_bayar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t31_bayar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t31_bayar'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('idtamu', 'idtamu', 'trim|required');
		// $this->form_validation->set_rules('idusers', 'idusers', 'trim|required');
		// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('idbayar', 'idbayar', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t31_bayar.xls";
        $judul = "t31_bayar";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Idtamu");
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->T31_bayar_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->idtamu);
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
        header("Content-Disposition: attachment;Filename=t31_bayar.doc");
        $data = array(
            't31_bayar_data' => $this->T31_bayar_model->get_all(),
            'start' => 0
        );
        $this->load->view('t31_bayar/t31_bayar_doc',$data);
    }

}

/* End of file T31_bayar.php */
/* Location: ./application/controllers/T31_bayar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-10 20:14:46 */
/* http://harviacode.com */
