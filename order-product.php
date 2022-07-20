<?php
session_start();
    include('functions.php');

    $id = $_GET['id'];
    if(!isset($_SESSION['logged_in']))
    {
        $_SESSION['message'] = "Not logged in";
        header('Location: login.php');
        exit();
    }
    $product_qty = mysqli_real_escape_string($con, $_POST['productqty']);
    $prod = getByID("products", $id);
    if(mysqli_num_rows($prod) == 0){
        echo "Product Not Found";
        exit();
    }
    $item = mysqli_fetch_array($prod);
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    if(!isset($_SESSION['token'])){
        $_SESSION['token'] = substr(str_shuffle($str), 3, 6);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WatchBD</title>
    <!--Bootstrap CDN CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <!-- OwlCarousel2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css stylesheet -->
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <!-- header -->

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
                            <li><a class="dropdown-item" href="#">Cart</a></li>
                            <li><a class="dropdown-item" href="#">Wishlist</a></li>
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
                            <?php include('alertmessage.php'); ?>
                            <h3 class="text-center">Place Order</h3>
                            <button class="btn btn-success payment-guide">Payment Guide</button>
                            <hr>
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
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Product Cost (<?=$product_qty?> Items)</h5>
                                                </div>
                                                <div class="col">
                                                    <?php 
                                            $cost = $item['selling_price'];
                                            $cost = $cost * $product_qty;
                                            $tot_cost = $cost + 50;
                                        ?>
                                                    <h5 class="text-success">&#2547;<?=$cost?></h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Shipping Cost</h5>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-success ">&#2547; 50</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Total Cost</h5>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-success ">&#2547;<?=$tot_cost?></h5>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <form action="codes/code.php" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="">Name</label>
                                                        <input type="text" name="rcvname"
                                                            placeholder="Enter Receiver Name" class="form-control my-2">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Phone</label>
                                                        <input type="text" name="rcvphone"
                                                            placeholder="Enter Receiver Phone Number"
                                                            class="form-control my-2">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Address</label>
                                                    <textarea rows="2" name="rcvaddress"
                                                        placeholder="Enter Receiver Address"
                                                        class="form-control my-2"></textarea>
                                                </div>
                                                <div class="row my-4">
                                                    <h5>Payment Methods</h5>
                                                    <div class="col-md-3">
                                                        <div class="card">
                                                            <div class="card-header" style="background-color: #f7006e;">
                                                                <input class="form-check-input onlyone" type="checkbox"
                                                                    name="Bkash">
                                                                <h5 class="text-light">bkash</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <img src="images/bkash.png" height="150px" width="150px"
                                                                    alt="bkash">
                                                            </div>
                                                        </div>
                                                        <center><a class="my-1 btn text-light bkash-payment-btn"
                                                                style="background-color: #f7006e;">confirm bkash
                                                                payment</a></center>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card">
                                                            <div class="card-header" style="background-color: #00cf66;">
                                                                <input class="form-check-input onlyone" type="checkbox"
                                                                    name="COD">
                                                                <h5 class="text-light">Cash on Delivery</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <img src="images/cod.png" height="150px" width="150px"
                                                                    alt="Cash on Delivary">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 d-flex justify-content-center my-3">
                                                    <input type="hidden" name="id" value="<?=$id?>">
                                                    <input type="hidden" name="amount" value="<?=$tot_cost?>">
                                                    <input type="hidden" name="qty" value="<?=$product_qty?>">
                                                    <input type="hidden" name="payment-method"
                                                        value="<?=isset($_SESSION['bkash-payment'])? "Bkash": "Cash on Delivery"?>">
                                                    <input type="hidden" name="reference"
                                                        value="<?=$_SESSION['token']?>">
                                                    <button type="submit" name="confirm-order"
                                                        class="btn btn-warning">Confirm Order</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div>
        <div class="modal" id="bkash-popup" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Bkash Payment Details</h5>
                        <h4 class="text-danger">Do not leave this page untill payment is successfull</h4>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="images/qr.jpg" height="200px" width="200px" alt="qrcode">
                                    <h6>Scan this from your bkash app</h6>
                                </div>
                                <div class="col-md-6 my-5">
                                    <h4>Amount: &#2547;<?= $tot_cost?></h4>
                                    <h4>Reference: <?= $_SESSION['token']?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <?php
                    $_SESSION['bkash-payment'] = "true";
                ?>
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Paid</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div>
        <div class="modal" id="guideline" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>How to do payment</h5>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <p>
                                1) First fill up the form with recipient's Name, Phone No and Address.
                            </p>
                            <p>
                                2) a. If you want to pay with bkash check the top left box on bkash card then click the 'confirm bkash payment' button. Scan the qr code with your bkash app. Add the exact ammount and do not forget to put the <span class="text-danger">reference code</span>. After doing the payment click the "paid" button. <br>
                                b. If you want to pay cash on delivery then just check the top left box on cash on delivery card.
                            </p>
                            <p>
                                3) Click on the "Confirm Order" button. Done!! 
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include('footer.php');
?>