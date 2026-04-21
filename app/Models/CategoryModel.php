<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama_kategori', 'foto', 'parent_id', 'edited_by', 'last_edited'];

    protected $beforeInsert = ['generateId', 'setLastEdited'];
    protected $beforeUpdate = ['setLastEdited'];

    protected function generateId(array $data)
    {
        if (!isset($data['data']['id'])) {
            $data['data']['id'] = sprintf(
                '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000,
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
            );
        }
        return $data;
    }

    protected function setLastEdited(array $data)
    {
        $data['data']['last_edited'] = date('Y-m-d H:i:s');
        if (session()->has('id')) {
            $data['data']['edited_by'] = session()->get('id');
        }
        return $data;
    }

    public function getCategoriesWithParent()
    {
        return $this->select('categories.*, parent.nama_kategori as parent_nama')
                    ->join('categories as parent', 'parent.id = categories.parent_id', 'left')
                    ->findAll();
    }
}
