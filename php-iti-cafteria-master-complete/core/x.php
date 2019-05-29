<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>session 12</title>
        <style type="text/css">
            input, label, select,textarea{display: block; margin:5px;}
        </style>
    </head>
    <body>
        <?php
        if (isset($_POST['login'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $connection = mysqli_connect("localhost", "root", "", "newspaper5");
            $query = "insert into user (name ,password ) values ('$name' ,'$password');";
            $result = mysqli_query($connection, $query);
            if ($result) {
                $result_array['result'] = true;
                $result_array['number_of_rows'] = mysqli_affected_rows($connection);
                $result_array['inserted_id'] = mysqli_insert_id($connection);
                echo "affected row: " . $result_array['number_of_rows'];
            } else {
                $result_array['result'] = false;
                $result_array['error_no'] = mysqli_errno($connection);
                $result_array['error_message'] = mysqli_error($connection);
                echo $result_array['error_no'];
                echo $result_array['error_message'];
            }
            mysqli_close($connection);
        }
        ?>
        <!-- form1.php?username=rootsdadsads&password=123456dsads&login=login -->
        <form action="index.php" method="post">
            <label>username</label>
            <input type="text" name="name" />
            <label>password</label>
            <input type="password" name="password" />
            <input type="submit" name="login" value="login" />
        </form>
    </body>
</html>