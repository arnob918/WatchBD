<?php
session_start();

    if(isset($_SESSION['logged_in']))
    {
        $_SESSION['message'] = "Already logged in!";
        header('Location: index.php');
        exit();
    }
    include('header.php');
?>

<head>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-bg-gradient py-3">
        <span>
            <a class="navbar-brand text-light mx-2 font-rubik" href="index.php">WatchBD</a>
            <a class="navbar-brand text-light font-rubik" href="#">/ Login</a>
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item px-4">
                    <a class="nav-link navbar-text-color" href="#"><i class="fas fa-bullhorn blink_me"></i>&nbsp
                        Trending</a>
                </li>
                <li class="nav-item px-4">
                    <a class="nav-link navbar-text-color" href="register.php"><i class="fa-solid fa-plus"></i>&nbsp
                        Register</a>
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
        <main class="py-5">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <?php include('alertmessage.php'); ?>
                        <div class="card">
                            <div class="card-header navbar-bg-gradient navbar-text-color">
                                <h4 class="px-3 py-1">Login Form</h4>
                            </div>
                            <div class="card-body bg-light">
                                <form action="codes/code.php" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Your email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Your Password">
                                    </div>
                                    <div class="justify-content-center">
                                        <button type="submit" name="login_btn"
                                            class="btn btn-primary navbar-bg-gradient ">Login</button>
                                    </div>
                                </form>
                            </div>
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