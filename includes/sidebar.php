<?php
namespace App\Models;

?>
<div class="flex-shrink-0 p-3 bg-white col-md-3"  >
<?php
$category_obj = new Category;
$categories = $category_obj->getAllCategories();

foreach ($categories as $category) {
    ?>

    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#<?=$category['name']?>" aria-expanded="true">
        <?=$category['name']?>
        </button>
        <div class="collapse hide" id="<?=$category['name']?>">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <?php
$subcategories = $category_obj->getAllSubCategories($category['id']);
    foreach ($subcategories as $subcategory) {
        ?>
            <li><a href="<?=$subcategory['query-name']?>?subcategory=<?=$subcategory['category_id']?>" class="link-dark rounded"><?=$subcategory['name']?></a></li>

            <?php }?>
          </ul>
        </div>
      </li>
 </ul>
    <?php }?>

  </div>

