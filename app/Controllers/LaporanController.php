<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SuratMasukModel;
use App\Controllers\BaseController;
use App\Models\JenisModel;
use App\Models\SuratKeluarModel;
use Dompdf\Dompdf;

class LaporanController extends BaseController
{
    protected $suratMasuk;
    protected $suratKeluar;
    protected $userModel;
    protected $jenisModel;

    public function __construct()
    {
        $this->suratMasuk = new SuratMasukModel();
        $this->suratKeluar = new SuratKeluarModel();
        $this->userModel = new UserModel();
        $this->jenisModel = new JenisModel();
    }

    public function surat_masuk_index()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Laporan Surat Masuk',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'result' => $this->suratMasuk->getSuratMasuk(),
            'jenis' => $this->jenisModel->getJenis()
        ];

        return view('laporan/laporan_surat_masuk/index', $data);
    }

    public function preview_masuk($id)
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Laporan Surat Masuk',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'result' => $this->suratMasuk->getSuratMasuk($id),
            'jenis' => $this->jenisModel->getJenis()
        ];

        return view('laporan/laporan_surat_masuk/preview', $data);
    }

    public function surat_masuk_cetak()
    {
        $jenis_id = $this->request->getVar('jenis_id');
        $start = $this->request->getVar('start');
        $end = $this->request->getVar('end');

        $data = [
            'title' => 'Dashboard',
            'pages' => 'Laporan Surat Masuk',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'result' => $this->suratMasuk->getSuratMasukCetak($jenis_id, $start, $end)
        ];

        // dd($data['result']);

        $dompdf = new Dompdf();
        $html = view('laporan/laporan_surat_masuk/cetak', $data);
        // $html = 'Test Hasil';
        $dompdf->load_html($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporan-surat-masuk', ['Attachment' => false]);
        // $output = $dompdf->output();
    }

    public function surat_keluar_index()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Laporan Surat Keluar',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'result' => $this->suratKeluar->getSuratKeluar(),
            'jenis' => $this->jenisModel->getJenis()
        ];

        return view('laporan/laporan_surat_keluar/index', $data);
    }

    public function preview_keluar($id)
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Laporan Surat Keluar',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'result' => $this->suratKeluar->getSuratKeluar($id),
            'jenis' => $this->jenisModel->getJenis()
        ];

        return view('laporan/laporan_surat_keluar/preview', $data);
    }

    public function surat_keluar_cetak()
    {
        $jenis_id = $this->request->getVar('jenis_id');
        $start = $this->request->getVar('start');
        $end = $this->request->getVar('end');

        $data = [
            'title' => 'Dashboard',
            'pages' => 'Laporan Surat Keluar',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'result' => $this->suratKeluar->getSuratKeluarCetak($jenis_id, $start, $end)
        ];

        // dd($data['result']);

        $dompdf = new Dompdf();
        $html = view('laporan/laporan_surat_keluar/cetak', $data);
        // $html = 'Test Hasil';
        $dompdf->load_html($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporan-surat-keluar', ['Attachment' => false]);
        // $output = $dompdf->output();
    }
}
