<?php include('../../views/components/header.php') ?>
<?php include('../../views/components/navBar.php') ?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>


<body background="https://cdn0.tnwcdn.com/wp-content/blogs.dir/1/files/2012/10/Food.jpg">

<div class="cover-bg" style="height: 100vh;">
    
<div class="container">
    
    <div class="head row">
      <div class="col-md-6">
        <h1 class="table-title">All Products</h1>
      </div>
      
      <div class="col-md-6 addProBtn">
          <a class="btn btn-danger " href="../../App/controller/addProduct.php">Add Product</a>
      </div>
      
      <div id="edit">
        <ul id="editForm">
            <form id="f" method='post' role="form" data-toggle="validator" novalidate="true">
            <input type="hidden" id="productId" name="productId" value="1">
              <div class="row editProduct">
                <div class="col-5 mt-2">
                <li class="editField">
                    <label>
                        ProductName
                    </label>
                    <input type="text" id="nameEditInput" class="form-control"  name="nameEditInput" required>
                </li>
                </div>
                <div class="col-5 mt-2">
                <li class="editField">
                    <label>
                        Price
                    </label>
                    <input type="number" id="priceEditInput" class="form-control"  name="priceEditInput" required>
                </li>
                </div>
                <div class="col-5 mt-2">
                <li class="editField">
                    <label>
                        Available
                    </label>
                    <select class="form-control" id="avaEditInput" name="avaEditInput" required>
		                <option value="" selected disabled hidden>Choose category</option>
                    <option value="2" >Unavailable</option>
                    <option value="1" >Available</option>
                    </select>
                </li>
                </div>
                <!-- <div class="col-5 mt-2">
                <li class="editField">
                    <label>
                        Image
                    </label>
                    <input type="file" id="imageEditInput" class="form-control" name="imageEditInput" required>
                </li>
                </div> -->
                <div class="col-5 mt-2">
                <li class="editField">
                    <input value="Submit" type="submit" id="submitEditBtn" class="btn btn-success">
                </li>
              </div>
            </form>
        </ul>
    </div>
    </div>

    <div class="tablecontant">
      <table class="productsTable table">
        <thead class="thead-dark">
          <tr>
            <th>Product</th>
            <th>price</th>
            <th>image</th>
            <th>Available</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          if(sizeof($pageProducts)>0)
          {
        foreach($pageProducts as $key =>$product)
        { ?>
          <tr>
            <td><?php echo $product['name'] ?></td>
            <td><?php echo $product['price'] ?></td>
            <td> <img width=80 src="<?php echo $product['image'] ?>" alt=""> </td>
            <td> <?php echo $product['availability'] == 1 ? "yes" : "no"?> </td>
            <td>

                <a href="?productIdDel=<?php echo $product['id'] ?>" target="_self"><i class="fa fa-trash fa-2x"  aria-hidden="true" onclick="deleteRow()"></i></a>
              
              <i class="far fa-edit fa-2x" id="editProductBtn" onclick="displayEdit(<?php echo $product['id'] ?>)"></i>


            </td>
          </tr>
          
        <?php  }} ?>
        </tbody>
      </table>

          <ul id="paggination">
            
          <?php 
          if($pageNum>2){
            echo '<li><a href="?page=1"><<</a></li>';
          for($i=2;$i<$pageNum;$i++)
          {
          ?>
            <li><a href="?page=<?php echo $i ?>" target="_self" rel="noopener noreferrer"><?php echo $i ?></a></li>
            <?php } 
            echo '<li><a href=?page='.$pageNum.">>></a></li>";
          }

          if($pageNum == 2){
            echo '<li><a href="?page=1">1</a></li>';
          for($i=2;$i<$pageNum;$i++)
          {
          ?>
            <li><a href="?page=<?php echo $i ?>" target="_self" rel="noopener noreferrer"><?php echo $i ?></a></li>
            <?php } 
            echo '<li><a href=?page='.$pageNum.">>></a></li>";
          }


            ?>
          </ul>
    </div>
  </div>

</div>
</body>
</html>
  <?php include('../../views/components/footer.php') ;
  
  ?>
