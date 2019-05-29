<?php include('../../views/components/header.php') ?>
<?php include('../../views/components/navBar.php') ?>

<div class="container">

<h2>checks</h2>

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
        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" onchange="checks($value['id'],$value['name'])">
          <option selected>Choose...</option>
          <?php foreach ($users["resultset"] as $value) { ?>
            <option value="1"><?php echo $value["name"]?></option>        
          <?php }?>
        </select>
      </div>
</div>

</div>
</form>


<!-- ===================================table=========================================== -->

<div class="table-responsive">
  <table style="margin-top:0px" class="table">
    <tbody>
      <tr>
        <td>Name</td>
        <td>Total Amount</td>
      </tr>
    <?php $val = 0 ?>
    <?php foreach ($checks["resultset"] as $value) { ?>
      <?php $counter = $counter + $value["total_price"] ?>
      <?php $val = $val + 1?>
      <tr>
        <td>
          <div class="ac">
          <input class="ac-input" id="ac-<?php echo $val?>" name="ac-<?php echo $val?>" type="checkbox" />
          <label class="ac-label" for="ac-<?php echo $val?>"><?php echo $_ENV['name'] ?></label>
          <?php $val = $val + 1 ?>
          <article class="ac-text">
            
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
              <?php } ?>
            </div>
            
          <!--/ac-text--> 
          </div> <!--/ac--> 
        </td>
        <td><?php echo $counter ?></td>
      </tr>
    <?php }?>
     
    </tbody>
  </table>
</div>
<!-- ============================================================================== -->

<?php include('../../views/components/footer.php') ?>