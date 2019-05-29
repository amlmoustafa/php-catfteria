<div class="col-md-4 navbar" >
    <ul class="nav tab-bar-icons">
        <li>
            <a href="../../App/controller/userConfirmOrders.php">
                <span class="menu-text">Home</span>
            </a>
        </li> 
        <li class="flat-box waves-effect waves-block">
            <a href="../../App/controller/myOrders.php">
                <span class="menu-text"> My Orders </span>
            </a>
        </li>
    </ul>
</div>
<div class="col-md-5">
    <ul class="nav navbar-nav navbar-right user">
        <li class="dropdown navbar-user">
            <a href="../../App/controller/logout.php">
                <span class="hidden-xs"> <?php echo $_SESSION['user']['name'] ?> </span>
                <b class="caret"></b>
            </a>
            <span> | </span>
            <a href="../../App/controller/logout.php">logout</a>
        </li>
    </ul>
    <div class="clearfix"></div>

</div>
</div>

