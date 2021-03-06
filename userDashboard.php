<div class="offcanvas offcanvas-end" id="userDashboard">
    <div class="offcanvas-header bg-secondary">
        <h1 class="offcanvas-title text-center text-light w-100 m-0 p-0">Profile</h1>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class='list-group categoryOffcanvasList'>
            <?php 
            if($_SESSION['ROLE']!='ADMIN')
            {
            ?>
                <a class='list-group-item list-group-active text-center' href="userProfile.php">Profile</a>
                <a class='list-group-item list-group-active text-center' href="orders.php">Orders</a>
                <a class='list-group-item list-group-active text-center' href="wishlist.php">Wishlist</a>
                <a class='list-group-item list-group-active text-center' href="addresses.php">Addresses</a>
                <a class='list-group-item list-group-active text-center' href="logout.php">Logout</a>
            <?php 
            }
            else
            {
            ?>
                <a class='list-group-item list-group-active text-center' href="admin/index.php">Admin Panel</a>
                <a class='list-group-item list-group-active text-center' href="logout.php">Logout</a>
            <?php
            }
            ?>
        </div>
    </div>
</div>