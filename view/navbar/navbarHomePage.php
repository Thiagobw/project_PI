<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand, logo -->
    <a class="navbar-brand logo" href="#">
      <img class="img-fluid ml-2" src="../view/img/img_logo.png" height="90" width="90" alt=""/>
    </a>
    
    <!-- button responsive -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" 
    aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
    
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavDarkDropdown">
      
      <!-- Left space -->
      <div></div>
      <!-- Left space -->
      
      <div class=" navbar-nav mb-2 mb-lg-0 mr-3">
        <div class="collapse navbar-collapse ml-1 mr-1" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <?php 
              if(checkAuth()):
              ?>
              <a class="nav-link menu-cad" href="./dashboard">
                <i class="fa-regular fa-user"></i> <?php echo $shortName; ?>
              </a>
              <?php else: ?>
                <a class="nav-link dropdown-toggle menu-cad btn-dropdown-cad" href="#" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-user mr-2"></i>Entre ou Cadastre-se
                </a>              
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#pop-upAccount" id="btnLogin">Entrar</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#pop-upAccount" id="btnRegister">Cadastre-se</a></li>
                </ul>
              <?php endif; ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Collapsible wrapper-->
  </div>
  <!-- Container wrapper -->
</nav>
    <!-- Navbar -->