<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * buat Kode baru otomatis
 */
function getNewKode($prefix, $fieldName, $tableName)
{
    $sNextKode = "";
    $sLastKode = "";
    $CI =& get_instance();
    $CI->db->order_by($fieldName, 'desc');
    $CI->db->limit(1);
    $row = $CI->db->get($tableName)->row();
    if ($row) {
        $value = $row->$fieldName;
        $sLastKode = intval(substr($value, 2, 3));
        $sLastKode = intval($sLastKode) + 1;
        $sNextKode = $prefix . sprintf('%03s', $sLastKode);
        if (strlen($sNextKode) > 5) {
            $sNextKode = $prefix . "999";
        }
    } else {
        $sNextKode = $prefix . "001";
    }
    return $sNextKode;
}

/**
 * buat nomor jo baru
 * JO0001
 */
function getNewJO($prefix, $fieldName, $tableName)
{
    $sNextKode = "";
    $sLastKode = "";
    $CI =& get_instance();
    $CI->db->order_by($fieldName, 'desc');
    $CI->db->limit(1);
    $row = $CI->db->get($tableName)->row();
    if ($row) {
        $value = $row->$fieldName;
        $sLastKode = intval(substr($value, 2, 4));
        $sLastKode = intval($sLastKode) + 1;
        $sNextKode = $prefix . sprintf('%04s', $sLastKode);
        if (strlen($sNextKode) > 6) {
            $sNextKode = $prefix . "9999";
        }
    } else {
        $sNextKode = $prefix . "0001";
    }
    return $sNextKode;
}

/**
 * buat nomor cost sheet baru
 * CST0001
 */
function getNewCSheet($prefix, $fieldName, $tableName)
{
    $sNextKode = "";
    $sLastKode = "";
    $CI =& get_instance();
    $CI->db->order_by($fieldName, 'desc');
    $CI->db->limit(1);
    $row = $CI->db->get($tableName)->row();
    if ($row) {
        $value = $row->$fieldName;
        $sLastKode = intval(substr($value, 3, 4));
        $sLastKode = intval($sLastKode) + 1;
        $sNextKode = $prefix . sprintf('%04s', $sLastKode);
        if (strlen($sNextKode) > 7) {
            $sNextKode = $prefix . "9999";
        }
    } else {
        $sNextKode = $prefix . "0001";
    }
    return $sNextKode;
}

/**
 * buat nomor invoice baru
 * INV0001
 */
function getNewInvoice($prefix, $fieldName, $tableName)
{
    $sNextKode = "";
    $sLastKode = "";
    $CI =& get_instance();
    $CI->db->order_by($fieldName, 'desc');
    $CI->db->limit(1);
    $row = $CI->db->get($tableName)->row();
    if ($row) {
        $value = $row->$fieldName;
        $sLastKode = intval(substr($value, 3, 4));
        $sLastKode = intval($sLastKode) + 1;
        $sNextKode = $prefix . sprintf('%04s', $sLastKode);
        if (strlen($sNextKode) > 7) {
            $sNextKode = $prefix . "9999";
        }
    } else {
        $sNextKode = $prefix . "0001";
    }
    return $sNextKode;
}

/**
 * liat isi variabel
 */
function pre($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

/**
 * check akun last level
 */
function isLastLevel($akunLastLevel, $akun)
{
    $idakunArray = array_map('toArray', $akunLastLevel);
    return in_array($akun->idakun, $idakunArray, true);
}

/**
 * fungsi untuk mengubah posisi NAMA AKUN, disesuaikan dengan level akunnya
 */
function formatNamaAkun($akunLastLevel, $akun)
{
    $idakunArray = array_map('toArray', $akunLastLevel);
    // $lenKode = strlen(($akun->KodeBB <> '' ? $akun->KodeBB : ($akun->KodeBP <> '' ? $akun->KodeBP : $akun->Kode)));
    $lenKode = strlen($akun->Kode);
    switch ($lenKode) {
        case 1:
            $result = '<b>' . $akun->Nama . '</b>';
            break;
        case 2:
            $result = '&nbsp;&nbsp;&nbsp;&nbsp;' . (in_array($akun->idakun, $idakunArray, true) ? $akun->Nama : '<b>' . $akun->Nama . '</b>');
            break;
        case 4:
            // $countId = $this->Akun_model0->totalRows($row->idakun, $this->table);
            $result = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . (in_array($akun->idakun, $idakunArray, true) ? $akun->Nama : '<b>' . $akun->Nama . '</b>');
            // $result = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . (in_array($akun->idakun, $indukArray, true) ? $akun->Nama : '<b>' . $akun->Nama . '</b>');
            break;
        case 7:
            // $countId = $this->Akun_model0->totalRows($row->idakun, $this->table);
            $result = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . (in_array($akun->idakun, $idakunArray, true) ? $akun->Nama : '<b>' . $akun->Nama . '</b>');
            // $result = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . (in_array($akun->idakun, $indukArray, true) ? $akun->Nama : '<b>' . $akun->Nama . '</b>');
            break;
        case 10:
            // $result = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $akun->Nama;
            $result = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . (in_array($akun->idakun, $idakunArray, true) ? $akun->Nama : '<b>' . $akun->Nama . '</b>');
            break;
        case 13:
            $result = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $akun->Nama;
            break;
    }

    return $result;
}

function toArray($obj)
{
    $obj = (array) $obj; //cast to array, optional
    return $obj['idakun'];
}

function numIndo($angka)
{
    return number_format($angka, 2, ',', '.');
}
