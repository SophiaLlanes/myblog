<?php require_once 'initialize.php'?>
<?php include 'shared/header.php'?>
<?php if (!isset($_GET['id'])){
    redirect_to('index.php');
} ?>
<?php $id = $_GET['id']; ?>
<?php
$visitor = [];
if(is_post_request()) {
    $comment = [];
    $comment['blog_id'] = $id;
    $comment['fullname'] = $_POST['fullname'] ?? "";
    $comment['nickname'] = $_POST['nickname'] ?? "";
    $comment['date'] = $_POST['date'] ?? "";
    $comment['hobbies'] = $_POST['hobbies'] ?? "";
    $comment['interest'] = $_POST['interest'] ?? "";
    $comment['comment'] = $_POST['comment'] ?? "";

    $res = add_comment($comment);
    if($res === true) {
        redirect_to('view.php?id='.$id);
    } else {
        $errors = $res;
    }
}else{
    $comment = find_blog_post_by_id($id);
    $visitor = find_blog_visitor_by_post_id($id);
}

?>
<div class="" style="height: 100px"></div>
<!--<div class="jumbotron">-->
<!--    <div class="container" style="">-->
<!---->
<!--    </div>-->
<!--</div>-->
<div class="container">
    <div class="row clearfix">
        <div class=" col-md-12 left-box">
            <div class="card single_post p-3">
                <div class="body">
                    <div class="img-post mb-2 row d-flex justify-content-center">
                        <img class="d-block img-fluid" src="assets/images/<?php echo h($comment['image']); ?>" style="width: 200px" >
                    </div>
                    <h3 class="text-primary text-center text-uppercase font-weight-bold"><?php echo h($comment['title']); ?></h3>
                    <p><?php echo $comment['post']; ?></p>
                </div>
            </div>
            <div class="" style="height: 50px"></div>
            <div class="card p-3">
                <div class="header">
                    <h3><?php echo (mysqli_num_rows($visitor) == 1 ? "Comment" : mysqli_num_rows($visitor) == 0) ? "Comment" : "Comments" ?> (<?php echo mysqli_num_rows($visitor); ?>)</h3>
                </div>
                <div class="body mt-3">
                    <ul class="list-unstyled">
                        <?php if (mysqli_num_rows($visitor) > 0 ) { ?>
                            <?php while ($vis = mysqli_fetch_assoc($visitor)) { ?>
                                <li class="row clearfix mb-4">
                                    <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="profile"></div>
                                    <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                       <div class="row">
                                           <div class="col-md-12">
                                               <div class="form-group">
                                                   <h5 class="m-b-0"><?php echo h(ucfirst($vis['fullname'])); ?> <span class="font-italic text-lowercase">(<?php echo h(($vis['fullname'])); ?>)</span> </h5>
                                               </div>
                                           </div>
                                       </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <b>Birthday</b>: <?php echo h($vis['date']); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <b>Hobbies</b>: <?php echo h(ucfirst($vis['hobbies'])); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <b>Interest</b>: <?php echo h(ucfirst($vis['interest'])); ?>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="row">
                                           <div class="col-md-12">
                                               <div class="form-group">
                                                   <b>Comment:</b>
                                                   <p><?php echo h(ucfirst($vis['comment'])); ?></p>
                                               </div>
                                           </div>
                                       </div>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="" style="height: 50px"></div>
            <div class="card p-2">
                <div class="header p-2">
                    <h2>Leave a comment</h2>
                </div>
                <div class="body">
                    <div class="comment-form">
                        <form class="row clearfix" method="post" action="#" >
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input required type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input required type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input required type="date" class="form-control" id="date" name="date" placeholder="Date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <textarea required rows="2" class="form-control no-resize" id="hobbies" name="hobbies" placeholder="Hobbies"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <textarea required rows="2" class="form-control no-resize" id="interest" name="interest" placeholder="Interest"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea  required rows="4" class="form-control no-resize" id="comment" name="comment" placeholder="Please type what you want..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="" style="height: 75px"></div>
<?php include 'shared/footer.php'?>
