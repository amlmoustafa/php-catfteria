<html>
    <head>

    </head>

    <body>
        <?php
            /*
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $db_host = "cafteria";
            
            $conn = mysql_connect($servername, $username, $password, $db_host);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $db_selected = mysql_select_db(cafteria, $link);
            
            if (!$db_selected) {
                die('Can\'t use ' . cafteria . ': ' . mysql_error());
            }*/
            require '../../core/Database.php'; 

            $db = new Database();
            var_dump($db);
            $db->selectPaginate("orders");
            $total="select * from orders";
            var_dump($total);

              $count=mysqli_query($total);
              $nr=mysqli_query($total);
              echo $nr;
            
              $items_per_page=2;
              $totalpages=ceil($nr/$items_per_page);
              if(isset($_GET['page']) && !empty($_GET['page'])){
                $page=$GET['page'];
              }
              else 
                $page=1;
              $offset=($page-1) *$items_per_page;
              $sql="select * from orders limit $items_per_page offset $offset";
              $result=mysqli_query($sql);
              $row_count=mysqli_num_rows($result);
              while($row=mysqli_fetch_assoc($result))
                echo ' * '.$row['description'].'<br/>';
              echo "<div class='pagination'>";
                for($i=1 ; $i<=$totalpages ; $i++){
                    if($i==$page)
                        echo '<a class="active">' . $i . '</a>';
                    else
                        echo '<a href="/mypagination.php?page='.$i.'">'.$i.'</a>';
                } 
        ?>
    </body>
</html>