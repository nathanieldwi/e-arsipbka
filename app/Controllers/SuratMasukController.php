<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisModel;
use App\Models\SuratMasukModel;
use App\Models\UserModel;

class SuratMasukController extends BaseController
{
    protected $suratMasuk;
    protected $jenisModel;
    protected $userModel;

    public function __construct()
    {
        $this->suratMasuk = new SuratMasukModel();
        $this->jenisModel = new JenisModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Surat Masuk',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'result' => $this->suratMasuk->getSuratMasuk()
        ];

        return view('surat_masuk/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Surat Masuk',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'jenis' => $this->jenisModel->getJenis()
        ];

        return view('surat_masuk/create', $data);
    }

    public function store()
    {
        $rules = [
            'no_surat' => 'required|min_length[5]',
            'tgl_masuk' => 'required',
            'judul_surat' => 'required|min_length[5]',
            'tgl_diterima' => 'required|min_length[5]',
            'asal_surat' => 'required|min_length[5]',
            'jenis_id' => 'required',
            'dokumen' => [
                'rules' => 'max_size[dokumen,5120]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'keterangan' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $fileDokumen = $this->request->getFile('dokumen');
        if ($fileDokumen->getError() == 4) {
            $namaDokumen = 'default-image.jpg';
        } else {
            $namaDokumen = $fileDokumen->getRandomName();
            $fileDokumen->move('assets/uploads', $namaDokumen);
        }

        $this->suratMasuk->save([
            'no_surat' => $this->request->getVar('no_surat'),
            'tgl_masuk' => $this->request->getVar('tgl_masuk'),
            'judul_surat' => $this->request->getVar('judul_surat'),
            'tgl_diterima' => $this->request->getVar('tgl_diterima'),
            'asal_surat' => $this->request->getVar('asal_surat'),
            'jenis_id' => $this->request->getVar('jenis_id'),
            'dokumen' => $namaDokumen,
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan.');
        return redirect()->to('surat-masuk');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Surat Masuk',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'res' => $this->suratMasuk->getSuratMasuk($id),
            'jenis' => $this->jenisModel->getJenis()
        ];

        return view('surat_masuk/edit', $data);
    }

    public function update($id)
    {
        $rulesDokumen = $this->request->getFile('dokumen');

        // cek gambar, apakah tetap gambar lama
        if ($rulesDokumen->getError() == 4) {
            $rules = 'max_size[dokumen,5120]';
        } else {
            $rules = 'max_size[dokumen,5120]';
        }

        $rules = [
            'no_surat' => 'required|min_length[5]',
            'tgl_masuk' => 'required',
            'judul_surat' => 'required|min_length[5]',
            'tgl_diterima' => 'required|min_length[5]',
            'asal_surat' => 'required|min_length[5]',
            'jenis_id' => 'required',
            'dokumen' => [
                'rules' => $rules,
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'keterangan' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $fileDokumen = $this->request->getFile('dokumen');

        // cek gambar, apakah tetap gambar lama
        if ($fileDokumen->getError() == 4) {
            $namaDokumen = $this->request->getVar('dokumenOld');
        } else {
            // generate nama file random
            $namaDokumen = $fileDokumen->getRandomName();
            // pindahkan gambar
            $fileDokumen->move('assets/uploads', $namaDokumen);
            // hapus file lama
            if ($this->request->getVar('dokumenOld') != 'default-image.jpg') {
                // hapus gambar
                unlink('assets/uploads/' . $this->request->getVar('dokumenOld'));
            }
        }

        $this->suratMasuk->save([
            'suratmasuk_id' => $id,
            'no_surat' => $this->request->getVar('no_surat'),
            'tgl_masuk' => $this->request->getVar('tgl_masuk'),
            'judul_surat' => $this->request->getVar('judul_surat'),
            'tgl_diterima' => $this->request->getVar('tgl_diterima'),
            'asal_surat' => $this->request->getVar('asal_surat'),
            'jenis_id' => $this->request->getVar('jenis_id'),
            'dokumen' => $namaDokumen,
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        session()->setFlashdata('success', 'Data Berhasil Diubahkan.');
        return redirect()->to('surat-masuk');
    }

    public function delete($id)
    {
        $res = $this->suratMasuk->getSuratMasuk($id);
        if ($res->dokumen == NULL) {
            $this->suratMasuk->delete($id);
            session()->setFlashdata('success', 'Data Berhasil Dihapuskan.');
            return redirect()->to('surat-masuk');
        } else {
            unlink('assets/uploads/' . $res->dokumen);
            $this->suratMasuk->delete($id);
            session()->setFlashdata('success', 'Data Berhasil Dihapuskan.');
            return redirect()->to('surat-masuk');
        }
    }

    public function preview($id)
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Surat Masuk',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'res' => $this->suratMasuk->getSuratMasuk($id),
            'jenis' => $this->jenisModel->getJenis()
        ];

        return view('surat_masuk/preview', $data);
    }
}
