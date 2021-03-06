<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T30_tamu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T30_tamu_model');
        $this->load->library('form_validation');

        $this->load->model('t02_top/T02_top_model');
        $this->load->model('t31_bayar/T31_bayar_model');
        $this->load->model('t32_bayard/T32_bayard_model');
        $this->load->model('t33_bayars/T33_bayars_model');
        $this->load->model('t34_bayars2/T34_bayars2_model');
        $this->load->model('t01_package/T01_package_model');
        $this->load->model('t35_kurs/T35_kurs_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't30_tamu?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't30_tamu?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't30_tamu';
            $config['first_url'] = base_url() . 't30_tamu';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T30_tamu_model->total_rows($q);
        $t30_tamu = $this->T30_tamu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't30_tamu_data' => $t30_tamu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['_view'] = 't30_tamu/t30_tamu_list';
        $data['_caption'] = 'Data Tamu';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T30_tamu_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idtamu' => $row->idtamu,
				'TripNo' => $row->TripNo,
				'TripTgl' => $row->TripTgl,
				'Name' => $row->Name,
				'PackageName' => $row->PackageName,
				'Night' => $row->Night,
				'CheckIn' => $row->CheckIn,
				'CheckOut' => $row->CheckOut,
				'Agent' => $row->Agent,
				'PriceList' => $row->PriceList,
				'FeeTanas' => $row->FeeTanas,
				'PricePay' => $row->PricePay,
				'Remarks' => $row->Remarks,
				'idusers' => $row->idusers,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('t30_tamu/t30_tamu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_tamu'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t30_tamu/create_action'),
			'idtamu' => set_value('idtamu'),
			'TripNo' => set_value('TripNo'),
			'TripTgl' => set_value('TripTgl'),
			'Name' => set_value('Name'),
			'PackageName' => set_value('PackageName'),
			'Night' => set_value('Night'),
			'CheckIn' => set_value('CheckIn'),
			'CheckOut' => set_value('CheckOut'),
			'Agent' => set_value('Agent'),
			'PriceList' => set_value('PriceList'),
			'FeeTanas' => set_value('FeeTanas'),
			'PricePay' => set_value('PricePay'),
			'Remarks' => set_value('Remarks'),
		);
        $data['_view'] = 't30_tamu/t30_tamu_form';
        $data['_caption'] = 'Data Tamu';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'TripNo' => $this->input->post('TripNo',TRUE),
				'TripTgl' => $this->input->post('TripTgl',TRUE),
				'Name' => $this->input->post('Name',TRUE),
				'PackageName' => $this->input->post('PackageName',TRUE),
				'Night' => $this->input->post('Night',TRUE),
				'CheckIn' => $this->input->post('CheckIn',TRUE),
				'CheckOut' => $this->input->post('CheckOut',TRUE),
				'Agent' => $this->input->post('Agent',TRUE),
				'PriceList' => $this->input->post('PriceList',TRUE),
				'FeeTanas' => $this->input->post('FeeTanas',TRUE),
				'PricePay' => $this->input->post('PricePay',TRUE),
				'Remarks' => $this->input->post('Remarks',TRUE),
				'idusers' => $this->session->userdata('user_id'),
			);
            $this->T30_tamu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t30_tamu'));
        }
    }

    public function update($id)
    {
        $row = $this->T30_tamu_model->get_by_id($id);

        if ($row) {

            /**
             * ambil data package
             */
            $dataPackage = $this->T01_package_model->get_all();

            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t30_tamu/update_action'),
				'idtamu' => set_value('idtamu', $row->idtamu),
				'TripNo' => set_value('TripNo', $row->TripNo),
				'TripTgl' => set_value('TripTgl', dateIndo($row->TripTgl)),
				'Name' => set_value('Name', $row->Name),
				'PackageName' => set_value('PackageName', $row->PackageName),
				'Night' => set_value('Night', $row->Night),
				'CheckIn' => set_value('CheckIn', dateIndo($row->CheckIn)),
				'CheckOut' => set_value('CheckOut', dateIndo($row->CheckOut)),
				'Agent' => set_value('Agent', $row->Agent),
				'PriceList' => set_value('PriceList', $row->PriceList),
				'FeeTanas' => set_value('FeeTanas', $row->FeeTanas),
				'PricePay' => set_value('PricePay', $row->PricePay),
				'Remarks' => set_value('Remarks', $row->Remarks),
                'Company' => set_value('Company', $row->Company),
                'dataPackage' => $dataPackage,
			);
            $data['_view'] = 't30_tamu/t30_tamu_form';
            $data['_caption'] = 'Data Tamu';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_tamu'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idtamu', TRUE));
        } else {

            /**
             * ambil nilai price list
             */
            $priceList = $this->getPriceList($this->input->post('PackageName',TRUE), $this->input->post('Night',TRUE), 'inside');

            $data = array(
				'TripNo' => $this->input->post('TripNo',TRUE),
				'TripTgl' => dateMysql($this->input->post('TripTgl',TRUE)),
				'Name' => $this->input->post('Name',TRUE),
				'PackageName' => $this->input->post('PackageName',TRUE),
				'Night' => $this->input->post('Night',TRUE),
				'CheckIn' => dateMysql($this->input->post('CheckIn',TRUE)),
                'CheckOut' => dateAdd(dateMysql($this->input->post('CheckIn',TRUE)), $this->input->post('Night',TRUE)),
				'Agent' => $this->input->post('Agent',TRUE),
				'PriceList' => $priceList, // $this->input->post('PriceList',TRUE),
				'FeeTanas' => $this->input->post('FeeTanas',TRUE),
				'PricePay' => $this->input->post('PricePay',TRUE),
				'Remarks' => $this->input->post('Remarks',TRUE),
                'Company' => $this->input->post('Company',TRUE),
				'idusers' => $this->session->userdata('user_id'),
			);
            $this->T30_tamu_model->update($this->input->post('idtamu', TRUE), $data);

            /**
             * update pricelist di tabel bayar
             */
            $data = array(
                'PriceList' => $priceList,
            );
            $this->T31_bayar_model->updateByParam('idtamu', $this->input->post('idtamu', TRUE), $data);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t30_tamu/update/'.$this->input->post('idtamu', TRUE)));
        }
    }

    public function delete($TripNo, $company)
    {
        // $row = $this->T30_tamu_model->get_by_id($id);
        $row = $this->T30_tamu_model->get_by_TripNo($TripNo, $company);

        if ($row) {

            /**
             * hapus data di tabel kurs
             */
            $this->T35_kurs_model->deleteTripNo($TripNo, $company);

            /**
             * hapus data detail pembayaran selisih price list
             */
            $this->T34_bayars2_model->deleteTripNo($TripNo, $company);

            /**
             * hapus data detail pembayaran selisih
             */
            $this->T33_bayars_model->deleteTripNo($TripNo, $company);

            /**
             * hapus data detail pembayaran
             */
            $this->T32_bayard_model->deleteTripNo($TripNo, $company);

            /**
             * hapus data master pembayaran
             */
            $this->T31_bayar_model->deleteTripNo($TripNo, $company);

            /**
             * hapus data berdasarkan Trip No. di tabel t30_tamu
             */
            $this->T30_tamu_model->deleteTripNo($TripNo, $company);


            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t30_tamu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_tamu'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('TripNo', 'tripno', 'trim|required');
		$this->form_validation->set_rules('TripTgl', 'triptgl', 'trim|required');
		$this->form_validation->set_rules('Name', 'name', 'trim|required');
		$this->form_validation->set_rules('PackageName', 'packagename', 'trim|required');
		$this->form_validation->set_rules('Night', 'night', 'trim|required');
		$this->form_validation->set_rules('CheckIn', 'checkin', 'trim|required');
		$this->form_validation->set_rules('CheckOut', 'checkout', 'trim|required');
		// $this->form_validation->set_rules('Agent', 'agent', 'trim|required');
		// $this->form_validation->set_rules('PriceList', 'pricelist', 'trim|required|numeric');
		// $this->form_validation->set_rules('FeeTanas', 'feetanas', 'trim|required|numeric');
		// $this->form_validation->set_rules('PricePay', 'pricepay', 'trim|required|numeric');
		// $this->form_validation->set_rules('Remarks', 'remarks', 'trim|required');
		$this->form_validation->set_rules('idtamu', 'idtamu', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t30_tamu.xls";
        $judul = "t30_tamu";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Name");
		xlsWriteLabel($tablehead, $kolomhead++, "PackageName");
		xlsWriteLabel($tablehead, $kolomhead++, "Night");
		xlsWriteLabel($tablehead, $kolomhead++, "CheckIn");
		xlsWriteLabel($tablehead, $kolomhead++, "CheckOut");
		xlsWriteLabel($tablehead, $kolomhead++, "Agent");
		xlsWriteLabel($tablehead, $kolomhead++, "PriceList");
		xlsWriteLabel($tablehead, $kolomhead++, "FeeTanas");
		xlsWriteLabel($tablehead, $kolomhead++, "PricePay");
		xlsWriteLabel($tablehead, $kolomhead++, "Remarks");
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->T30_tamu_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->TripNo);
			xlsWriteLabel($tablebody, $kolombody++, $data->TripTgl);
			xlsWriteLabel($tablebody, $kolombody++, $data->Name);
			xlsWriteLabel($tablebody, $kolombody++, $data->PackageName);
			xlsWriteLabel($tablebody, $kolombody++, $data->Night);
			xlsWriteLabel($tablebody, $kolombody++, $data->CheckIn);
			xlsWriteLabel($tablebody, $kolombody++, $data->CheckOut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Agent);
			xlsWriteNumber($tablebody, $kolombody++, $data->PriceList);
			xlsWriteNumber($tablebody, $kolombody++, $data->FeeTanas);
			xlsWriteNumber($tablebody, $kolombody++, $data->PricePay);
			xlsWriteLabel($tablebody, $kolombody++, $data->Remarks);
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
        header("Content-Disposition: attachment;Filename=t30_tamu.doc");
        $data = array(
            't30_tamu_data' => $this->T30_tamu_model->get_all(),
            'start' => 0
        );
        $this->load->view('t30_tamu/t30_tamu_doc',$data);
    }

    /**
     * import file excel
     */
    public function import()
    {
        $data = array(
            'button' => 'Proses',
            'action' => site_url('t30_tamu/import_action'),
		);
        $data['_view'] = 't30_tamu/t30_tamu_import';
        $data['_caption'] = 'Data Tamu';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    /**
     * handling proses import
     */
    public function import_action()
    {
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>Proses import data gagal !</b> ' . $this->upload->display_errors() . '</div>');
            redirect('t30_tamu/import');
        } else {
            /**
             * ambil data TOP (type of payment)
             */
            $dataTop = $this->T02_top_model->get_all();

            $data_upload = $this->upload->data();

            $excelreader = new PHPExcel_Reader_Excel2007();
            // $format = new PHPExcel_Style_NumberFormat();
            $loadexcel = $excelreader->load('excel/' . $data_upload['file_name']);
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
            // echo pre(dateMysql($sheet[4]['C'])); exit;
            // echo pre($sheet); exit;
            $data = array();
            $dataBayar = array();
            $startRow = 8;
            $numRow = 1;

            /**
             * ambil paksa tripno dan triptgl
             */
            $TripNo  = $sheet[4]['B'];
            $TripTgl = dateMysql($sheet[4]['C']);

            /**
             * simpan data kurs
             */
            $chr = 71; // G
            // $kurs = array();
            while ($sheet[3][chr($chr)] != '') {
                // echo $sheet[3][chr($chr)] . ' - ' . $sheet[4][chr($chr)] . '<br>';
                $kurs[] = [
                    'MataUang' => $sheet[3][chr($chr)],
                    'Nilai' => $sheet[4][chr($chr)],
                ];
                $chr++;
            }

            /**
             * proses simpan data di tabel kurs
             */
            $dataKurs = array(
                'no' => $TripNo,
                'tgl' => $TripTgl,
                'company' => $this->session->userdata('dbName'),
                'kurs' => serialize($kurs),
            );
            $this->T35_kurs_model->insert($dataKurs);

            // echo pre($kurs);
            // exit;

            // ($sheet[4][chr($chr)] == '')

            // $Kurs    = $sheet[4]['F'];
            foreach ($sheet as $row) {
                // echo pre($row);
                if ($numRow >= $startRow) {

                    /**
                     * check jika kolom A bertanda * berarti sudah akhir baris
                     */
                    if ($row['A'] == '*') {
                        break;
                    }

                    /**
                     * simpan ke tabel tamu
                     */
                    $dataTamu = [
                        'no'           => $row['A'],
                        'TripNo'       => $TripNo,
                        'TripTgl'      => $TripTgl,
                        'Kurs'         => serialize($kurs),
                        'Name'         => $row['B'],
                        'MF'           => $row['C'],
                        'Country'      => $row['D'],
                        'IdCard'       => $row['E'],
                        'PackageName'  => $row['F'],
                		'Night'        => $row['G'],
                		'CheckIn'      => dateMysql($row['H']),
                        'CheckOut'     => dateAdd(dateMysql($row['H']), $row['G']),
                		'Agent'        => $row['I'],
                		'PriceList'    => $row['J'],
                        'FeeTaNas'     => $row['K'],
                        'PricePay'     => $row['L'],
                        'Remarks'      => $row['M'],
                        'Company'      => $this->session->userdata('dbName'),
                        'idusers'      => $this->session->userdata('user_id'),
                    ];
                    $this->T30_tamu_model->insert($dataTamu);

                    /**
                     * ambil idtamu
                     */
                    $idtamu = $this->T30_tamu_model->getInsertId();

                    // temporary cutted

                    // price list
                    $priceList = $this->getPriceList($row['F'], $row['G'], 'inside');

                    // nilai kurs
                    $key = array_search(DEFAULT_KURS, array_column($kurs, 'MataUang'), true);
                    $nilaiKurs = $kurs[$key]['Nilai'];

                    // price to pay
                    $pricePay = $priceList * $nilaiKurs;

                    // echo pre($kurs);
                    // echo $key.'-'.$nilaiKurs;

                    // exit;

                    /**
                     * simpan ke tabel bayar
                     */
                    $dataBayar = [
                        'Kurs'      => serialize($kurs),
                        'no'        => $row['A'],
                        'idtamu'    => $idtamu,
                        'PaidBy'    => $idtamu,
                        'PriceList' => $priceList,
                        'PricePay'  => $pricePay,
                        'idusers'   => $this->session->userdata('user_id'),
                    ];
                    $this->T31_bayar_model->insert($dataBayar);

                    /**
                     * ambil idbayar
                     */
                    $idbayar = $this->T31_bayar_model->getInsertId();

                    /**
                     * simpan data ke tabel detail bayar
                     */
                    $totalJumlah = 0;
                    $chr = 78; // start kolom N, kode ascii K adalah 78
                    foreach($dataTop as $dTop) {
                        $jumlahBayar = $row[chr($chr)];
                        if ($jumlahBayar <> 0) {
                            /**
                             * simpan ke tabel bayar detail
                             */
                            $dataBayarDetail = [
                                'idbayar' => $idbayar,
                                'idtop' => $dTop->idtop,
                                'TglBayar' => $TripTgl,
                                'Jumlah' => $jumlahBayar,
                                'idusers' => $this->session->userdata('user_id'),
                            ];
                            $this->T32_bayard_model->insert($dataBayarDetail);
                            $totalJumlah += $jumlahBayar;
                        }
                        $chr++;
                    }

                    /**
                     * update total pembayaran ke master pembayaran
                     */
                    $data = array(
                        'Total' => $totalJumlah,
                    );
                    $this->T31_bayar_model->update($idbayar, $data);

                }
                $numRow++;
            }
            // echo pre($data);
            // $this->T30_tamu_model->insert_import($data);
            unlink(realpath('excel/' . $data_upload['file_name']));

            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Proses import berhasil !</b> Data berhasil diimport !</div>');
            redirect('t30_tamu');
        }
    }

    public function getPriceList($code, $night, $asal)
    {
        $dataPackage = $this->T01_package_model->getByCode($code);

        // echo pre($dataPackage); exit;
        /*
        stdClass Object
        (
        [idprice] => 2
        [PackageName] => DELUXE
        [PackageCode] => DEL
        [SN3LN] => 725.03
        [SN6LN] => 930
        [SNELN] => 166
        [PN1LN] => 95
        [PN1DN] => 550000
        [SN3C] => 440.03
        [SN3CP] => 0.61
        [SN6C] => 360
        [SN6CP] => 0.39
        [SNEC] => 71
        [SNECP] => 0.43
        [PN3C] => 285
        [PN3CP] => 0.39
        [PN6C] => 570
        [PN6CP] => 0.61
        [PNEC] => 95
        [PNECP] => 0.57
        [idusers] => 1
        [created_at] => 2020-09-19 20:22:52
        [updated_at] => 2021-04-02 00:47:15
        )
         */

        $priceList = 0;

        /**
         * seleksi data package
         */
        if ($dataPackage) {
            // data package ditemukan
            // $nights = $row['D'];
            if ($this->session->userdata('dbName') == 'SSW') {
                switch ($night) {
                    case 3:
                        $priceList = $dataPackage->SN3LN;
                        break;
                    case 4:
                        $priceList = $dataPackage->SN3LN + $dataPackage->SNELN;
                        break;
                    case 5:
                        $priceList = $dataPackage->SN3LN + (2 * $dataPackage->SNELN);
                        break;
                    case 6:
                        $priceList = $dataPackage->SN6LN;
                        break;
                    default:
                        $priceList = 0;
                }
                if ($night > 6) {
                    $priceList = $dataPackage->SN6LN + (($night - 6) * $dataPackage->SNELN);
                }
            } else {

            }
        } else {
            // data package tidak ditemukan
            $priceList = 0;
        }

        if ($asal == 'inside') {
            return $priceList;
        } else {
            echo $priceList;
        }

    }

    public function editKurs($tripNo, $tripTgl, $company)
    {
        // code...
        echo pre($tripNo . $tripTgl . $company);
        $row = $this->T35_kurs_model->getByNo($tripNo, $tripTgl, $company);
        if ($row) {
            redirect(site_url('t35_kurs/update/'.$row->idbkm));
        }
    }

}

/* End of file T30_tamu.php */
/* Location: ./application/controllers/T30_tamu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-12 17:27:06 */
/* http://harviacode.com */
