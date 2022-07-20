<?php
    include('checkadmin.php');
    include('header.php');
?>

<head>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-bg-gradient py-3 shadow">
        <span>
            <a class="navbar-brand text-light mx-2 font-rubik" href="index.php">WatchBD</a>
            <a class="navbar-brand text-light font-rubik" href="admin.php"> / Admin</a>
            <a class="navbar-brand text-light font-rubik" href="#"> / Add Product</a>
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
            <a href="admin.php">Admin</a>
            <a href="products.php">All Products</a>
            <a class="active" href="">Add Products</a>
            <a href="placed-orders.php">Placed Orders</a>
        </div>
        <div class="content">
            <div class="container py-5">

                <div class="row">
                    <div class="col-md-12">
                        <?php include('alertmessage.php'); ?>
                        <div class="card">
                            <div class="card-header navbar-bg-gradient">
                                <h3 class="text-center  navbar-text-color">Add Product</h3>
                                <hr>
                            </div>
                            <div class="card-body bg-light shadow">
                                <form action="codes/code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Name</label>
                                            <input type="text" name="name" placeholder="Enter product Name"
                                                class="form-control my-2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Product Code</label>
                                            <input type="text" name="product-code" placeholder="Enter product Code"
                                                class="form-control my-2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Brand</label>
                                            <input type="text" name="brand" placeholder="Enter product Brand"
                                                class="form-control my-2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Model</label>
                                            <input type="text" name="model" placeholder="Enter product Model"
                                                class="form-control my-2">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Description</label>
                                            <textarea rows="3" name="description"
                                                placeholder="Enter product Description"
                                                class="form-control my-2"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="band">Band</label>
                                                <select name="band" class="form-control my-2">
                                                    <option>Band</option>
                                                    <option>Metal</option>
                                                    <option>Leather</option>
                                                    <option>Rubber</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="type">Display Type</label>
                                                <select name="type" class="form-control my-2">
                                                    <option>Display Type</option>
                                                    <option>Analog</option>
                                                    <option>Digital</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Upload Image</label>
                                            <input type="file" name="image" class="form-control my-2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Original Price</label>
                                            <input type="text" name="original-price" placeholder="Enter Original Price"
                                                class="form-control my-2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Selling Price</label>
                                            <input type="text" name="selling-price" placeholder="Enter Selling Price"
                                                class="form-control my-2">
                                        </div>
                                        <div class="col-md-6 py-3">
                                            <input type="checkbox" name="available">
                                            <label class="px-2">Available</label>
                                            <br>
                                            <input type="checkbox" name="trending">
                                            <label class="px-2">Trending</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="type">Gender type</label>
                                                <select name="gender" class="form-control my-2">
                                                    <option>Gender</option>
                                                    <option>Men</option>
                                                    <option>Ladies</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success mt-3 shadow" name="add-product">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    include('footer.php');
?>