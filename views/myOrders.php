<?php include('../../views/components/header.php') ?>



<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>

<body background="https://cdn0.tnwcdn.com/wp-content/blogs.dir/1/files/2012/10/Food.jpg" class="body">
    
    
    
<div class="container-fluid">
    <div class="row main-header">
        <!-- Header Navbar: style can be found in header.less -->
        <?php include('../../views/components/userNavBar.php') ?>
        <?php if (isset($_SESSION['err']) && $_SESSION['err'] != ""): ?>
            <?php $err = $_SESSION['err']; ?>
            <?php echo "<div class='alert alert-danger mt-3'> $err </div>" ?>
            <?php unset($_SESSION['err']) ?>
        <?php endif; ?>
            <?php if (isset($_SESSION['success']) && $_SESSION['success'] != ""): ?>
            <?php $sucess = $_SESSION['success']; ?>
            <?php echo "<div class='alert alert-success mt-3'> $sucess </div>" ?>
            <?php unset($_SESSION['success']) ?>
        <?php endif; ?>
        
<div class="myorder-table container mt-5" style="background-color: #808080cf; border-radius: 15px; padding: 25px; height:100vh; max-height: 600px; overflow-y: scroll;">
<h2>My Orders</h2><br>

<form method="post">
  <div class="row">
    <div class="col">
      <input type="text" onfocus="(this.type='date')" 
      class="form-control" placeholder="Date from" name="startDate" >
    </div>

    <div class="col">
      <input type="text" onfocus="(this.type='date')" 
      class="form-control" placeholder="Date to" name="endDate">
    </div>

    <div class="col">
      
      <button class="btn-danger btn" type="submit" onclick="getMyOrders()">Search</button>
    </div>
    
  </div>
</form>

<br><br>

<div class="table-responsive">
  <table style="margin-top:0px;color:#f2f2f2;" class="table">
    <tbody>
      <tr>
        <td>Order Date</td>
        <td>Status</td>
        <td>Amount</td>
        <td>Action</td>
      </tr>
      <?php $val = 0 ?>
      <?php if(isset($orders["resultset"]) && is_array($orders["resultset"])) { ?>
      <?php foreach ($orders["resultset"] as $value){?>
      <?php if($value["status"] == 0 || $value["status"] == 1 || $value["status"] == 2){?>
      
      <?php $val = $val + 1?>
      <tr>
        <td>
          <!-- first section  -->
            <div class="ac">
              <input class="ac-input" id="ac-<?php echo $val?>" name="ac-<?php echo $val?>" type="checkbox" />
              <label style="background-color: #092140;" id ="firstRow" class="ac-label" for="ac-<?php echo $val?>"><?php echo $value["date"]?></label>
              <?php $allOrders = $order->getOrderProducts($value['id']) ?>
              <?php foreach ($allOrders["resultset"] as $orderValue) { ?>
              <article class="ac-text" style="position: absolute;top: 80vh;left: 50vw;">
                  <div class="ac-sub">
                    <label for="ac-<?php echo $val?>">
                        <div style=" margin-top: 60px;" class="table-responsive">
                          <table>
                            <tr>
                            <?php $allProducts = $order->getProductInfo($orderValue['product_id']) ?>
                            <?php foreach ($allProducts["resultset"] as $productValue) { ?> 
                              <td>
                                <figure>
                                  <img style="width:50px; height:50px;" src="<?php echo $productValue['image'] ?>" alt="product1">
                                  <figcaption><?php echo $productValue['name']?></figcaption>
                                  <figcaption><?php echo $orderValue['amount']?></figcaption>
                                  <figcaption><?php echo $productValue['price']?></figcaption>
                                </figure>
                              </td>
                            <?php } ?> 
                            </tr>
                          </table>
                        </div>
                    </label>
                  </div>
              </article>
              <?php }?>
            </div>
          <!-- first section  -->
        </td>
        <td><?php 
        if($value["status"] == 0){ 
           echo "Processing";
        } else if($value["status"] == 1){
          echo "Out for delivery";
        } else if($value["status"] == 2){
          echo "Done";
        }
        ?>
        </td>
        <td><?php 
        echo $value["total_price"];
        ?>
        </td>
        <td><?php if($value["status"] == 0){ ?>
            <?php $id=$value['id'] ?>
            <a style="color:#dc4443;" id="myCancel" href="./myOrders.php?mid=<?php echo $id ?>" >cancel</a>
        <?php }?>
        </td>
        </tr>
        <?php }?>
      <?php }?>
      <?php }?>
    </tbody>
  </table>
</div>

</div>
</body>

<!-- start pagination  -->


<!-- end pagination -->

<?php include('../../views/components/footer.php') ?>

