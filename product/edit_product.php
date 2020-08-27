<?php 
require_once "../config.php";

$productId = $_GET['id'];

$sql = "SELECT * FROM bota_product WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(":id", $productId);
$stmt->execute();

$product = $stmt->fetch();

if(!isset($product)) {
    echo("Product không tồn tại");
    header('location ../index.php');
}

?>
<?php 
include_once "../header.php";

?>

<div class="container">
<div class="row">
    <div class="col-md-8 offset-2">
        <h3 class="text-center">Edit Product: <?= $product['title'] ?></h3>

        <form action="//<?= $domain ?>/product/update_product.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $product['id']; ?>">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="<?= $product['title']; ?> ">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control" cols="30" rows="5"><?= $product['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <img width="150" src="<?= $product['img'] ?>" alt="">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" class="form-control" value="<?= $product['price']; ?>">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-block btn-success">Submit</button>
                    </div>
                    <div class="col-6">
                        <a href="javascript:history.go(-1)" class="btn btn-block btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

</div>

<?php 
include_once "../footer.php";

?>
