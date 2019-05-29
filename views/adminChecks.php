<?php include('../../views/components/header.php') ?>
<?php include('../../views/components/navBar.php') ?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>

<body background="https://cdn0.tnwcdn.com/wp-content/blogs.dir/1/files/2012/10/Food.jpg">
    
<div class="" style="height: 100vh;">
    
<div class="form-bk" style="width: 80%; max-height: 570px; overflow-y: scroll;">
<div class="container">

<h1>checks</h1>

<form>
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
      <button type="submit" onclick="getNewOrders()">Search Orders by date</button>
</div>
<!-- <?php setEnv($value['id'],$value['name']); header('./checks.php'); ?> -->
</div>
<div class="row">
  <div class="form-row align-items-center">
      <div style="padding-left: 19px" class="col-auto my-1">
        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" >
          <option selected>Choose...</option>
          <?php foreach ($users["resultset"] as $uservalue) { ?>
            <option value="<?php echo $uservalue['id'] ?>"><?php echo $uservalue["name"]?></option>        
          <?php }?>
        </select>
      </div>
</div>

</div>
</form>


<!-- ===================================table=========================================== -->
<div id="orderProductsM" >
<div class="table-responsive">
  <table style="margin-top:0px" class="table">
    <tbody class="chk-table">
      <tr>
        <td>Name</td>
        <td>Total Amount</td>
      </tr>
    <?php $val = 0 ?>
    <?php foreach($users["resultset"] as $user): ?>
    <?php $checks = $order->getUserOrders($user['id']); ?>
    <?php //if(is_array($checks) && count($checks)>0 ): ?>
      
      <?php $val = $val + 1?>
      <tr>
        <td>
          <div class="ac">
          <input class="ac-input" id="ac-<?php echo $val?>" name="ac-<?php echo $val?>" type="checkbox" />
          <label class="ac-label" for="ac-<?php echo $val?>"><?php echo $user['name']?></label>
          <article class="ac-text">
    <?php $counter = 0 ?>
    <?php foreach ($checks["resultset"] as $value) { ?>
    <?php $counter = $counter + $value["total_price"] ?>
          <?php $val = $val + 1 ?>
            
            <div class="ac-sub">
              <input class="ac-input" id="ac-<?php echo $val?>" name="ac-<?php echo $val?>" type="checkbox" />

              <label class="ac-label" for="ac-<?php echo $val?>">
                <div class="table-responsive">
                
                    <table style="width: 100%;">
                      
                      <tr>
                        <td><?php echo $value['date']?></td>
                        <td><?php echo $value['total_price']?></td>
                      </tr>
                    </table>
                  </div>
              </label>
              <?php $allOrders = $order->getOrderProducts($value['id']) ?>
          
              <?php foreach ($allOrders["resultset"] as $orderValue) { ?>
              <article class="ac-sub-text">
                <table style="margin-top: 0px;" class="table table-striped">
                  <tbody>
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
            <?php }?>
                    </tr>
                  </tbody>
                </table>
              </article>
    <?php }?>
              <?php }?>
            </div>
            
          <!--/ac-text--> 
          </article>
          </div> <!--/ac--> 
           
        </td>
        <td><?php echo $counter ?></td>
      </tr>
     
    <?php //endif; ?>
    <?php endforeach ?>
    </tbody>
  </table>
</div>
</div>
<!-- ============================================================================== -->
</div>
</div>
</body>
</html>

<?php include('../../views/components/footer.php') ?>