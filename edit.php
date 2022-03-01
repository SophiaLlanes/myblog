<?php require_once 'initialize.php'?>
<?php include 'shared/header.php'?>
<?php if (!isset($_GET['id'])){
    redirect_to('index.php');
} ?>
<?php $id = $_GET['id']; ?>
<?php
if(is_post_request()) {
    $post = [];
    $post['id'] = $id;
    $post['title'] = $_POST['title'] ?? "";
    $post['fullname'] = $_POST['fullname'] ?? "";
    $post['nickname'] = $_POST['nickname'] ?? "";
    $post['post'] = $_POST['post'] ?? "";

    $result = update_post($post);
    if($result === true) {
        redirect_to('blog.php');
    } else {
        $errors = $result;
    }
}else{
   $post = find_blog_post_by_id($id);
}

?>
<div class="jumbotron">
    <div class="container">
        <div class="" style="background-color: #000000; padding: 10px; opacity: .7; margin-top: 50px">
            <h1>Edit</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card card-body">
                <form id="submitForm" action="" method="post" >
                    <div class="form-group">
                        <label for="title" class=""> Title </label>
                        <input type="text" class="form-control" id="title"  name="title"  value="<?php echo h($post['title']); ?>">
                    </div>
                    <div class="row">
                       <div class="col-md-6">
                           <label for="fullname" class=""> Full Name </label>
                           <input type="text" class="form-control" id="fullname"  name="fullname"  value="<?php echo h($post['fullname']); ?>">
                       </div>
                       <div class="col-md-6">
                           <label for="nickname"> Nickname </label>
                           <input type="text" class="form-control" id="nickname"  name="nickname"  value="<?php echo h($post['nickname']); ?>">
                       </div>
                    </div>
                    <div class="form-group required">

                    </div>
                    <div class="form-group required">
                        <label for="post"> Post </label>
                        <textarea class="form-control " id="post" rows="5" style=""  name="post"><?php echo str_replace("<br/>", "\n",  $post['post']); ?></textarea>
                    </div>
                    <div class="form-group pt-1">
                        <button class="btn btn-success btn-block" type="submit"> Save Changes </button>
                        <a class="btn btn-danger btn-block" type="submit" href="blog.php"> Cancel </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="" style="height: 75px"></div>
<?php include 'shared/footer.php'?>
