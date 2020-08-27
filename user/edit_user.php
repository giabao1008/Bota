<?php 
require_once "../config.php";

$userID = $_GET['id'];

$sql = "SELECT * FROM bota_user WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(":id", $userID);
$stmt->execute();

$user = $stmt->fetch();

if(!isset($user)) {
    echo("User không tồn tại");
    header('location index.php');
}
?>


<?php 
include_once "../header.php";
?>

<div class="container">
<div class="row">
    <div class="col-md-8 offset-2">
        <h3 class="text-center">Edit User <?= $user['email'] ?></h3>
        <form action="//<?=$domain?>/user/update_user.php" method="post" >
        <input type="hidden" name="id" value="<?= $user['id']  ?>">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>" require>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" require>
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="role" id="" class="form-control">
                    <option value="1" <?= $user['role'] == 1 ? 'selected' : ''  ?> >Thành Viên</option>
                    <option value="2" <?= $user['role'] == 2 ? 'selected' : ''  ?>>CTV</option>
                    <option value="3" <?= $user['role'] == 3 ? 'selected' : ''  ?>>Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" require>
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