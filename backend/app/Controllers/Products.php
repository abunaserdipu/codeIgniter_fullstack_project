<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\API\ResponseTrait;
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
    use ResponseTrait;
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->orderBy('id', 'ASC')->findAll();
        return view("products/product_list", $data);
        // return $this->respond($data);
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
        $model = new CategoryModel();
        $data['categories'] = $model->orderBy('category_name', 'ASC')->findAll();
        return view("products/product_entry", $data);
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
            'product_price' => 'required|numeric',
            'product_image' => [
                // 'uploaded[product_image]',
                'mime_in[product_image,image/jpg,image/jpeg,image/png]',
                'max_size[product_image,1024]',
            ]
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
            ],
            'product_image' => [
                'mime_in' => 'Only jpg, png, jpeg are allowed',
                'max_size' => 'Not more then 1MB'
            ],
        ];

        $validate = $this->validate($rules, $errors);

        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $img = $this->request->getFile('product_image');
            $path = "assets/" . 'uploads/';
            $img->move($path);
            $model = new ProductModel();
            $data['product_name'] = $this->request->getPost('product_name');
            $data['product_details'] = $this->request->getPost('product_details');
            $data['product_category'] = $this->request->getPost('category_name');
            $data['product_price'] = $this->request->getPost('product_price');
            $namepath = $path . $img->getName();
            $data['product_image'] = $namepath;

            $model = new ProductModel();
            $model->save($data);
            return redirect()->to('products');
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
            'product_image' => [
                // 'uploaded[product_image]',
                'mime_in[product_image,image/jpg,image/jpeg,image/png]',
                'max_size[product_image,1024]',
            ]
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
            'product_image' => [
                'mime_in' => 'Only jpg, png, jpeg are allowed',
                'max_size' => 'Not more then 1MB'
            ],
        ];
        $validate = $this->validate($rules, $errors);
        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $img = $this->request->getFile('product_image');
            $path = "assets/" . 'uploads/';
            $img->move($path);
            $namepath = $path . $img->getName();
            $data['product_image'] = $namepath;
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
