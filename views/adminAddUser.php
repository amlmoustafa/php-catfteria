<?php include('../../views/components/header.php') ?>
<?php include('../../views/components/navBar.php') ?>

<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>

<body background="https://cdn0.tnwcdn.com/wp-content/blogs.dir/1/files/2012/10/Food.jpg" class="body">
    
    
<div class="cover-bg" style="height: 100%;">
      
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                <span class="login100-form-title-1">
                    Add User
                </span>
            </div>
            
            <form method="post" class="login100-form validate-form"  enctype="multipart/form-data">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Name</span>
                    <input class="input100 form-control" type="text" name="name" placeholder="Enter name" >
                    <span >* <?php echo $nameErr;?></span>
                    <span class="focus-input100"></span>
                </div>
                
                <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required" >
                    <span class="label-input100">Email</span>
                    <input class="input100 form-control" type="text" name="email" placeholder="Enter email" >
                    <span >* <?php echo $emailErr;?></span>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-26" data-validate="Password is required" >
                    <span class="label-input100">Password</span>
                    <input class="input100 form-control" type="password" name="password" placeholder="Enter Password" >
                    <span >* <?php echo $passwordErr;?></span>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-26" data-validate="Confirm Password">
                    <span class="label-input100">Confirm Password</span>
                    <input class="input100 form-control" type="password" name="cpassword" placeholder="Confirm Password" >
                    <span >* <?php echo $cpasswordErr;?></span>
                    <span class="focus-input100"></span>
                </div>
         
                <div class="wrap-input100 validate-input m-b-26" data-validate="Ext">
                    <span class="label-input100">ٌRoom</span>
    <select class="form-control" id="roomNo" name="roomNo" >
		<option value="" selected disabled hidden>Choose Room</option>
    
    
    <?php 
    $rooms = $user->db->select("rooms"); 
    if(count($rooms)>2){
          array_splice($rooms,0,2);
        foreach($rooms['resultset'] as $key =>$room)
        { ?>

      <option value=<?php echo $room[0] ?>><?php echo $room[1] ?></option>

        <?php }}?>


    </select>
		</div>
                
                
                <div class="wrap-input100 validate-input m-b-26" data-validate="Ext">
                    <span class="label-input100">ٌExt</span>
                    <input style="margin-top: 20px;" class="input100 form-control" type="text" name="ext" placeholder="Ext" >
                    <span >* <?php echo $extErr;?></span>
                    <span class="focus-input100"></span>
                </div>
                
            


                    <div class="wrap-input100 validate-input m-b-26" data-validate="Profile Picture">
                    <span class="label-input100">Profile Picture</span>
                     <input type="file" id="profilePicture form-control" name="profilePicture" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="mx-auto" style="margin-top: 40px;">
	                <button type="submit" class="btn btn-primary form btn-danger" name="submit">Save</button>
                    <button style="background-color: #354b58;" type="submit" class="btn btn-light form">Reset</button>
	            </div>
	
	            
            </form>
        </div>
    </div>
</div>

</div>
</body>
<?php include('../../views/components/footer.php') ?>
