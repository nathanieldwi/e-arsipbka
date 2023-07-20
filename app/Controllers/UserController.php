<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'User',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'result' => $this->userModel->getUsers()
        ];

        return view('user/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'User',
            'account' => $this->userModel->getUsers(session()->get('id')),
        ];

        return view('user/create', $data);
    }

    public function store()
    {
        $rules = [
            'nama_lengkap' => 'required|min_length[5]',
            'username' => 'required|min_length[5]',
            'password' => 'required|min_length[5]',
            'level' => 'required',
            'sampul' => [
                'rules' => 'max_size[sampul,5120]',
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
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default-image.jpg';
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('assets/uploads', $namaSampul);
        }

        $this->userModel->save([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'username' => $this->request->getVar('username'),
            'judul_surat' => $this->request->getVar('judul_surat'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getVar('level'),
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan.');
        return redirect()->to('user');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'User',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'res' => $this->userModel->getUsers($id),
        ];

        return view('user/edit', $data);
    }

    public function update($id)
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
            'level' => 'required',
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
            'user_id' => $id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'username' => $this->request->getVar('username'),
            'level' => $this->request->getVar('level'),
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('success', 'Data Berhasil Diubahkan.');
        return redirect()->to('user');
    }

    public function delete($id)
    {
        $res = $this->userModel->getUsers($id);
        if ($res->sampul == NULL) {
            $this->userModel->delete($id);
            session()->setFlashdata('success', 'Data Berhasil Dihapuskan.');
            return redirect()->to('user');
        } else {
            unlink('assets/uploads/' . $res->sampul);
            $this->userModel->delete($id);
            session()->setFlashdata('success', 'Data Berhasil Dihapuskan.');
            return redirect()->to('user');
        }
    }

    public function password($id)
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'User',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'res' => $this->userModel->getUsers($id),
        ];

        return view('user/password', $data);
    }

    public function change_password($id)
    {
        $rules = [
            'new_password' => 'required|min_length[2]',
            'confirm_password' => 'required|min_length[2]|matches[new_password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $this->userModel->save([
            'user_id' => $id,
            'password' => password_hash($this->request->getVar('new_password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('success', 'Password berhasil diperbaharui.');
        return redirect()->to('user');
    }
}
