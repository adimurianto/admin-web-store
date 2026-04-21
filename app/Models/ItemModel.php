<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table            = 'items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama_item', 'deskripsi_item', 'foto', 'category_id', 'harga', 'edited_by', 'last_edited'];

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

    // Custom method to fetch items with their category name
    public function getItemsWithCategory()
    {
        return $this->select('items.*, categories.nama_kategori, users.nama as editor_nama')
                    ->join('categories', 'categories.id = items.category_id', 'left')
                    ->join('users', 'users.id = items.edited_by', 'left')
                    ->findAll();
    }
}
