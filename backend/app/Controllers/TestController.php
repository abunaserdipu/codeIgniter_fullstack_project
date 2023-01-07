<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class TestController extends BaseController
{
    public function index()
    {
        $parser = \Config\Services::parser();
        $data['page_title'] = 'Home page';
        // return view('pages/home');
        return $parser->setData($data)->render('pages/home');
    }
    public function about()
    {
        return view('pages/about');
    }
    public function productList()
    {
        $model = new ProductModel();
        $data = [
            'products' => $model->paginate(3, 'group1'),
            'pager' => $model->pager,
        ];

        return view('pages/list', $data);
    }
}
