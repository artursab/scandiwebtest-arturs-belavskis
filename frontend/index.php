<?php

use MyApp\models\Product;

include_once('../private/initialize.php'); 
$page_title = 'Product List';
include('../private/includes/header.php');

$products = Product::select_all();

// Delete the selected items
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteId'])) 
{
  Product::delete();
}

?>

<body>
  <header>
    <nav class="header-content">
      <h1>Product List</h1>
        <div id='nav-buttons'>
          <a href="./new_product.php"><button id='add-product-btn' type='button'>ADD</button></a> 
          <button id='delete-product-btn' form='product_list' type='submit' name='delete'>MASS DELETE</button>
        </div>
    </nav>
    <!-- line -->
    <hr>
  </header>

  <main>
  <!-- Get all the products from the database and display them -->
    <form class="row" action="" id='product_list' method='POST'>
      <?php foreach ($products as $product) { ?>
        <div class="cols card-body"> 
          <input type="checkbox" name="deleteId[]" value="<?= $product->id ?>" class="delete-checkbox">
            <span><?= $product->sku; ?></span><br>
            <span><?= $product->name; ?></span><br>
            <span><?= $product->price . ' $'; ?></span><br>
            <span><?php
              echo $product->weight != 0.0 ? "Weight: " . $product->weight . " KG" : '';
              echo $product->size != 0 ?  "Size: " . $product->size . " MB" : '';
              echo $product->dimensions != '0' ? 
              "Dimensions: " . extract_from_database_array($product->dimensions): '';?>
            </span>
        </div>
      <?php }; ?>
   </form>
  </main>
<?php include('../private/includes/footer.php'); ?>
</body>
</html>