<?php
    include('checkadmin.php');
    include('header.php');
?>

<head>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-bg-gradient py-3">
        <span>
            <a class="navbar-brand text-light mx-2 font-rubik" href="index.php">WatchBD</a>
            <a class="navbar-brand text-light font-rubik" href="#"> / Admin</a>
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- <li class="nav-item px-2">
                    <a class="nav-link navbar-text-color" href="#"><i class="fas fa-gift"></i>&nbsp Offers</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link navbar-text-color" href="#"><i class="fas fa-bullhorn blink_me"></i>&nbsp New
                        Deals</a>
                </li> -->
                <li class="nav-item px-5">
                    <a class="nav-link navbar-text-color" href="logout.php">Logout</a>
                </li>
            </ul>
            <!-- <form action="#" class="f-size-16 font-raleway mx-3">
                <a href="#" class="py-2 rounded-2 primary-background-color">
                    <span class="px-2 text-light">
                        <i class="fas fa-cart-arrow-down"></i>
                    </span>
                    <span class="px-2 py-2 rounded-2 text-dark bg-light">0</span>
                </a>
            </form> -->
        </div>
    </nav>
</head>

<div class="py-5">
    <div class="py-3">
        <div class="sidebar">
            <a class="active" href="">Admin</a>
            <a href="products.php">All Products</a>
            <a href="add-product.php">Add Products</a>
            <a href="placed-orders.php">Placed Orders</a>
        </div>
        <div class="content">
            <div class="container py-5">
            <?php include('alertmessage.php'); ?>
                <h3 class="text-center">Admin</h3>
                <hr>

            </div>
        </div>
    </div>
</div>



<?php
    include('footer.php');
?>