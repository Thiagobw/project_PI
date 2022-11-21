<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand, logo -->

            <a class="navbar-brand logo" href="#">
                <img class="img-fluid ml-2" src="../view/img/img_logo.png" height="90" width="90" alt=""/>
            </a>
            <!-- button responsive -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavDarkDropdown">

                <!-- Left space -->
                <div></div>
                <!-- Left space -->

                <!-- Search form -->
                <form class="d-flex input-group w-auto search">
                    <input type="search" class="form-control w-auto h-auto" placeholder="Pesquisar" aria-label="Search"/>
                    <button class="btn" type="button" data-mdb-ripple-color="dark">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <!-- cart of selected products -->
                <div class=" navbar-nav mb-2 mb-lg-0 mr-3">
                    <li class="nav-item mr-1">
                        <a class="btn btn-danger nav-link cart" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Carrinho

                        <!-- quantity of selected products -->
                        <!-- Note! if you don't have any, don't show badge(span tag) -->
                        <span class="badge text-bg-secondary bg-light text-dark"> 4 </span>
                        </a>
                    </li>

                    <h6 class="userName">
                        <i class="fa-regular fa-user" style="color: black !important;"></i> <?php echo $shortName; ?>
                    </h6>
                </div>
            </div>
            <!-- Collapsible wrapper-->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->