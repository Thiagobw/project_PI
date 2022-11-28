<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="./" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Dashboard</h3>
        </a>
        <div class="navbar-nav w-100">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle active mb-1" data-bs-toggle="dropdown" id="accDropDown">
                    <div class="d-flex align-items-center ms-1 mb-1 mt-1" style="align-items: center;">
                        <div class="position-relative">
                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="bg-success rounded-circle" id="icon-online"></div>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 name-user"><?php echo $shortName; ?></h6>
                            <span>Admin</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="profile.php" class="dropdown-item">Perfil</a>
                    <a href="../../control/sair.php" class="dropdown-item">Sair</a>
                </div>
            </div>
            <a href="index.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i> Painel</a>
            <a href="productsPage.php" class="nav-item nav-link"><i class="fa-solid fa-gift"></i> Produtos</a>
            <a href="providersPage.php" class="nav-item nav-link"><i class="fa-solid fa-handshake-simple"></i> Fornecedores</a>
            <a href="employeesPage.php" class="nav-item nav-link"><i class="fa-solid fa-users"></i> Funcionarios</a>
            <a href="customersPage.php" class="nav-item nav-link"><i class="fa-solid fa-users"></i> Clientes</a>
            <a href="salesPage.php" class="nav-item nav-link"><i class="fa-solid fa-users"></i> Vendas</a>
            <a href="../salePage.php" class="nav-item nav-link"><i class="fa-solid fa-bag-shopping"></i> Realizar venda</a>
        </div>
    </nav>
</div>