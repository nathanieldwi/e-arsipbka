<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\JenisModel;
use App\Models\SuratKeluarModel;
use App\Models\SuratMasukModel;

class HomeController extends BaseController
{
    protected $userModel;
    protected $suratMasuk;
    protected $suratKeluar;
    protected $jenisModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->suratMasuk = new SuratMasukModel();
        $this->suratKeluar = new SuratKeluarModel();
        $this->jenisModel = new JenisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Dashboard',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'countSuratMasuk' => $this->suratMasuk->countAllResults(),
            'countSuratKeluar' => $this->suratKeluar->countAllResults(),
            'countJenis' => $this->jenisModel->countAllResults(),
            'countUser' => $this->userModel->countAllResults(),
        ];

        return view('index', $data);
    }

    public function tentang_sekolah()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Tentang Sekolah',
            'account' => $this->userModel->getUsers(session()->get('id'))
        ];

        return view('tentang_sekolah', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Profile Details',
            'account' => $this->userModel->getUsers(session()->get('id'))
        ];

        return view('profile/index', $data);
    }

    public function edit_profile()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Edit Profile',
            'account' => $this->userModel->getUsers(session()->get('id'))
        ];

        return view('profile/edit_profile', $data);
    }

    public function update_profile()
    {
        $rulesSampul = $this->request->getFile('sampul');

        // cek gambar, apakah tetap gambar lama
        if ($rulesSampul->getError() == 4) {
            $rules = 'max_size[sampul,5120]';
        } else {
            $rules = 'max_size[sampul,5120]';
        }

        $rules = [
            'nama_lengkap' => 'required|min_length[5]',
            'username' => 'required|min_length[5]',
            'sampul' => [
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

        $fileSampul = $this->request->getFile('sampul');

        // cek gambar, apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulOld');
        } else {
            // generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan gambar
            $fileSampul->move('assets/uploads', $namaSampul);
            // hapus file lama
            if ($this->request->getVar('sampulOld') != 'default-image.jpg') {
                // hapus gambar
                unlink('assets/uploads/' . $this->request->getVar('sampulOld'));
            }
        }

        $this->userModel->save([
            'user_id' => $this->request->getVar('user_id'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'username' => $this->request->getVar('username'),
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('success', 'Account anda berhasil diperbaharui.');
        return redirect()->to('profile');
    }

    public function edit_password()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Edit Password',
            'account' => $this->userModel->getUsers(session()->get('id'))
        ];

        return view('profile/edit_password', $data);
    }

    public function update_password()
    {
        $rules = [
            'password' => 'required|min_length[5]',
            'confirm_password' => 'required|min_length[5]|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $this->userModel->save([
            'user_id' => $this->request->getVar('user_id'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('success', 'Password anda berhasil diperbaharui.');
        return redirect()->to('profile');
    }
}
