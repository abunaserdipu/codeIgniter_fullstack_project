<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\RESTful\ResourceController;

class Products extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    function __construct()
    {
        helper(['form', 'url']);
    }
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view("products/product_list", $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view("products/product_entry");
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {

        $rules = [
            'product_name' => 'required|min_length[5]|max_length[25]',
            'product_details' => 'required|min_length[20]',
            'product_price' => 'required|numeric'
        ];
        $errors = [
            'product_name' => [
                'required' => 'Product name must be filled',
                'min_length' => 'Minimum length is 5!',
                'max_length' => 'Maximum length is 25!'
            ],
            'product_details' => [
                'required' => 'Product details must be filled',
                'min_length' => 'Minimum length is 5!'
            ],
            'product_price' => [
                'required' => 'Product price must be filled',
                'numeric' => 'Price must be numeric'
            ]
        ];

        $validate = $this->validate($rules, $errors);

        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $model = new ProductModel();
            $data = $this->request->getPost();

            if ($model->save($data)) {
                // return redirect()->to('products');
                return redirect()->to(site_url('/products'))->with('msg', 'Successfull Inserted');
            }
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $model = new ProductModel();
        $data['product'] = $model->find($id);
        return view("products/product_edit", $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        // $validate = $this->validate([
        //     'product_name' => 'required|min_length[5]|max_length[20]',
        //     'product_details' => 'required|min_length[10]',
        //     'product_price' => 'required|numeric',
        // ]);
        // $validation = \Config\Services::validation();

        $rules = [
            'product_name' => 'required|min_length[5]|max_length[20]',
            'product_details' => 'required|min_length[10]',
            'product_price' => 'required|numeric',
        ];
        $errors = [ //Errors
            'product_name' => [
                'required' => 'Product Name must be fill',
                'min_length' => 'Minimum length 5',
                'max_length' => 'Maximum length 20'
            ],
            'product_details' => [
                'required' => 'Product Details must be fill',
                'min_length' => 'Minimum length 5',
            ],
            'product_price' => [
                'required' => 'Product Price must be fill',
                'numeric' => 'Number only',
            ],
        ];
        $validate = $this->validate($rules, $errors);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $model = new ProductModel();
            $data['product_name'] = $this->request->getPost('product_name');
            $data['product_details'] = $this->request->getPost('product_details');
            $data['product_price'] = $this->request->getPost('product_price');
            $model->update($id, $data);
            return redirect()->to('products')->with('msg', "Updated Successfully");
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new ProductModel();
        if ($model->delete($id)) {
            return redirect()->to("products");
        }
    }
}
