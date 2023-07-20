<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisModel;
use App\Models\UserModel;

class JenisController extends BaseController
{
    protected $jenisModel;
    protected $userModel;

    public function __construct()
    {
        $this->jenisModel = new JenisModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Jenis',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'result' => $this->jenisModel->getJenis()
        ];

        return view('jenis/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Jenis',
            'account' => $this->userModel->getUsers(session()->get('id'))
        ];

        return view('jenis/create', $data);
    }

    public function store()
    {
        $rules = [
            'nama_jenis' => 'required|min_length[2]',
            'detail' => 'required|min_length[2]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $this->jenisModel->save([
            'nama_jenis' => $this->request->getVar('nama_jenis'),
            'detail' => $this->request->getVar('detail'),
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan.');
        return redirect()->to('jenis');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Dashboard',
            'pages' => 'Jenis',
            'account' => $this->userModel->getUsers(session()->get('id')),
            'res' => $this->jenisModel->getJenis($id)
        ];

        return view('jenis/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_jenis' => 'required|min_length[2]',
            'detail' => 'required|min_length[2]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $this->jenisModel->save([
            'jenis_id' => $id,
            'nama_jenis' => $this->request->getVar('nama_jenis'),
            'detail' => $this->request->getVar('detail'),
        ]);

        session()->setFlashdata('success', 'Data Berhasil Diubahkan.');
        return redirect()->to('jenis');
    }

    public function delete($id)
    {
        $this->jenisModel->delete($id);
        session()->setFlashdata('success', 'Data Berhasil Dihapuskan.');
        return redirect()->to('jenis');
    }
}
