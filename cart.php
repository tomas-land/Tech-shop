<?php
namespace App\Models;

include 'init.php';
include 'includes/header.php';

if (!session_id()) {
    session_start();
}
$cart = new Cart();
if (isset($_POST['addToCart'])) {
    $product_id = $_POST['product_id'];
    $product = new Product;
    $product_details = $product->getProductByID($product_id);
    $cart_item = new CartItem($product_details);

    if (isset($_SESSION['cart'])) {
        $cart = unserialize($_SESSION["cart"]);
        $cart->addItem($cart_item);
        $_SESSION['cart'] = serialize($cart);
    } else {
        $cart->addItem($cart_item);
        $_SESSION['cart'] = serialize($cart);
    }
}
$cart = unserialize($_SESSION['cart']);
?>
<div class="col-12 mt-5"><div class="text-end"><a href="/tech3"><button class='btn btn-warning'>Back to shopping</button></a></div></div>
<div class='mt-5'><h1>Your Cart <?php if (empty($cart)) {echo ' is empty';}?></h1>
<table class="table table-striped mt-5">
  <thead>
    <tr>
      <th scope="col" colspan="3" class='w-50'>Product</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
    </tr>
  </thead>
  <tbody>
    <?php

if (!empty($cart)) {
    foreach ($cart as $item) {
        ?>
      <tr>
        <td><img src="<?=$item['item']->getImage()?>" alt="" style="height: 70px;width: 80px" ></td>
        <td><?=$item['item']->getBrand()?></td>
        <td><?=$item['item']->getModel()?></td>
        <td><?=$item['item']->getPrice()?></td>
        <td><?=$item['qty']?></td>
      </tr>
<?php }}
?>
  </tbody>
</table>
</div>

<?php

// PROCEDURAL EXAMPLE
// $product_ids = array();
// if (isset($_POST['addToCart'])) {  // if customer press button add to cart
//     $product_id = $_POST['product_id'];  //getting product id from form that has been submited
//     $product = new Product;  // creating new object of Product
//     $product_details = $product->getProductByID($product_id);  // fetching details of product from database by id
//     if (isset($_SESSION['cart'])) { // if session cart already exists
//         $count = count($_SESSION['cart']); // count how many items in cart
//         $product_ids = array_column($_SESSION['cart'], 'id'); // returns id from each array
//         pre($product_ids);
//         if (!in_array($product_id, $product_ids)) { // checking if id passed from form exists in $products_id(id array of existing cart items)
//             $_SESSION['cart'][$count] = array( // if not, we creating new array with product details and assigning to cart with index by passing number of items to cart array as array index
//                 'id' => $product_id,
//                 'brand' => $product_details[0]['brand'],
//                 'price' => $product_details[0]['price'],
//                 'quantity' => $_POST['quantity'],
//             );
//         } else {  // if id exists in array
//             for ($i = 0; $i < count($product_ids); $i++) { // looping through indexed assoc array with product ids passed from form // array( [0]=> 1,[1]=>3 .... )
//                 if ($product_ids[$i] == $product_id) {     // if product id passed from form matches product id existing in cart
//                     $_SESSION['cart'][$i]['quantity'] += $_POST['quantity']; // increasing quantity in cart
//                 }
//                 ;
//             }
//         }
//     } else {  // if session cart not exist , create new cart item in the cart

//         $_SESSION['cart'][0] = array(
//             'id' => $product_id,
//             'brand' => $product_details[0]['brand'],
//             'price' => $product_details[0]['price'],
//             'quantity' => $_POST['quantity'],

//         );
//     }
//  -----------------------------------------------------------
