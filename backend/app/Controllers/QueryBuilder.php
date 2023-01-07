<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class QueryBuilder extends BaseController
{
    public function index()
    {
        // $db      = \Config\Database::connect();
        // $builder = $db->table('products');
        // // $builder = $db->table('users');
        // // echo "<pre>";
        // $query = $builder->get();
        // $data['raw'] = $query->getResult();
        // // print_r($row);
        // return view('products/test', $data);

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

        // $db      = \Config\Database::connect('another');
        // // $otherdb = $this->load->database('wdpf51_sampledb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        // $builder = $db->table('products')->select('name, details');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);

        // **************** 1
        // $db = \Config\Database::connect('another');
        // $builder = $db->table('employees')->select('firstName,lastName,email,jobTitle')->where('jobTitle = "Sales Rep"');
        // $query = $builder->get()->getResultArray();
        // echo "<pre>";
        // print_r($query);

        // **************** 2
        // $db = \Config\Database::connect('another');
        // $builder = $db->table('employees')->select('firstName,lastName,email,jobTitle')->where('jobTitle = "Sales Rep" and reportsTo = 1143');
        // $builder->select('firstName as ReportsTo')->where('employee');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);

        // **************** 3
        // $db = \Config\Database::connect('another');
        // $builder = $db->table('employees,offices')->select('firstName,lastName,email,city,country')->where('employees.officeCode = offices.officeCode and offices.country = "USA"');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);

        // **************** 4
        // $db = \Config\Database::connect('another');
        // $builder = $db->table('orders,customers')->select('customerName,phone,city,orderNumber,orderDate,status')->where('orders.customerNumber = customers.customerNumber');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);

        // **************** 5
        // $db = \Config\Database::connect('another');
        // $builder = $db->table('orders,orderdetails,customers')->select('customerName,phone,city,orders.orderNumber,orderDate,status,quantityOrdered,priceEach')->where('orders.customerNumber = customers.customerNumber and orderdetails.orderNumber = orders.orderNumber');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);

        // **************** 6

        // $db = \Config\Database::connect('another');
        // $builder = $db->table('orders, orderdetails, customers, products')->select('customerName, city, orders.orderNumber, orderDate, products.productCode, productName, quantityOrdered, priceEach, MSRP')->selectSum('priceEach')->selectSum('quantityOrdered')->groupBy('orders.orderNumber')->where('orders.customerNumber = customers.customerNumber and orderdetails.orderNumber = orders.orderNumber and orderdetails.productCode = products.productCode');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);

        // **************** 7
        // $db = \Config\Database::connect('another');
        // $builder = $db->table('orders,customers')->select('status,country')->where('orders.customerNumber = customers.customerNumber');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);

        // **************** 8
        // $db = \Config\Database::connect('another');
        // $builder = $db->table('orders,customers')->select('status,customerName')->where('orders.customerNumber = customers.customerNumber');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);

        // **************** 9
        // $db = $db = \Config\Database::connect('another');
        // $builder = $db->table('employees,orders,customers')->select('status,employees.firstName,jobTitle')->where('employees.employeeNumber = customers.salesRepEmployeeNumber and orders.customerNumber = customers.customerNumber and status = "shipped" and jobTitle = "Sales Rep"');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);

        // **************** 10
        // $db = $db = \Config\Database::connect('another');
        // $builder = $db->table('orders,customers')->select('status,customerName,city')->where('customers.customerNumber = orders.customerNumber and status = "Shipped"');
        // $query = $builder->get()->getResult();
        // echo "<pre>";
        // print_r($query);

        // **************** 11
        $db = $db = \Config\Database::connect('another');
        $builder = $db->table('orders')->select('orderNumber,orderDate');
        $query = $builder->get()->getResult();
        echo "<pre>";
        print_r($query);
    }
}
