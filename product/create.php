<?php
/**
 * Created by PhpStorm.
 * User: SAJID
 * Date: 8/19/2017
 * Time: 12:41 PM
 */

// Include headers
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json; charset=UTF-8");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


//include database and product object
include "../config/Database.php";
include "../objects/Product.php";

//initialize db and object
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$data = json_decode(file_get_contents('php://input'));

$product->name = $data->name;
$product->price = $data->price;
$product->description = $data->descriptoion;
$product->category_id = $data->category_id;
$product->created = date('Y-m-d H:i:s');

if ($product->create()) {
  echo '{';
  echo '"message": "Product was created."';
  echo '}';
} else {
  echo '{';
  echo '"message": "Unable to create product."';
  echo '}';
}