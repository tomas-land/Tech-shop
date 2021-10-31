<?php
use App\Models\Product;
var_dump($_SERVER['REQUEST_URI']) ;
?>
<div id=" homepage " class="row">
    <?php include 'includes/sidebar.php';?>
    <div class="container col-md-9 row pb-5">
    <?php
$product = new Product;
if (isset($_GET['subcategory'])) {
    $subcategory_id = $_GET['subcategory'];
    $products = $product->getAllProductsBySubcategory($subcategory_id);
    foreach ($products as $product) {
        ?>
<div class="card col-sm-3 m-2 " style="width: 30%;" >
<div class="container " style="height: 220px;">
<form action="cart/index.php" method="post">
<img src="<?=$product->image?>" class="card-img-top p-3" alt="...">
    <input type="hidden" name='product_image' value="<?=$product->image?>">
</div>
  <div class="card-body">
    <h5 class="card-title"><?=$product->brand . " " . $product->name?></h5>
    <input type="hidden" name='product_brand' value="<?=$product->brand?>">
    <input type="hidden" name='product_name' value="<?=$product->name?>">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <h6 ><?=$product->price?></h6>
    <input type="hidden" name='product_price' value="<?=$product->price?>">
    <a href="#" class="card-link">See details</a><br>
    <button type="submit" name='addToCart' class="btn btn-warning my-2">Buy <i class="fas fa-shopping-cart"></i></button>
 </form>
  </div>
</div>
<?php
}} else {
    $products = $product->getAllProducts();
    foreach ($products as $product) {
        ?>

<div class="card col-sm-3 m-2 " style="width: 30%;" >
<div class="container " style="height: 220px;">
<form action="cart/index.php" method="post">
    <img src="<?=$product->image?>" class="card-img-top p-3" alt="...">
</div>
  <div class="card-body">
    <h5 class="card-title"><?=$product->brand . " " . $product->name?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <h6 ><?=$product->price?></h6>
    <a href="#" class="card-link">See details</a><br>
    <input type="hidden" name='product_id' value="<?=$product->id?>">
    <input type="hidden" name='qty' value="1">
    <button type="submit" name='addToCart' class="btn btn-warning my-2">Buy <i class="fas fa-shopping-cart"></i></button>
 </form>
  </div>
</div>

<?php }}?>
</div>
</div>

