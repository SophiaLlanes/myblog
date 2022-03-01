<?php require_once 'initialize.php'?>
<?php include 'shared/header.php'?>
<?php $get_data = display(); ?>
<div class="jumbotron">
    <div class="container">
        <div class="" style="background-color: #000000; padding: 20px; opacity: .7; margin-top: 50px">
            <h1>BLOG</h1>
        </div>
    </div>
</div>
<!--https://picsum.photos/500/600-->
<div class="container">
   <?php if (mysqli_num_rows($get_data) > 0 ) { ?>
       <?php while ($data = mysqli_fetch_assoc($get_data)) { ?>
           <div class="mb-4 pb-4 row border-bottom d-flex">
               <div class="col-md-3">
                   <img src="assets/images/<?php echo h($data['image']); ?>" class="w-100" style="">
               </div>
               <div class="col-md-9 pt-3">
                   <div class="mb-4">
                       <h2 class="font-bold font-weight-bold text-uppercase mb-0 text-primary"><?php echo $data['title'] ?></h2>
                       <span class="text-black-50">By <span class="font-bold font-italic"><span class="font-weight-bold"><?php echo $data['fullname'] ?> (<?php echo $data['nickname'] ?>)</span></span>, Created on <?php echo date('jS M Y') ?> </span>
                   </div>
                   <p class=""><?php echo substr_replace($data['post'], " ...", 220); ?></p>
                   <a href="view.php?id=<?php echo $data['id'] ?>" class="text-uppercase btn btn-primary">keep reading</a>
                   <?php if(is_logged_in()) { ?>
                       <div class="" style="position: absolute;bottom: 0; right: 5%">
                           <span class="float-right ml-3"><a href="edit.php?id=<?php echo $data['id'] ?>" class="border-bottom text-danger font-italic">Edit</a></span>
                       </div>
                   <?php } ?>
               </div>
           </div>
       <?php } ?>
    <?php } ?>
    <div class="" style="height: 75px"></div>
</div>

<?php include 'shared/footer.php'?>
