<div class="sidebar">

    <h2>Hello, <?php echo $_SESSION['user_name'];?></h2>

    <nav>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="product_list.php">Manage Products</a></li>
            <li><a href="admin_edituser.php">edit account</a></li>
            <li><a href="admin_createuser.php">create new user</a></li>
            <li><a href="?caller_id=logout">sign out</a></li>
        </ul>
    </nav>
</div>