<?php
session_start();
    include('header.php');
?>

<head>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-bg-gradient py-3">
        <span>
            <a class="navbar-brand text-light mx-4 font-rubik" href="index.php">WatchBD</a>
            <a class="navbar-brand text-light  font-rubik" href="">/ Categories</a>
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item px-4">
                    <a class="nav-link navbar-text-color blink_me" href="trending-products.php"><i class="fas fa-bullhorn "></i>&nbsp
                        Trending</a>
                </li>
                <?php
                    if(isset($_SESSION['logged_in']))
                    {
                        ?>
                <li class="nav-item dropdown px-4">
                    <a class="nav-link dropdown-toggle navbar-text-color" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?=  $_SESSION['user_info']['name'] ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="admin.php">Admin</a></li>
                       
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>

                <?php
                    }
                    else
                    {
                        ?>
                <li class="nav-item px-4">
                    <a class="nav-link navbar-text-color" href="login.php"><i
                            class="fa-solid fa-right-to-bracket"></i>&nbsp Login</a>
                </li>
                <li class="nav-item px-4">
                    <a class="nav-link navbar-text-color" href="register.php"><i class="fa-solid fa-plus"></i>&nbsp
                        Register</a>
                </li>
                <?php
                    }
                ?>
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
        <div class="py-5">
            <div >
                <div class="container">
                    <h2 class="text-center">Categories</h2>
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="user-products.php?category=men">
                                        <div class="card">

                                            <div class="card-header navbar-bg-gradient navbar-text-color py-3">
                                                Men's Watch
                                            </div>
                                            <div class="card-body d-flex justify-content-center">
                                                <img src="images/mens-watch.webp" height="400" alt="mes's watch"
                                                    class="w-50">

                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="user-products.php?category=ladies">
                                        <div class="card">
                                            <div class="card-header navbar-bg-gradient navbar-text-color py-3">
                                                Ladies Watch
                                            </div>
                                            <div class="card-body d-flex justify-content-center">
                                                <img src="images/ladies-watch.webp" height="400" alt="ladies watch"
                                                    class="w-50">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </main>

            </div>
        </div>
    </div>
</div>


<?php
    include('footer.php');
?>