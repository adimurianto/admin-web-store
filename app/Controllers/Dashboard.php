<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\CategoryModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $itemModel = new ItemModel();
        $categoryModel = new CategoryModel();
        $userModel = new UserModel();

        $data = [
            'total_items'      => $itemModel->countAllResults(),
            'total_categories' => $categoryModel->countAllResults(),
            'total_users'      => $userModel->countAllResults(),
        ];

        return view('dashboard/index', $data);
    }
}
