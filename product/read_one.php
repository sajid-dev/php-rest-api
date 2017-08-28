<?php
/**
 * Created by PhpStorm.
 * User: SAJID
 * Date: 8/19/2017
 * Time: 1:01 PM
 */

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

//include database and object
include "../config/Database.php";
include "../objects/Product.php";

// instanatiate Database
$database = new Database();
$db = $database->getConnection();

//initialize product
$product = new Product($db);

//read products

$product->id = isset($_GET['id']) ? $_GET['id'] : die();

$product->readone();

$product_item = array(
  'id' => $product->id,
  'name' => $product->name,
  'description' => $product->description,
  'price' => $product->price,
  'category_id' => $product->category_id,
  'category_name' => $product->category_name
);

echo json_encode($product_item);

?>


