<?php

namespace App\Controllers;

use App\Models\JenisModel;
use App\Models\SuratKeluarModel;
use App\Controllers\BaseController;
use App\Models\UserModel;

class SuratKeluarController extends BaseController
{
    protected $suratKeluar;
    protected $jenisModel;
    protected $userModel;

    public function __construct()
    {
        $this->suratKeluar = new SuratKeluarModel();
        $this->jenisModel = new JenisModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Surat Keluar',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'result' => $this->suratKeluar->getSuratKeluar()
        ];

        return view('surat_keluar/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Surat Keluar',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'jenis' => $this->jenisModel->getJenis()
        ];

        return view('surat_keluar/create', $data);
    }

    public function store()
    {
        $rules = [
            'no_surat' => 'required|min_length[5]',
            'judul_surat' => 'required|min_length[5]',
            'jenis_id' => 'required',
            'tujuan' => 'required|min_length[5]',
            'tgl_keluar' => 'required',
            'keterangan' => 'required|min_length[5]',
            'berkas' => [
                'rules' => 'max_size[berkas,5120]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $fileBerkas = $this->request->getFile('berkas');
        if ($fileBerkas->getError() == 4) {
            $namaBerkas = 'default-image.jpg';
        } else {
            $namaBerkas = $fileBerkas->getRandomName();
            $fileBerkas->move('assets/uploads', $namaBerkas);
        }

        $this->suratKeluar->save([
            'no_surat' => $this->request->getVar('no_surat'),
            'judul_surat' => $this->request->getVar('judul_surat'),
            'jenis_id' => $this->request->getVar('jenis_id'),
            'tujuan' => $this->request->getVar('tujuan'),
            'tgl_keluar' => $this->request->getVar('tgl_keluar'),
            'keterangan' => $this->request->getVar('keterangan'),
            'berkas' => $namaBerkas,
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan.');
        return redirect()->to('surat-keluar');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Surat Keluar',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'res' => $this->suratKeluar->getSuratKeluar($id),
            'jenis' => $this->jenisModel->getJenis()
        ];

        return view('surat_keluar/edit', $data);
    }

    public function update($id)
    {
        $rulesBerkas = $this->request->getFile('berkas');

        // cek gambar, apakah tetap gambar lama
        if ($rulesBerkas->getError() == 4) {
            $rules = 'max_size[berkas,5120]';
        } else {
            $rules = 'max_size[berkas,5120]';
        }

        $rules = [
            'no_surat' => 'required|min_length[5]',
            'judul_surat' => 'required|min_length[5]',
            'jenis_id' => 'required',
            'tujuan' => 'required|min_length[5]',
            'tgl_keluar' => 'required',
            'keterangan' => 'required|min_length[5]',
            'berkas' => [
                'rules' => $rules,
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $fileBerkas = $this->request->getFile('berkas');

        // cek gambar, apakah tetap gambar lama
        if ($fileBerkas->getError() == 4) {
            $namaBerkas = $this->request->getVar('berkasOld');
        } else {
            // generate nama file random
            $namaBerkas = $fileBerkas->getRandomName();
            // pindahkan gambar
            $fileBerkas->move('assets/uploads', $namaBerkas);
            // hapus file lama
            if ($this->request->getVar('berkasOld') != 'default-image.jpg') {
                // hapus gambar
                unlink('assets/uploads/' . $this->request->getVar('berkasOld'));
            }
        }

        $this->suratKeluar->save([
            'suratkeluar_id' => $id,
            'no_surat' => $this->request->getVar('no_surat'),
            'judul_surat' => $this->request->getVar('judul_surat'),
            'jenis_id' => $this->request->getVar('jenis_id'),
            'tujuan' => $this->request->getVar('tujuan'),
            'tgl_keluar' => $this->request->getVar('tgl_keluar'),
            'keterangan' => $this->request->getVar('keterangan'),
            'berkas' => $namaBerkas,
        ]);

        session()->setFlashdata('success', 'Data Berhasil Diubahkan.');
        return redirect()->to('surat-keluar');
    }

    public function delete($id)
    {
        $res = $this->suratKeluar->getSuratKeluar($id);
        if ($res->berkas == NULL) {
            $this->suratKeluar->delete($id);
            session()->setFlashdata('success', 'Data Berhasil Dihapuskan.');
            return redirect()->to('surat-keluar');
        } else {
            unlink('assets/uploads/' . $res->berkas);
            $this->suratKeluar->delete($id);
            session()->setFlashdata('success', 'Data Berhasil Dihapuskan.');
            return redirect()->to('surat-keluar');
        }
    }

    public function preview($id)
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Surat Keluar',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'res' => $this->suratKeluar->getSuratKeluar($id),
            'jenis' => $this->jenisModel->getJenis()
        ];

        return view('surat_keluar/preview', $data);
    }
}
