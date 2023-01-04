<?php
require_once("../layouts/header.php");
require_once("../php/products.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
</head>
<body>
<div class="container table-responsive py-5" id="table-con"> 
<table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Discount</th>
      <th scope="col">Rating</th>
      <th scope="col">Rating Count</th>
      <th scope="col">Featured Product</th>
      <th scope="col">Recent Product</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody style="text-align: center">
    <?php
    $index = 1;
    foreach($products as $prod) {
        ?>
    <tr>
      
      <th scope="row"><?php echo $index ?></th>
      <td><?= $prod['name'] ?></td>
      <td><img class="img-fluid w-100" src="<?= '../' . $prod['img'] ?>" alt="<?= $prod['name'] ?>" id="img-products" /></td>
      <td>$<?= $prod['price'] ?></td>
      <td><?= ( $prod['discount'] * 100 ) ?>%</td>
      <td><?= $prod['rating']?></td>
      <td><?= $prod['rating_count']?></td>
      <?php
      if ($prod["is_featured"]) {
      ?>
      <td><button type="button" class="btn btn-success" disabled id="add-btn">Yes</button></td>
      <td><button type="button" class="btn btn-danger" disabled id="add-btn">No</button></td>
      <?php
      }
      ?>
      <?php
      if ($prod["is_recent"]) {
      ?>
      <td><button type="button" class="btn btn-danger" disabled id="add-btn">No</button></td>
      <td><button type="button" class="btn btn-success" disabled id="add-btn">Yes</button></td>
    <?php
    }
    ?>
    <td><button type="button" class="btn btn-warning" id="add-btn">Edit</button></td>
    <td><button type="button" class="btn btn-danger" id="add-btn">Delete</button></td>
    </tr>
    <?php
    
    $index ++;
    }
    ?>
  </tbody>
</table>
<button type="button" class="btn btn-success" id="add-btn">Add</button>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>
<?php
require_once("../layouts/footer.php");
?>
