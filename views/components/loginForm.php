<?php include('../../views/components/header.php') ?>
<?php if (isset($_SESSION['err'])&& $_SESSION['err'] !=""): ?>
    <?php $err = $_SESSION['err']; ?>
    <?php echo "<div class='alert alert-danger mt-3'> $err </div>" ?>
<?php endif; ?>

<body background="https://cdn0.tnwcdn.com/wp-content/blogs.dir/1/files/2012/10/Food.jpg">

<div class="form-bk">

    <form class="login-form" method="post">
        <div class="form-group">
            <input name="email" type="email" class="form-control" id="loginInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" >
            <span >
                <?php if (isset($_SESSION['nameErr']) && $_SESSION['nameErr'] !="" ): ?>
                    <?php $err = $_SESSION['nameErr']; ?>
                    <?php echo "<div class='alert alert-danger mt-3'> $err </div>" ?>
                <?php unset($_SESSION['nameErr']) ?>
                <?php endif; ?>
            </span>
            <span class="focus-input100"></span>
        </div>
        <div class="form-group">
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <span >
                <?php if (isset($_SESSION['passErr']) && $_SESSION['passErr'] !="" ): ?>
                    <?php $err = $_SESSION['passErr']; ?>
                    <?php echo "<div class='alert alert-danger mt-3'> $err </div>" ?>
                 
                 <?php unset($_SESSION['passErr']) ?>
                <?php endif; ?>
            </span>
            <span class="focus-input100"></span>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label style="color:black;" class="form-check-label" for="exampleCheck1" id="rememberMe">Remember me</label>
        </div>
        <button type="submit" name="submit" id="submitLogin" class="btn btn-primary">Submit</button>
    
        <button style="background-color: green; border: 1px solid green;" type="submit" name="forget" id="forgetLink" class="btn btn-primary">Forget Password</button>
        <br>
        <a href="#" id="forgetLink">Forget Password</a>
    </form>
</div>

    
</body>
<?php include('../../views/components/footer.php') ?>
