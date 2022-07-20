<?php
session_start();
    include('header.php');
    include('functions.php');

    $id = $_GET['id'];
    $prod = getByID("products", $id);
    if(mysqli_num_rows($prod) == 0){
        echo "Product Not Found";
        exit();
    }
    $item = mysqli_fetch_array($prod);
    $cookie_name = "brand";
    $cookie_value = $item['brand'];
    setcookie($cookie_name, $cookie_value, time()+20, "/")
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
                    <a class="nav-link navbar-text-color blink_me" href="trending-products.php"><i
                            class="fas fa-bullhorn "></i>&nbsp
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
                <?php include('alertmessage.php'); ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="images/<?= $item['image'];?>" alt="image" height="500px" class="shadow">

                    </div>
                    <div class="col-md-8">
                        <h4 class="text-secondary"><?= $item['brand'];?></h4>
                        <div class="row">
                            <div class="col">
                                <h4 class="text-dark"><?= $item['model'];?></h4>
                            </div>
                            <div class="col">
                                <h4 class="text-dark"><?= $item['name'];?></h4>
                            </div>
                        </div>
                        <?php
                        if($item['trending'] == '1')
                        {
                            ?>
                        <h3 style="color:red;" class="blink_me"><i class="fa-solid fa-star"></i>&nbspTrending</h3>
                        <?php
                        }
                        ?>
                        <hr>
                        <p class="text-success"> <b>Best Price</b></p>
                        <p><b style="color:#339933;font-size:24px;">&#2547;<?= $item['selling_price'];?>&nbsp&nbsp</b>
                            <s style="color:#ff0055;font-size:20px;">&#2547;<?= $item['original_price'];?></s></p>
                        <hr>
                        <h5>For: <?= $item['gender'];?></h5>
                        <h5>Bands: <?= $item['band'];?></h5>
                        <h5>Display Type: <?= $item['type'];?></h5>
                        <hr>
                        <h5>Description</h5>
                        <p><?= $item['description'];?></p>
                        <div class="col my-5">
                            <div class="input-group d-flex felx-row" style="width:120px">

                                <button class="input-group-text dec-button">-</button>
                                <button class="input-group-text inc-button">+</button>

                            </div>
                            <form action="order-product.php?id=<?= $id ?>" method="POST">
                                <input type="text" style="width:68px" name="productqty"
                                    class="form-control bg-white text-center cart-qty mb-3" value="1" readonly>
                                <button type="submit" class="btn btn-success order-btn"><i
                                        class="fa-solid fa-cart-arrow-down"></i>
                                    &nbspOrder This Product</button>
                            </form>
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