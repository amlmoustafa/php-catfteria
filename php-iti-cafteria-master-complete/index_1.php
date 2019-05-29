<!--<!DOCTYPE html>

To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

<?php require './App/model/User.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

    </head>
    <body>
        <?php include('../views/components/header.php') ?>
        <?php if (isset($_SESSION['err'])): ?>
        <?php $err = $_SESSION['err'];?>
        <?php echo "<div class='error_messgae'> $err </div>" ?>
        <?php endif; ?>

        <div class="noMarginRow loginRow row">
            <div class="col-lg-4 ml-5 mt-5 col-md-6 col-sm-10">
                <?php include("./views/components/loginForm.php") ?>
            </div>
            <div class="col-lg-6 mt-5 d-md-none d-lg-block">
                <img src="./views/assets/images/welcome.png"/>
            </div>
        </div>

        <?php include('../views/components/footer.php') ?>
    </body>
</html>-->
