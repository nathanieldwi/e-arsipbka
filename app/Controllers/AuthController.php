<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Aplikasi E-Arsip Digital',
            'pages' => 'Form Login'
        ];

        return view('auth/login', $data);
    }

    public function cek_login()
    {
        $rules = [
            'username' => 'required|min_length[2]',
            'password' => 'required|min_length[2]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $this->userModel->where('username', $username)->first();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessLogin = [
                    'isLogin' => true,
                    'id' => $user['user_id'],
                    'level' => $user['level']
                ];

                session()->set($sessLogin);
                return redirect()->to('');
            } else {
                session()->setFlashdata('error', 'Password Anda Salah!');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Username Tidak Terdaftar');
            return redirect()->to('auth');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth');
    }
}
