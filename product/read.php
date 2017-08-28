<?php
/**
 * Created by PhpStorm.
 * User: SAJID
 * Date: 8/19/2017
 * Time: 11:53 AM
 */

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//include database and object
include "../config/Database.php";
include "../objects/Product.php";

// instanatiate Database
$database = new Database();
$db = $database->getConnection();

//initialize product
$product = new Product($db);

//read products
$stmt = $product->read1();
$num = $stmt->rowCount();

if ($num > 0) {
  $products = array();
  $products['records'] = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $product_item = array(
      'id' => $id,
      'name' => $name,
      'description' => $description,
      'price' => $price,
      'category_id' => $category_id,
      'category_name' => $category_name
    );
    array_push($products['records'], $product_item);
  }
  echo json_encode($products);
} else {
  echo json_encode(
    array("Message" => "NO Products Found")
  );
}

