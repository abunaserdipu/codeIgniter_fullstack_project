<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "constraint" => 5,
                "auto_increment" => true
            ],
            "product_name" => [
                "type" => "VARCHAR",
                "constraint" => 100,
                "null" => false
            ],
            "product_details" => [
                "type" => "VARCHAR",
                "constraint" => 300,
                "null" => true
            ],
            "product_price" => [
                "type" => "DECIMAL",
                "constraint" => "10, 2",
            ],
        ]);
        $this->forge->addKey(["id", true]);
        $this->forge->createTable("products");
    }

    public function down()
    {
        $this->forge->dropTable("products");
    }
}
