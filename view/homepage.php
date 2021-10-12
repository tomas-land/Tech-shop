<?php
use App\Models\Product;

?>
<div id=" homepage " class="row">
    <?php
include 'inc/sidebar.php';?>
    <div class="container col-md-9 row pb-5">
    <?php
$product = new Product;
$products = $product->getAllProducts();
// echo '<pre>';
// var_dump($products);
// echo '</pre>';
foreach ($products as $product) {
    ?>
<div class="card col-sm-3 m-2 " style="width: 30%;" >
<div class="container " style="height: 220px;">
    <img src="<?=$product->image?>" class="card-img-top p-3" alt="...">
</div>
  <div class="card-body">
    <h5 class="card-title"><?=$product->brand ." " . $product->name?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <h6 ><?=$product->price?></h6>
    <a href="#" class="card-link">See details</a>
  </div>
</div>
<?php }?>
</div>
</div>