<?php
    include('checkadmin.php');
    include('header.php');
    include('functions.php');
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
            <a href="#about">About</a>
        </div>
        <div class="content">
            <div class="container py-5">

                <div class="row">
                    <div class="col-md-12">
                        <?php include('alertmessage.php');
                        
                        if(isset($_GET['id'])){

                            $id = $_GET['id'];
                            $query = getByID("products", $id);

                            if(mysqli_num_rows($query) > 0)
                            {

                                $old_data = mysqli_fetch_array($query);
                                ?>
                        <div class="card">
                            <div class="card-header navbar-bg-gradient">
                                <h3 class="text-center  navbar-text-color">Edit Product</h3>
                                <hr>
                            </div>
                            <div class="card-body bg-light shadow">
                                <form action="codes/code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="id" value="<?= $old_data['id']?>">
                                            <label for="">Name</label>
                                            <input type="text" value="<?= $old_data['name']?>" name="name"
                                                class="form-control my-2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Product Code</label>
                                            <input type="text" value="<?= $old_data['product_code']?>"
                                                name="product-code" class="form-control my-2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Brand</label>
                                            <input type="text" value="<?= $old_data['brand']?>" name="brand"
                                                class="form-control my-2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Model</label>
                                            <input type="text" value="<?= $old_data['model']?>" name="model"
                                                placeholder="Enter product Model" class="form-control my-2">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Description</label>
                                            <textarea rows="3" name="description"
                                                placeholder="Enter product Description"
                                                class="form-control my-2"><?= $old_data['description']?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="band">Band</label>
                                                <?php 
                                                            if($old_data['band'] == "Metal")
                                                            {
                                                                
                                                        ?>
                                                <select name="band" class="form-control my-2">
                                                    <option>Metal</option>
                                                    <option>Leather</option>
                                                    <option>Rubber</option>
                                                </select>
                                                <?php 
                                                            }
                                                            else if($old_data['band'] == "Leather")
                                                            {
                                                                ?>
                                                <select name="band" class="form-control my-2">
                                                    <option>Leather</option>
                                                    <option>Metal</option>
                                                    <option>Rubber</option>
                                                </select>
                                                <?php 
                                                            }
                                                            elseif($old_data['band'] == "Rubber")
                                                            {
                                                                ?>
                                                <select name="band" class="form-control my-2">
                                                    <option>Rubber</option>
                                                    <option>Metal</option>
                                                    <option>Leather</option>
                                                </select>
                                                <?php 
                                                            }
                                                        ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="type">Display Type</label>
                                                <?php 
                                                            if($old_data['type'] == "Analog")
                                                            {
                                                                
                                                        ?>
                                                <select name="type" class="form-control my-2">
                                                    <option>Analog</option>
                                                    <option>Digital</option>
                                                </select>
                                                <?php 
                                                            }
                                                            else if($old_data['type'] == "Digital")
                                                            {
                                                                ?>
                                                <select name="type" class="form-control my-2">
                                                    <option>Digital</option>
                                                    <option>Analog</option>
                                                </select>
                                                <?php 
                                                            }
                                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Current image:</label>
                                            <img src="images/<?= $old_data['image']?>" width="60px" height = "100px" alt="image"><br>
                                            <label for="">Upload Image</label>
                                            <input type="hidden" name="old-image" value="<?= $old_data['image']?>">
                                            <input type="file" name="image" class="form-control my-2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Original Price</label>
                                            <input type="text"value="<?= $old_data['original_price']?>" name="original-price" placeholder="Enter Original Price"
                                                class="form-control my-2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Selling Price</label>
                                            <input type="text" value="<?= $old_data['selling_price']?>"name="selling-price" placeholder="Enter Selling Price"
                                                class="form-control my-2">
                                        </div>
                                        <div class="col-md-6 py-3">
                                            <?php
                                                if($old_data['available'] == '0')
                                                {
                                            ?>
                                            <input type="checkbox" name="available">
                                            <?php
                                                }
                                                else{
                                                    ?>
                                                    <input type="checkbox" name="available" checked>
                                                    <?php
                                                }
                                                ?>
                                            <label class="px-2">Available</label>
                                            <br>
                                            <?php
                                                if($old_data['trending'] == '0')
                                                {
                                            ?>
                                            <input type="checkbox" name="trending">
                                            <?php
                                                }
                                                else{
                                                    ?>
                                                    <input type="checkbox" name="trending" checked>
                                                    <?php
                                                }
                                                ?>
                                            <label class="px-2">Trending</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="type">Gender type</label>
                                                <?php 
                                                            if($old_data['gender'] == "Men")
                                                            {
                                                                
                                                        ?>
                                                <select name="gender" class="form-control my-2">
                                                    <option>Men</option>
                                                    <option>Ladies</option>
                                                </select>
                                                <?php 
                                                            }
                                                            else if($old_data['gender'] == "Ladies")
                                                            {
                                                                ?>
                                                <select name="gender" class="form-control my-2">
                                                    <option>Ladies</option>
                                                    <option>Men</option>
                                                </select>
                                                <?php 
                                                            }
                                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success mt-3 shadow"
                                                    name="edit-product">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                            }
                            else{
                                echo "id not found";
                            }
                        }
                        else
                        {
                            echo "no id in url!";
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    include('footer.php');
?>