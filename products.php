<?php
    include('checkadmin.php');
    include('header.php');
    include('functions.php');
?>

<head>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-bg-gradient py-3">
        <span>
            <a class="navbar-brand text-light mx-2 font-rubik" href="index.php">WatchBD</a>
            <a class="navbar-brand text-light font-rubik" href=""> / Admin</a>
            <a class="navbar-brand text-light font-rubik" href=""> / All Products</a>
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
            <a class="active" href="products.php">All Products</a>
            <a href="add-product.php">Add Products</a>
            <a href="placed-orders.php">Placed Orders</a>
        </div> 
        <div class="content">
            <div class="container py-5">
            <?php include('alertmessage.php');?>
                <div class="card">
                    <div class="card-header navbar-bg-gradient">
                        <h3 class="text-center navbar-text-color">All Products</h3>
                        <hr>
                    </div>
                    <div class="card-body table-responsive-sm">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Availability</th>
                                    <th>Trending</th>
                                    <th>Ops</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $products = getAll("products");
                                    if(mysqli_num_rows($products) > 0){
                                        
                                        foreach($products as $item)
                                        {
                                            ?>
                                                <tr>
                                                    <td> <?= $item['id'] ?> </td>
                                                    <td> <?= $item['name'] ?> </td>
                                                    <td> 
                                                        <img src="images/<?= $item['image']?>" width="60px" height="100px" alt="<?= $item['name'] ?>"> 
                                                    </td>
                                                    <td> 
                                                        <?= $item['available'] == '0' ? "Hidden" : "Visible" ?>    
                                                    </td>
                                                    <td>
                                                        <?= $item['trending'] == '0' ? "Not Trending" : "Trending" ?> 
                                                    </td>
                                                    <td>
                                                        <a href="edit-product.php?id=<?= $item['id'] ?>" class="btn btn-success">Edit</a>
                                                        <button type="button" class="btn btn-danger delete-product-btn" value="<?= $item['id'] ?>">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php
                                        }

                                    }
                                    else{
                                        echo "no records found";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<div>
    <div class="modal" id="delete-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Delete Product</h5>
        </div>
        <form action="codes/code.php" method="post">
            <div class="modal-body">
                <input type="hidden" name="delete-id" id="delete-id">
                <p>If you delete you will not be able to recover</p>
            </div>
            <div class="modal-footer">
                <button type="submit" name = "delete-product-btn" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
            </div>
            </div>
        </form>
    </div>
    </div>
</div>


<?php
    include('footer.php');
?>