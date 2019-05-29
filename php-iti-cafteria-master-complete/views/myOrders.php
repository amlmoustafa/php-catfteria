<?php include('../../views/components/header.php') ?>

<?php include('../../views/components/navBar.php') ?>


<!-- start user navbar -->

<div class="container-fluid">
            <div class="row main-header">
                <!-- Header Navbar: style can be found in header.less -->
                <div class="col-md-4 navbar" >
                    <ul class="nav tab-bar-icons">
                        <li>
                            <a href="/phpProject/home.php">
                                <span class="menu-text">Home</span>
                            </a>
                        </li> 
                        <li class="flat-box waves-effect waves-block">
                            <a href="/phpProject/myOrders.php">
                                <span class="menu-text"> My Orders </span>
                            </a>
                        </li>

                    </ul>
                </div>
                
                <div class="col-md-5">
                </div>
                <div class="col-md-3">
                    <ul class="nav navbar-nav navbar-right user">

                        <li class="dropdown navbar-user">
                           
                            <a href="javascript:;" class="dropdown-toggle profile-name" data-toggle="dropdown" aria-expanded="false">
                                <img src="images/14690942_936478356496967_3208200680112630503_n.jpg" alt=""/>
                                <span class="hidden-xs"> Nourhan </span>
                                <b class="caret"></b>
                            </a>
                            
                        </li>
                    </ul>
                    <div class="clearfix"></div>
             
                </div>
            </div>

      <!-- end user navbar-->

<div class="container">

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
      
      <button type="submit" onclick="getMyOrders()">Search Orders by date</button>
    </div>
    
  </div>
</form>

<br><br>

<div class="table-responsive">
  <table style="margin-top:0px" class="table">
    <tbody>
      <tr>
        <td>Order Date</td>
        <td>Status</td>
        <td>Amount</td>
        <td>Action</td>
      </tr>
      <?php foreach ($orders["resultset"] as $value){?>
      <tr>
        <td>
          <!-- first section  -->
            <div class="ac">
              <input class="ac-input" id="ac-1" name="ac-1" type="checkbox" />
              <label id ="firstRow" class="ac-label" for="ac-1"><?php echo $value["date"]?></label>

              <article class="ac-text" style="position: absolute;top: 80vh;left: 50vw;">
                  <div class="ac-sub">
                    <label for="ac-1">
                        <div class="table-responsive">
                          <table>
                            <tr>
                              <td>
                                <figure>
                                  <img style="width:50px; height:50px;" src="../../assets/images/user.png" alt="product1">
                                  <figcaption>tea</figcaption>
                                  <figcaption>amount</figcaption>
                                  <figcaption>price</figcaption>
                                </figure>
                              </td>
                              
                              <td><img style="width:50px; height:50px;" src="../../assets/images/user.png" alt="product2"></td>
                              <td><img style="width:50px; height:50px;" src="../../assets/images/user.png" alt="product3"></td>
                            </tr>
                          </table>
                        </div>
                    </label>
                  </div>
              </article>
            </div>
          <!-- first section  -->
        </td>
        <td><?php 
        if($value["status"] == 0){ 
           echo "Processing";
        } else if($value["status"] == 1){
          echo "Out for delivery";
        } else {
          echo "Done";
        }
        ?>
        </td>
        <td><?php 
        echo $value["total_price"];
        ?>
        </td>
        <td><?php if($value["status"] == 0){ ?>
            <?php var_dump($value['id']); ?>
            <a id="myCancel" href="./myOrders.php?mid=$value['id']" onclick="<?php $order->cancelOrders($value['id'])?>">cancel</a>
        <?php }?>
        </td>
        </tr>
      <?php }?>
    </tbody>
  </table>
</div>


<!-- start pagination  -->


<!-- end pagination -->

<?php include('../../views/components/footer.php') ?>

