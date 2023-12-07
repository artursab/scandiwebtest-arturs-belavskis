<?php
ob_start();
include_once('../private/initialize.php');
$page_title = 'Product Add';
include('../private/includes/header.php');

use MyApp\models\Book;
use MyApp\models\DVD;
use MyApp\models\Furniture;

// check for errors
$errors = validate_inputs();

if(isset($_POST['submit']) && empty($errors)){
  $result = '';
  $args = [];
  $args['sku'] = $_POST['sku'] ?? NULL;
  $args['name'] = $_POST['name'] ?? NULL;
  $args['price'] = $_POST['price'] ?? NULL;
  $args['weight'] = $_POST['weight'] ?? NULL;
  $args['size'] = $_POST['size'] ?? NULL;
  $args['width'] = $_POST['width'] ?? NULL;
  $args['length'] = $_POST['length'] ?? NULL;
  $args['height'] = $_POST['height'] ?? NULL;

  if ($_POST['weight'] != NULL) {
    $book = new Book($args);
    $result = $book->save();
  }

  if ($_POST['size'] != NULL) {
    $dvd = new DVD($args);
    $result = $dvd->save();
  }

  if ($_POST['width'] != NULL && $_POST['length'] != NULL && $_POST['height'] != NULL) {
    $furniture = new Furniture($args);
    $result = $furniture->save(); 
  }

  if ($result === true) {
    header('Location: index.php');
    exit;
  } 
  ob_end_flush();
}

?>

<body>
  <header>
    <nav>
      <h1>Product Add</h1>
        <div id='form-buttons'>
          <button name='submit' id="submit" type="submit" form='product_form' >Save</button>
          <a href="./index.php">
            <button type='button'>Cancel</button>
          </a>
        </div>
    </nav>
    <!-- line -->
    <hr>
  </header>
  
  <!-- Form where add -->
  <?= $errors ;?>
  <form action="" id='product_form' method='POST'>
    <label for="sku">SKU</label>
    <input type="text" name="sku" id='sku' maxlength='10' placeholder="JVC200123" value="<?= $_POST['sku'] ?? '';  ?>"><br>
    <label for="name">Name</label>
    <input type="text" name='name' id='name' maxlength="20" placeholder='Product Name' value="<?= $_POST['name'] ?? ''; ?>"><br>
    <label for="price">Price ($)</label>
    <input type="text" name='price' id='price' maxlength="6" placeholder="0.0" value="<?= $_POST['price'] ?? ''; ?>"><br>

    <label for="productType">Type Switcher</label>
    <select name="typeSwitcher" id="productType">
      <option value="dvd" id='DVD' <?= get_selected_type('dvd'); ?> >DVD</option>
      <option value="book" id='Book' <?= get_selected_type('book'); ?> >Book</option>
      <option value="furniture" id='Furniture' <?= get_selected_type('furniture'); ?> >Furniture</option>
    </select>

    <div id='size-container'>
      <p>Enter a size in megabyte(Mb)</p>
      <label for="size">Size (MB)</label>
      <input type="text" name='size' id='size' placeholder='0' maxlength='5' value="<?= $_POST['size'] ?? ''; ?>">
    </div>

    <div id='weight-container'>
      <p>Enter a weight in kilograms(Kg)</p>
      <label for="weight">Weight (KG)</label>
      <input type="text" name='weight' id='weight' placeholder='0.0' maxlength='5' value="<?= $_POST['weight'] ?? ''; ?>">
    </div>

    <div id='dimensions-container'>
      <p>Enter dimensions: (height/width/length)</p>
      <label for="height">Height (CM)</label>
      <input type="text" name='height' id='height' placeholder='0' maxlength='5' value="<?= $_POST['height'] ?? ''; ?>"><br>
      <label for="width">Width (CM)</label>
      <input type="text" name='width' id='width' placeholder='0' maxlength='5' value="<?= $_POST['width'] ?? ''; ?>"><br>
      <label for="length">Length (CM)</label>
      <input type="text" name='length' id='length' placeholder='0' maxlength='5' value="<?= $_POST['length'] ?? ''; ?>">
    </div>
  </form>
  
<?php include('../private/includes/footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src='./script.js'></script>
</body>
</html>
