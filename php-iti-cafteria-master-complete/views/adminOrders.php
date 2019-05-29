<?php include('../../views/components/header.php') ?>
<?php include('../../views/components/navBar.php') ?>


<div class="noMarginRow row">
    <div class="col-2 ml-5 mt-2">
        <div class="adminOrders">
        <h1>Orders</h1>
    </div>
    </div>
</div>
<div class="noMarginRow row mx-auto my-5">
    <div class="col-lg-9 mx-auto border">
    <table class="productsTable table col-md-12">
        <thead class="thead-dark">
       
            <tr>
            <th scope="col">OrderDate</th>
            <th scope="col">Name</th>
            <th scope="col">Room</th>
            <th scope="col">Ext.</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($result['orders']) > 0): ?>
       
         
        <?php  foreach($result["orders"] as $key =>$res){ ?>
     
            <tr>
                <td scope="col">  <?php echo $res['date'] ?>       </td>
                <td scope="col">  <?php echo $res['user_name'] ?>  </td>
                <td scope="col">  <?php echo $res['roomNo'] ?>     </td>
                <td scope="col">  <?php echo $res['ext'] ?>        </td>
                <td scope="col">deliver</th>
            </tr>

        
<td colspan="5">

    <?php if (count($result['productOrders'][$res['id']] ) > 0): ?>

    
    <?php foreach ($result['productOrders'][$res['id']] as $pro): ?>  
  
   <span class="le"> <?php echo $pro['price']?>  LE</span> 
    <img width=80 src="<?php echo $pro['pimg'] ?>" alt="pimg">
                
    <span ><?php echo $pro['Qun']?> Q
   
    <?php endforeach; ?>
   
    <?php endif; ?>
    </td>
  
</tr>
            <tr>
                <td colspan="5">
                    <div class="total_price" >
                    <p>total price </p>
        
                   <span> <?php echo $res['total_price'] ?></span>
        </div> 
                </td>
           
            </tr>
            <tr>
            
          
           
            <?php  } ?>
            <?php endif; ?>  

          
        </tbody>
    </table>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</body>
</html>
