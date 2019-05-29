<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../../App/controller/ConfirmOrders.php">ITI Cafeteria</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          <a class="nav-link" href="../../App/controller/ConfirmOrders.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../App/controller/allProducts.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../App/controller/allUsers.php">Users</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Manual Order</a>
      </li> -->
      <li class="nav-item">
          <a class="nav-link" href="../../App/controller/checks.php">Checks</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="../../App/controller/orders.php">Orders</a>
      </li>
      

    </ul>
    <div class="my-2 my-lg-0">
        <a href="#"><img src="../../assets/images/user.png" width="35" class="mr-2"/></a>
       <?php echo $_SESSION['adminUser']['name'] ?>
        <a href="../../App/controller/logout.php" class="ml-3">Log out</a>
    </div>
  </div>
</nav>
