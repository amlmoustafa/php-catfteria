

<?php include('../../views/components/header.php') ?>
<?php include('../../views/components/navBar.php') ?>

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Add Product
					</span>
				</div>

<form method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="productName">Product</label>
    <input type="text" class="form-control" id="productName" name="productName" required>
  </div>
	<div class="form-group">
    <label for="productPrice">Price</label>
    <input type="number" class="form-control" id="productPrice" name="productPrice" required>
  </div>
  <div class="form-group row">
	<div class="col-sm-8">
    <label for="productCategory">Category</label>
    <select class="form-control" id="productCategory" name="productCategory" required>
		<option value="" selected disabled hidden>Choose category</option>
    
    
    <?php 
    $categories = $p->db->select("categories"); 
    if(count($categories)>2){
          array_splice($categories,0,2);
        foreach($categories['resultset'] as $key =>$category)
        { ?>

      <option value=<?php echo $category[0] ?>><?php echo $category[1] ?></option>

        <?php }}?>


    </select>
		</div>
		<div class="col-sm-3 mt-4">

      <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
      Add category
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <label for="newCategory">Category Name</label>
            <input type="text" class="form-control-file" id="newCategory" name="newCategory">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="sendReq()" data-dismiss="modal">Save Category</button>
            </div>
          </div>
        </div>
      </div>


		</div>
  </div>
  
  <div class="form-group col-sm-6 row"> 
    <label for="productImage">Product Image</label>
    <input type="file" class="form-control-file" id="productImage" name="productImage" required>
  </div>
	<div class="mx-auto text-center">
	<button type="submit" class="btn btn-primary" name="submit">Save</button>
  <button type="reset" class="btn btn-light">Reset</button>
	</div>
</form>
			</div>
		</div>
	</div>



<?php include('../../views/components/footer.php') ?>

