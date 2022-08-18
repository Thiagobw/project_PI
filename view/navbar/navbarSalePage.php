<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-lg">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand, logo -->

            <a class="navbar-brand ml-4" href="#">
              <img class="img-fluid" src="img/imgteste2.png" height="30" alt=""/>
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
                <form class="d-flex input-group w-auto pesquisa">
                    <input type="search" class="form-control w-auto h-auto" placeholder="Pesquisar" aria-label="Search"/>
                    <button class="btn" type="button" data-mdb-ripple-color="dark">
                        <img class="img-fluid" src="img/icons/search_Icon.png" alt="" height='22' width='22'>
                    </button>
                </form>

                <div class=" navbar-nav mb-2 mb-lg-0 mr-3">
                    <li class="nav-item mr-1">
                      <a class="nav-link cart" href="#">
                        <img class="img-fluid" src="img/icons/shopping_cart_FILL0_wght400_GRAD0_opsz40.svg" alt="" height='27' width='27'> Carrinho
                      </a>
                    </li>

                    <!-- Navbar dropdown -->

                    <div class="collapse navbar-collapse ml-1 mr-1" id="navbarNavDarkDropdown">
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle menu-cad" href="#" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img class="rounded-circle img-fluid" src="img/icons/person_FILL0_wght400_GRAD0_opsz40.png" height='27' width='27'> Entre ou Cadastre-se
                          </a>
                          
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalAccount">Entrar</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalCreateAccount">Cadastre-se</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>


                    <!-- menu of options -->
                    <button class="btn menu-options ml-1 mr-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                      <img class="img-fluid" src="img/icons/menu-Icon.svg" alt="" height='28' width='28'>
                    </button>
                </div>
            </div>
            <!-- Collapsible wrapper-->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->