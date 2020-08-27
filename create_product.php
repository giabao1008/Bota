<?php 
include_once "header.php";
?>

<div class="container">
<div class="row">
    <div class="col-md-8 offset-2">
        <h3 class="text-center">Create New Product</h3>
        <form action="save_product.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" class="form-control">
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
include_once "footer.php";

?>