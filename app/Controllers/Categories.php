<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Categories extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data['categories'] = $this->categoryModel->getCategoriesWithParent();
        return view('categories/index', $data);
    }

    public function new()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('categories/form', $data);
    }

    public function create()
    {
        $file = $this->request->getFile('foto');
        $fileName = null;
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/categories', $fileName);
        }

        $parent_id = $this->request->getPost('parent_id');

        $this->categoryModel->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'parent_id'     => empty($parent_id) ? null : $parent_id,
            'foto'          => $fileName
        ]);

        return redirect()->to('/categories')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['category'] = $this->categoryModel->find($id);
        // Exclude itself from parent options
        $data['categories'] = $this->categoryModel->where('id !=', $id)->findAll();
        
        if (!$data['category']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('categories/form', $data);
    }

    public function update($id)
    {
        $category = $this->categoryModel->find($id);
        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $parent_id = $this->request->getPost('parent_id');
        $updateData = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'parent_id'     => empty($parent_id) ? null : $parent_id,
        ];

        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/categories', $fileName);
            $updateData['foto'] = $fileName;
            
            if (!empty($category['foto']) && file_exists(FCPATH . 'uploads/categories/' . $category['foto'])) {
                unlink(FCPATH . 'uploads/categories/' . $category['foto']);
            }
        }

        $this->categoryModel->update($id, $updateData);

        return redirect()->to('/categories')->with('success', 'Kategori berhasil diupdate');
    }
}
