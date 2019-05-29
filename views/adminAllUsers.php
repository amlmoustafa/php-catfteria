<?php include('../../views/components/header.php') ?>
<?php include('../../views/components/navBar.php') ?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>


<body background="https://cdn0.tnwcdn.com/wp-content/blogs.dir/1/files/2012/10/Food.jpg">

<div class="cover-bg" style="height:100vh">

<div class="container">
    <div class="head row">
      <div class="col-md-6">
        <h1 class="table-title">All Users</h1>
      </div>
      <div class="col-md-6 addProBtn">
        <a class="btn btn-danger " href="../../App/controller/addUser.php">Add User</a>
      </div>
      <div id="edit">
        <ul id="editForm">
            <form id="f" method='post' role="form" data-toggle="validator" novalidate="true">
            <input type="hidden" id="userId" name="userId" value="1">
              <div class="row editUser">
                <div class="col-5 mt-2">
                <li class="editField">
                    <label>
                        UserName
                    </label>
                    <input type="text" id="nameEditInput" class="form-control"  name="nameEditInput" required>
                </li>
                </div>
                <div class="col-5 mt-2">
                <li class="editField">
                    <label>
                        Room
                    </label>
                    <select class="form-control" id="roomEditInput" name="roomEditInput" >
		<option value="" selected disabled hidden>Choose Room</option>
    
    
    <?php 
    $rooms = $p->db->select("rooms"); 
    if(count($rooms)>2){
          array_splice($rooms,0,2);
        foreach($rooms['resultset'] as $key =>$room)
        { ?>

      <option value=<?php echo $room[0] ?>><?php echo $room[1] ?></option>

        <?php }}?>
        </select>
                </li>
                </div>

                <div class="col-5 mt-2">
                <li class="editField">
                    <label>
                        Ext
                    </label>
                    <input type="text" id="extEditInput" class="form-control"  name="extEditInput" required>
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
                    <input value="submit" type="submit" id="submitEditBtn" class="btn btn-success">
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
          <th>Users</th>
            <th>Room</th>
            <th>image</th>
            <th>ext</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php if(count($users)>0){
        foreach($users['resultset'] as $key =>$user)
        { ?>
          <tr>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['room_id'] ?></td>
            <td> <img width=80 src="<?php echo $user['image'] ?>" alt=""> </td>
            <td><?php echo $user['ext'] ?></td>
            <td>
            
               <a href="?userIdDel=<?php echo $user['id'] ?>" target="_self"><i class="fa fa-trash fa-2x"  aria-hidden="true" onclick="deleteRow()"></i></a>
              <i class="far fa-edit fa-2x" id="editProductBtn" name="userId" value="<?php echo $user['id'] ; var_dump($user['id']) ?>" onclick="displayEdit2(<?php echo $user['id'] ?>)"></i>

              </td>
          </tr>
          
        <?php } }?>
        </tbody>
      </table>


    </div>
  </div>

</div>
</body>
</html>

  <?php include('../../views/components/footer.php') ;
  
  ?>
