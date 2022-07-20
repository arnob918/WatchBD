<?php
session_start();

    include('header.php');
    include('functions.php');

    $cookie_name = "brand";

    $prods = getAll("products");
    if(isset($_COOKIE[$cookie_name])) {
        $prods = getAllBrand("products", $_COOKIE[$cookie_name]);
    }
     
?>

<head>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-bg-gradient py-3">
        <span>
            <a class="navbar-brand text-light mx-4 font-rubik" href="index.php">WatchBD</a>
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item px-4">
                    <a class="nav-link navbar-text-color" href="categories.php"><i class="fas fa-bars"></i>&nbsp
                        Categories</a>
                </li>
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
        <main class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php include('alertmessage.php');  ?>
                        <div class="row">
                            <?php
                            if(mysqli_num_rows($prods) > 0){
                                foreach($prods as $item){
                                    ?>
                            <div class="col-md-3 md-2">
                                <a href="product-view.php?id=<?=$item['id']?>" style="text-decoration: none;">
                                    <div class="card shadow my-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-center">
                                                <img src="images/<?=$item['image']?>" alt="image" height="350px">
                                            </div>
                                            <h6 class="text-secondary text-uppercase"><?= $item['brand']?></h6>
                                            <h6 class="text-dark"><?= $item['model']?></h6>
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class=" text-center text-success px-2">&#2547;<?= $item['selling_price']?></h5>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-secondary "><s>&#2547;<?= $item['original_price']?></s></h5>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>



<?php
    include('footer.php');
?>