<?php
require_once("../layouts/header.php");
require_once(("../php/categories.php"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
</head>

<body>
    <form action="" id="form-add">
        <h1>Add Products</h1>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Camera" style="width: 400px;">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Product Image</label>
            <input class="form-control" type="file" id="formFile" style="width: 250px;">
        </div>
        <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
             <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="width: 700px;"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Product Category:</label>
            <select class="form-select" aria-label="Default select example" style="width: 250px;">
                <option selected>Select Product Category</option>
                <?php
                foreach($category as $cat) {
                ?>
                <option option ><?= $cat['name'] ?></option>
                <?php
                }
                ?>
             </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Price:</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="$50" style="width: 250px;">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Discount Percentage:</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="10%" style="width: 250px;">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Barcode:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ABC-abc-1234" style="width: 250px;">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                checked>
            <label class="form-check-label" for="exampleRadios1">
                Featured Product
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
                 Recent Product
            </label>
        </div>
        <div id="div-btn">
        <button type="submit" class="btn btn-success" id="add-btn">Add</button>
        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</html>
<?php
require_once("../layouts/footer.php");
?>