<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\CategoryModel;

class Items extends BaseController
{
    protected $itemModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->itemModel = new ItemModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data['items'] = $this->itemModel->getItemsWithCategory();
        return view('items/index', $data);
    }

    public function new()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('items/form', $data);
    }

    public function create()
    {
        $file = $this->request->getFile('foto');
        $fileName = null;
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/items', $fileName);
        }

        // Remove dots/commas from harga
        $harga = str_replace(['.', ','], '', $this->request->getPost('harga'));

        $this->itemModel->insert([
            'nama_item'      => $this->request->getPost('nama_item'),
            'deskripsi_item' => $this->request->getPost('deskripsi_item'),
            'category_id'    => $this->request->getPost('category_id'),
            'harga'          => (int)$harga,
            'foto'           => $fileName
        ]);

        return redirect()->to('/items')->with('success', 'Item berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['item'] = $this->itemModel->find($id);
        $data['categories'] = $this->categoryModel->findAll();
        
        if (!$data['item']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('items/form', $data);
    }

    public function update($id)
    {
        $item = $this->itemModel->find($id);
        if (!$item) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $updateData = [
            'nama_item'      => $this->request->getPost('nama_item'),
            'deskripsi_item' => $this->request->getPost('deskripsi_item'),
            'category_id'    => $this->request->getPost('category_id'),
        ];

        // Format harga
        $harga = str_replace(['.', ','], '', $this->request->getPost('harga'));
        $updateData['harga'] = (int)$harga;

        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/items', $fileName);
            $updateData['foto'] = $fileName;
            
            // Delete old photo if exists
            if (!empty($item['foto']) && file_exists(FCPATH . 'uploads/items/' . $item['foto'])) {
                unlink(FCPATH . 'uploads/items/' . $item['foto']);
            }
        }

        $this->itemModel->update($id, $updateData);

        return redirect()->to('/items')->with('success', 'Item berhasil diupdate');
    }
}
