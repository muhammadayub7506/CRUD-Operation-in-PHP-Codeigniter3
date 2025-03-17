<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</head>
<body>
    <div class="container">
        <div class="row mt-5" >
            <div class="col-md-4">
                <?php // echo form_open('homecontroller/my_func', ['id' => 'my_form', 'class' => 'my_form', 'method'=>'post', 'enctype'=>'multipart-formdata']) ?>
                <?php echo form_open_multipart('homecontroller/my_func');?>
                <input type="text" class="form-control username" name="username" value="<?php echo set_value('username')?>" placeholder="Enter Username">
                <?php echo form_error('username'); ?>
                
                <input type="password" class="form-control mt-3 password" name="password" value="" placeholder="Enter Password">
                <?php echo form_error('password'); ?>
                
                <input type="email" name="email" class="form-control mt-3 email" value="<?php echo set_value('email')?>" placeholder="Enter Email">
                <?php echo form_error('email'); ?>

                <input type="file" name="document" class="form-control mt-3">
                <?php echo form_error('document'); ?>


                <!-- <?php echo form_submit('submit', 'login',['class'=>'form-control w-25 mt-5 btn btn-success']); ?> -->
                 <input type="submit" value="Login" class="form-control w-25 mt-5 btn btn-success">
                
                <?php echo form_close(); ?>
                
                <!-- <form action="">
                </form> -->
            </div>
        </div>
    </div>
</body>
</html>