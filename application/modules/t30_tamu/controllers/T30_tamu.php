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

        $this->load->model('t31_bayar/T31_bayar_model');
        $this->load->model('t32_bayard/T32_bayard_model');
        $this->load->model('t02_top/T02_top_model');
        $this->load->model('t01_package/T01_package_model');
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
        // $this->load->view('t30_tamu/t30_tamu_list', $data);
        $data['_view'] = 't30_tamu/t30_tamu_list';
        $data['_caption'] = 'Input Data';
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
				'Nama' => $row->Nama,
				'MFC' => $row->MFC,
				'Country' => $row->Country,
				'PackageNight' => $row->PackageNight,
				'PackageType' => $row->PackageType,
				'CheckIn' => $row->CheckIn,
				'CheckOut' => $row->CheckOut,
				'Agent' => $row->Agent,
				'Status' => $row->Status,
				'DaysStay' => $row->DaysStay,
				'Price' => $row->Price,
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
			'Nama' => set_value('Nama'),
			'MFC' => set_value('MFC'),
			'Country' => set_value('Country'),
			'PackageNight' => set_value('PackageNight'),
			'PackageType' => set_value('PackageType'),
			'CheckIn' => set_value('CheckIn'),
			'CheckOut' => set_value('CheckOut'),
			'Agent' => set_value('Agent'),
			'Status' => set_value('Status'),
			'DaysStay' => set_value('DaysStay'),
			'Price' => set_value('Price'),
		);
        // $this->load->view('t30_tamu/t30_tamu_form', $data);
        $data['_view'] = 't30_tamu/t30_tamu_form';
        $data['_caption'] = 'Input Data';
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
				'Nama' => $this->input->post('Nama',TRUE),
				'MFC' => $this->input->post('MFC',TRUE),
				'Country' => $this->input->post('Country',TRUE),
				'PackageNight' => $this->input->post('PackageNight',TRUE),
				'PackageType' => $this->input->post('PackageType',TRUE),
				'CheckIn' => $this->input->post('CheckIn',TRUE),
				'CheckOut' => $this->input->post('CheckOut',TRUE),
				'Agent' => $this->input->post('Agent',TRUE),
				'Status' => $this->input->post('Status',TRUE),
				'DaysStay' => $this->input->post('DaysStay',TRUE),
				'Price' => $this->input->post('Price',TRUE),
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
             * ambil data package type
             */
            $dataPackage = $this->T01_package_model->get_all();

            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t30_tamu/update_action'),
				'idtamu' => set_value('idtamu', $row->idtamu),
				'TripNo' => set_value('TripNo', $row->TripNo),
				'TripTgl' => set_value('TripTgl', dateIndo($row->TripTgl)),
				'Nama' => set_value('Nama', $row->Nama),
				'MFC' => set_value('MFC', $row->MFC),
				'Country' => set_value('Country', $row->Country),
				'PackageNight' => set_value('PackageNight', $row->PackageNight),
				'PackageType' => set_value('PackageType', $row->PackageType),
				'CheckIn' => set_value('CheckIn', dateIndo($row->CheckIn)),
				'CheckOut' => set_value('CheckOut', dateIndo($row->CheckOut)),
				'Agent' => set_value('Agent', $row->Agent),
				'Status' => set_value('Status', $row->Status),
				'DaysStay' => set_value('DaysStay', $row->DaysStay),
				'Price' => set_value('Price', $row->Price),
                'dataPackage' => $dataPackage,
			);
            // $this->load->view('t30_tamu/t30_tamu_form', $data);
            $data['_view'] = 't30_tamu/t30_tamu_form';
            $data['_caption'] = 'Input Data';
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
            $data = array(
				'TripNo' => $this->input->post('TripNo',TRUE),
				'TripTgl' => $this->input->post('TripTgl',TRUE),
				'Nama' => $this->input->post('Nama',TRUE),
				'MFC' => $this->input->post('MFC',TRUE),
				'Country' => $this->input->post('Country',TRUE),
				'PackageNight' => $this->input->post('PackageNight',TRUE),
				'PackageType' => $this->input->post('PackageType',TRUE),
				'CheckIn' => $this->input->post('CheckIn',TRUE),
				'CheckOut' => $this->input->post('CheckOut',TRUE),
				'Agent' => $this->input->post('Agent',TRUE),
				'Status' => $this->input->post('Status',TRUE),
				'DaysStay' => $this->input->post('DaysStay',TRUE),
				'Price' => $this->input->post('Price',TRUE),
                'idusers' => $this->session->userdata('user_id'),
			);
            $this->T30_tamu_model->update($this->input->post('idtamu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t30_tamu'));
        }
    }

    public function delete($id)
    {
        $row = $this->T30_tamu_model->get_by_id($id);

        if ($row) {
            $this->T30_tamu_model->delete($id);
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
		$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('MFC', 'mfc', 'trim|required');
		$this->form_validation->set_rules('Country', 'country', 'trim|required');
		$this->form_validation->set_rules('PackageNight', 'packagenight', 'trim|required');
		$this->form_validation->set_rules('PackageType', 'packagetype', 'trim|required');
		$this->form_validation->set_rules('CheckIn', 'checkin', 'trim|required');
		$this->form_validation->set_rules('CheckOut', 'checkout', 'trim|required');
		$this->form_validation->set_rules('Agent', 'agent', 'trim|required');
		$this->form_validation->set_rules('Status', 'status', 'trim|required');
		$this->form_validation->set_rules('DaysStay', 'daysstay', 'trim|required');
		$this->form_validation->set_rules('Price', 'price', 'trim|required|numeric');
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
		xlsWriteLabel($tablehead, $kolomhead++, "Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "MFC");
		xlsWriteLabel($tablehead, $kolomhead++, "Country");
		xlsWriteLabel($tablehead, $kolomhead++, "PackageNight");
		xlsWriteLabel($tablehead, $kolomhead++, "PackageType");
		xlsWriteLabel($tablehead, $kolomhead++, "CheckIn");
		xlsWriteLabel($tablehead, $kolomhead++, "CheckOut");
		xlsWriteLabel($tablehead, $kolomhead++, "Agent");
		xlsWriteLabel($tablehead, $kolomhead++, "Status");
		xlsWriteLabel($tablehead, $kolomhead++, "DaysStay");
		xlsWriteLabel($tablehead, $kolomhead++, "Price");
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->T30_tamu_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->TripNo);
			xlsWriteLabel($tablebody, $kolombody++, $data->TripTgl);
			xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->MFC);
			xlsWriteLabel($tablebody, $kolombody++, $data->Country);
			xlsWriteLabel($tablebody, $kolombody++, $data->PackageNight);
			xlsWriteLabel($tablebody, $kolombody++, $data->PackageType);
			xlsWriteLabel($tablebody, $kolombody++, $data->CheckIn);
			xlsWriteLabel($tablebody, $kolombody++, $data->CheckOut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Agent);
			xlsWriteLabel($tablebody, $kolombody++, $data->Status);
			xlsWriteLabel($tablebody, $kolombody++, $data->DaysStay);
			xlsWriteNumber($tablebody, $kolombody++, $data->Price);
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
			// 'idtamu' => set_value('idtamu'),
			// 'TripNo' => set_value('TripNo'),
			// 'TripTgl' => set_value('TripTgl'),
			// 'Nama' => set_value('Nama'),
			// 'MFC' => set_value('MFC'),
			// 'Country' => set_value('Country'),
			// 'PackageNight' => set_value('PackageNight'),
			// 'PackageType' => set_value('PackageType'),
			// 'CheckIn' => set_value('CheckIn'),
			// 'CheckOut' => set_value('CheckOut'),
			// 'Agent' => set_value('Agent'),
			// 'Status' => set_value('Status'),
			// 'DaysStay' => set_value('DaysStay'),
			// 'Price' => set_value('Price'),
			// 'idusers' => set_value('idusers'),
			// 'created_at' => set_value('created_at'),
			// 'updated_at' => set_value('updated_at'),
		);
        $data['_view'] = 't30_tamu/t30_tamu_import';
        $data['_caption'] = 'Input Data';
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
            $data = array();
            $dataBayar = array();
            $startRow = 3;
            $numRow = 1;
            foreach ($sheet as $row) {
                // echo pre($row);
                if ($numRow >= $startRow) {

                    /**
                     * simpan ke tabel tamu
                     */
                    $dataTamu = [
                        'TripNo'       => $row['B'],
                        'TripTgl'      => date_format(date_create($row['C']), 'Y-m-d'),
                        'Nama'         => $row['D'],
                        'Facility'     => $row['E'],
                		'MFC'          => $row['F'],
                		'Country'      => $row['G'],
                        'IDNo'         => $row['H'],
                		'PackageNight' => $row['I'],
                		'PackageType'  => $row['J'],
                		'CheckIn'      => date_format(date_create($row['K']), 'Y-m-d'),
                		'CheckOut'     => date_format(date_create($row['L']), 'Y-m-d'),
                		'Agent'        => $row['M'],
                		'Status'       => $row['N'],
                		'DaysStay'     => $row['O'],
                		'Price'        => $row['P'],
                        'FeeTaNas'     => $row['Q'],
                        'Price2'       => $row['R'],
                        'Remarks'      => $row['S'],
                        'idusers'      => $this->session->userdata('user_id'),
                    ];
                    $this->T30_tamu_model->insert($dataTamu);

                    /**
                     * ambil idtamu
                     */
                    $idtamu = $this->T30_tamu_model->getInsertId();

                    /**
                     * simpan ke tabel bayar
                     */
                    $dataBayar = [
                        'idtamu' => $idtamu,
                        'idusers' => $this->session->userdata('user_id'),
                    ];
                    $this->T31_bayar_model->insert($dataBayar);

                    /**
                     * ambil idbayar
                     */
                    $idbayar = $this->T31_bayar_model->getInsertId();

                    $chr = 84; // start kolom T, kode ascii T adalah 84
                    foreach($dataTop as $dTop) {
                        $jumlahBayar = $row[chr($chr)];
                        if ($jumlahBayar <> 0) {
                            /**
                             * simpan ke tabel bayar detail
                             */
                            $dataBayarDetail = [
                                'idbayar' => $idbayar,
                                'idtop' => $dTop->idtop,
                                'Jumlah' => $jumlahBayar,
                                'idusers' => $this->session->userdata('user_id'),
                            ];
                            $this->T32_bayard_model->insert($dataBayarDetail);
                        }
                        $chr++;
                    }

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

    /**
     * untuk combo pada menu tamu - pembayaran
     */
    public function getData()
    {
        $result = $this->T30_tamu_model->getData($this->input->get("search"));
        if ($result) {
            $list = array();
            $key = 0;
            foreach($result as $row) {
                $list[$key]['id'] = $row->TripNo;
                $list[$key]['text'] = $row->TripNo;
                $key++;
            }
            echo json_encode($list);
        } else {
            echo "Tidak ada data";
        }
    }

}

/* End of file T30_tamu.php */
/* Location: ./application/controllers/T30_tamu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-08 10:18:56 */
/* http://harviacode.com */
