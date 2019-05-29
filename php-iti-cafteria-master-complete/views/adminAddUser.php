<?php include('../../views/components/header.php') ?>
<?php include('../../views/components/navBar.php') ?>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                <span class="login100-form-title-1">
                    Add User
                </span>
            </div>
            
            <form method="post" class="login100-form validate-form">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Name</span>
                    <input class="input100" type="text" name="name" placeholder="Enter name" >
                    <span >* <?php echo $nameErr;?></span>
                    <span class="focus-input100"></span>
                </div>
                
                <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required" >
                    <span class="label-input100">Email</span>
                    <input class="input100" type="text" name="email" placeholder="Enter email" >
                    <span >* <?php echo $emailErr;?></span>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-26" data-validate="Password is required" >
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Enter Password" >
                    <span >* <?php echo $passwordErr;?></span>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-26" data-validate="Confirm Password">
                    <span class="label-input100">Confirm Password</span>
                    <input class="input100" type="password" name="cpassword" placeholder="Confirm Password" >
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
                    <input class="input100" type="text" name="ext" placeholder="Ext" >
                    <span >* <?php echo $extErr;?></span>
                    <span class="focus-input100"></span>
                </div>
                
            


                    <div class="wrap-input100 validate-input m-b-26" data-validate="Profile Picture">
                    <span class="label-input100">Profile Picture</span>
                    <input  class="input100" type="file" name="profilePicture" id="profilePicture" >
                    <span class="focus-input100"></span>
                </div>

                <div class="mx-auto text-center">
	<button type="submit" class="btn btn-primary" name="submit">Save</button>
  <button type="submit" class="btn btn-light">Reset</button>
	</div>
            </form>
        </div>
    </div>
</div>

<?php include('../../views/components/footer.php') ?>
