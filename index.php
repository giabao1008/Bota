<?php 

require_once "config.php";
// step 2.1 -  query
$sql = "SELECT * FROM bota_product ";

// search 
if(isset($_GET['s'])) {
    $name = $_GET['s'];
    $sql.= " WHERE title LIKE '%$name%' ";
}
$sql .= " ORDER BY title ASC ";
// Pagination setting
$limit = 20;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
};  
$skip = ($page-1) * $limit; 

$sql .= " LIMIT $limit OFFSET $skip ";


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
            <form class="form-inline" action="//<?= $domain ?>/<?= isset($_GET['page'])?'?page='.$_GET['page'].'&' : '' ?>" method="get">
                <input class="form-control mr-sm-2" type="search" name='s' placeholder="Search" aria-label="Search">
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
                        <th id="title_header"> Title <i class="fa fa-sort"></i></th>
                        <th>Image</th>
                        <th id="price_header">Price <i class="fa fa-sort"> </th>
                        <th>
                        <?php 
                            
                        if( canHandle() )  : ?>
                            <a class="btn btn-sm btn-success" href="//<?= $domain ?>/product/create_product.php">Add</a>
                        <?php endif; ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $key => $product): ?>
                	<tr>
                        <td><?= $skip+$key+1 ?></td>
                        <td><?= $product["title"]?></td>
                        <td><a href=""> <img width="100" src="//<?=$domain ?>/<?= $product["img"]?>" alt=""> </a></td>
                        <td><?= $product["price"]?></td>
                       
                            <td>
                                <a class="btn btn-sm btn-info" href="//<?= $domain ?>/product/detail.php?id=<?= $product["id"]?>">View</a>
                                <?php if( canHandle() )  : ?>
                                <a class="btn btn-sm btn-warning" href="//<?= $domain ?>/product/edit_product.php?id=<?= $product["id"]?>">Edit</a>
                                <a class="btn btn-sm btn-danger remove-product" data-id="<?= $product['id'] ?>" href="javascript:;">Delete</a>
                                <?php endif; ?>
                            </td>
                        
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            <?php 
                if(!empty($products) && $total_pages > 1 ) :
                    $pagLink = "<ul class='pagination justify-content-center'>";  
                    for ($i=1; $i<=$total_pages; $i++) {
                        if(!isset($name)) $pagLink .= "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                        else $pagLink .= "<li class='page-item'><a class='page-link' href='?s=$name&page=$i'>$i</a></li>";
                    }
                    echo $pagLink . "</ul>"; 

                endif; 
            ?>
        </div>
    </div>
</div>

<?php 
include_once "footer.php";
?>