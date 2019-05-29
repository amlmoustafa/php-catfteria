<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', TRUE);
// ini_set('display_startup_errors', TRUE);
session_start();
$checks = array();
require_once '../model/Order.php';
// require_once '../model/User.php';
if (isset($_GET['selectValue'])) {
    $order = new Order();
    $model = new Order();
    // $umodel = new User();
     $user = $model->getUser($_GET['selectValue']);
    $checks = $model->getUserOrders($_GET['selectValue']);
    $getTotal = $model->getTotal($_GET['selectValue']);
   // var_dump($getTotal);
    // var_dump($checks);
    $counter = 0;
function setEnv($id,$name){
    $_ENV['id'] = $id;
    $_ENV['name'] = $name;
}
}
?>
<div class="table-responsive">
  <table style="margin-top:0px" class="table">
    <tbody>
      <tr>
        <td>Name</td>
        <!-- <td>Total Amount</td> -->
      </tr>
      <!--<td><?php echo $user['name'] ?></td>-->
      
      <!--<td><?php if(isset($getTotal['resultset']['sum'])): ?>{-->
      <!--<?php echo $getTotal['resultset']['sum'] ?>}-->
      <!--<?php else: ?>-->
      <!-- <?php "" ?>-->
      <!-- <?php endif; ?>-->
      <!--</td>-->
    <?php $val = 0 ?>
    <?php if (is_array($checks['resultset']) && count($checks['resultset']) >0 ): ?>
    <?php foreach ($checks['resultset'] as $value) { ?>
      <?php $counter = $counter + $value["total_price"] ?>
      <?php $val = $val + 1?>
      <?php //var_dump($value['id'])?>
      <tr>
        <td>
          <div class="ac">
          <input class="ac-input" id="ac-<?php echo $val?>" name="ac-<?php echo $val?>" type="checkbox" />
          <label class="ac-label" for="ac-<?php echo $val?>"><?php echo $user['name'] ?></label>
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
              <!--<?php var_dump($allOrders["resultset"]) ?>-->
              <?php foreach ($allOrders["resultset"] as $orderValue) { ?>
              <?php //var_dump($value['id'])?>
              <article class="ac-sub-text">
                <table style="margin-top: 0px;" class="table table-striped">
                  <tbody>
                    <tr>
              <?php $allProducts = $order->getProductInfo($orderValue['product_id']) ?>
              <!--<?php var_dump($allProducts['resultset']); ?>-->
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
        <!-- <td><?php echo $counter ?></td> -->
      </tr>
    <?php }?>
     <?php endif; ?>
    </tbody>
  </table>



?>