<?php 

require_once "database.php";

// Pagination setting
$limit = 1;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
};  
$skip = ($page-1) * $limit; 

// step 2.1 -  query
$sql = "SELECT * FROM bota_product ORDER BY title ASC LIMIT $limit OFFSET $skip ";

// step 2.2. query
$stmt = $conn->prepare($sql); 

// step 4 : Execute;
$stmt->execute();
// Get All Products
$products = $stmt->fetchAll();


$countSQL = "SELECT COUNT(*) as total FROM bota_product";
$stmtCount = $conn->prepare($countSQL); 

$stmtCount->execute();

$totalProduct = intval($stmtCount->fetch()['0']);
$total_pages = ceil($totalProduct / $limit);
?>

<?php 
include_once "header.php";
?>
<div class="container py-5">
    <div class="row">
    <div class="col-12">
        <nav class="navbar navbar-light px-0 justify-content-end">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
    </div>
        <div class="col-md-12">
            <h3 class="text-center">Products List</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th><a class="btn btn-sm btn-success" href="create_product.php">Add</a></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $key => $product): ?>
                	<tr>
                        <td><?= $skip+1 ?></td>
                        <td><?= $product["title"]?></td>
                        <td><a href=""> <img width="100" src="<?= $product["img"]?>" alt=""> </a></td>
                        <td><?= $product["price"]?></td>
                        <td>
                            <a class="btn btn-sm btn-info" href="detail.php?id=<?= $product["id"]?>">View</a>
                            <a class="btn btn-sm btn-warning" href="edit_product.php?id=<?= $product["id"]?>">Edit</a>
                            <a class="btn btn-sm btn-danger remove" data-id="<?= $product['id'] ?>" href="javascript:;">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            <?php 
                $pagLink = "<ul class='pagination justify-content-center'>";  
                for ($i=1; $i<=$total_pages; $i++) {
                              $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>";	
                }
                echo $pagLink . "</ul>"; 
            ?>
        </div>
    </div>
</div>

<?php 
include_once "footer.php";
?>