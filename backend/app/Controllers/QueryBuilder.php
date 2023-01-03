<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class QueryBuilder extends BaseController
{
    public function index()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('products');
        // $builder = $db->table('users');
        // echo "<pre>";
        $query = $builder->get();
        $data['raw'] = $query->getResult();
        // print_r($row);
        return view('products/test', $data);

        // $builder = $db->table('products');
        // $builder->select('id ,product_name, product_details, product_price');
        // $data = $builder->get();
        // $data = $data->getResult();
        // echo "<pre>";
        // print_r($data);

        // $builder = $db->table('products')->select('id,product_name, product_price')->get();
        // $data = $builder->getResult();
        // echo "<pre>";
        // print_r($data);

        // $builder = $db->table('products')->selectMax('product_price')->get();
        // $data = $builder->getResult();
        // echo "<pre>";
        // print_r($data);

        // $builder = $db->table('products')->selectSum('product_price')->groupBy('product_category')->get();
        // $data = $builder->getResult();
        // echo "<pre>";
        // print_r($data);

        // $builder = $db->table('products');
        // $builder->join('categories', 'categories.id = products.product_category');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);

        // $builder = $db->table('products,categories')->where('categories.id = product_category and product_price>4000');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);

        // $builder = $db->table('products')->where('product_price > 1000 and product_price>3000');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);


    }
}
