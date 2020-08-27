<?php 
include_once "../header.php";
?>

<div class="container">
<div class="row">
    <div class="col-md-8 offset-2">
        <h3 class="text-center">Create New User</h3>
        <form action="//<?=$domain?>/user/save_user.php" method="post" >
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" require>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" require>
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="role" id="" class="form-control">
                    <option value="1">Thành Viên</option>
                    <option value="2">CTV</option>
                    <option value="3">Admin</option>
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