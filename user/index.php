<?php 

require_once "../config.php";
// step 2.1 -  query

if(!isAdmin()) {
    echo('Bạn không có quyền thực hiện chức năng này');
    die();
}
session_start();
$currentUserEmail = $_SESSION['email'];
$sql = "SELECT * FROM bota_user WHERE email != '$currentUserEmail' ";

// step 2.2. query
$stmt = $conn->prepare($sql); 

// step 4 : Execute;
$stmt->execute();
// Get All Products
$users = $stmt->fetchAll();

?>

<?php 
include_once "../header.php";
?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">User List</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th> Name </th>
                        <th>Email</th>
                        <th>Role</th>
                        <th><a class="btn btn-sm btn-success" href="//<?= $domain ?>/user/create_user.php">Add</a></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                	<tr>
                        <td><?= $user["id"] ?></td>
                        <td><?= $user["name"]?></td>
                        <td><?= $user["email"]?></td>
                        <td>
                        <?php 
                            if($user["role"] == 3) { echo'Admin' ;}
                            else if($user["role"] == 2) {echo'CTV' ;}
                            else echo'Thành viên'; 
                        
                        ?></td>
                        <?php if($role != 1 )  : ?>
                            <td>
                                <a class="btn btn-sm btn-warning" href="//<?= $domain ?>/user/edit_user.php?id=<?= $user["id"]?>">Edit</a>
                                <a class="btn btn-sm btn-danger remove-user" data-id="<?= $user['id'] ?>" href="javascript:;">Delete</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
include_once "../footer.php";
?>