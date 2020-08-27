<?php 
require_once "../config.php";

$productId = $_GET['id'];

$sql = "SELECT * FROM bota_product WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(":id", $productId);
$stmt->execute();

$product = $stmt->fetch();

?>
<?php 
include_once "../header.php";

?>
<div class="container">
   <div class="row justify-content-center mt-5">
       <div class="col-4">
        <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="//<?= $domain ?>/<?php echo $product['img'] ?>" alt="<?= $product['title'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $product['title'] ?></h5>
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item px-0">Price : <strong><?= $product['price'] ?>vnd</strong></li>
                    </ul>
                    <p class="card-text"><?= $product['description'] ?></p>
                </div>
                <div class="card-body">
                    <a href="javascript:history.go(-1)" class="card-link btn btn-info">Back</a>
                </div>
            </div>
       </div>
   </div>
</div>



<?php 
include_once "../footer.php";
?>