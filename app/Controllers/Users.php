<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('users/index', $data);
    }

    public function new()
    {
        return view('users/form');
    }

    public function create()
    {
        $this->userModel->insert([
            'nama'     => $this->request->getPost('nama'),
            'jabatan'  => $this->request->getPost('jabatan'),
            'email'    => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/users')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        if (!$data['user']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('users/form', $data);
    }

    public function update($id)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $updateData = [
            'nama'     => $this->request->getPost('nama'),
            'jabatan'  => $this->request->getPost('jabatan'),
            'email'    => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $updateData);

        return redirect()->to('/users')->with('success', 'User berhasil diupdate');
    }
}
