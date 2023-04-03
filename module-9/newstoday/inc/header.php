<?php
$db = mysqli_connect("localhost", "root", "", "newstoday");

?>
<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="images/custom/logo.png" class=" img-fluid" alt="">
                <!-- <p>NEWS <span> today</span></p> -->
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">


                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>

                </ul>
                <form class="form-inline" action="search.php" method="GET">
                    <input class="form-control mr-sm-2" type="text" placeholder="How may I help?" name="s_text">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="searchbtn">Search</button>
                </form>
            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->