<?php
include_once '../DAO/cartBd.php';
include_once '../DAO/productsBd.php';
session_start();
function checkAuth()
{
  if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
    return true;
  } else {
    return false;
  }
}
if (checkAuth()) {
  $user = $_SESSION['usuario'];
  $userName = $user['nome'];
  $shortNameArray = explode(' ', $userName, -1);
  if (count($shortNameArray) <= 0) {
    $shortName =  $userName;
  } else {
    $shortName = $shortNameArray[0];
  }
}
$sizes = seeSizeAvaliable($_SESSION['product_id']);
$prod = getProduct($_SESSION['product_id']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/styleHomePage.css">
  <!-- <link rel="stylesheet" href="css/styleSelected.css"> -->
  <link rel="stylesheet" href="img/icons/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <title>Escolha os Tamanhos - LA Imports</title>
</head>

<body>

  <header>
    <?php
    include "../view/navbar/navbarHomePage.php";
    include "../view/pop-upAccount.php";
    ?>
  </header>
  <section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">

              <div class="row">
                <form class="col-12 cart-body" id="productSelected" method="POST" action="/project_PI/control/control_cart.php">
                  <!-- product product in cart -->
                  <div class="cart-item">
                    <!-- Product information -->
                    <div class="row cart-row">
                      <div class="col-12 col-sm-2 pic">
                        <span>
                          <!-- product image -->
                          <img class="img-fluid" src="img/products/tenis 1.jpg" alt="">
                        </span>
                      </div>
                      <!-- name product -->
                      <div class="col-12 col-sm-10 desc">
                        <h6><?php echo $prod->getName() //using object example
                            ?></h6>
                        <p>Selecione o tamanho</p>
                        <?php //echo var_dump($sizes) << debug 
                        ?>
                        <!-- available sizes -->
                        <?php foreach ($sizes as $size) {
                          if ($size['quantidade'] < $_SESSION['quantity']) //see out-of-stock
                          { ?>
                            <label class="col-3 mt-3">
                              <?php echo $size['tamanho']; ?>
                              <p class="small mr-2 invalid">
                                Sem estoque
                                Temos:<?php echo $size['quantidade'] ?>
                              </p>
                            </label>
                          <?php } else { ?>
                            <label class="col-3 mt-3">
                              <input type="checkbox" name="sizeSelected[]" value="<?php echo $size['tamanho'] //this to send correctly id by "auto_increment" id of database 
                                                                                  ?>">
                              <?php echo ':' . $size['tamanho']; ?>
                              <p class="small flex mr-1">
                                Em estoque:<?php echo $size['quantidade'] ?>
                              </p>
                            </label>
                          <?php } ?>
                        <?php
                        } ?>
                      </div>

                      <!-- price product selected -->
                      <div class="cart-row-cell amount">
                        <p text class="fa fa-text-big">R$ <span><?php echo $prod->getPrice() * $_SESSION['quantity']; ?> cada</span></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="row center">

                      <!-- button to cancel selection -->
                      <div class="col-12 col-sm-4 center mt-3 mb-1">
                        <a href="salePage.php" class="btn btn-danger">Cancelar</a>
                      </div>

                      <!-- button to confirm selection -->
                      <div class="col-12 col-sm-4 center mt-2 mb-1">
                        <input type="submit" class="btn btn-success" value="Confirmar">
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="js/pop-upDisplayControl.js"></script>
<script src="js/login-register.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="js/jquery.mask.min.js"></script>
<script>
  $('#exp').mask('00/0000');
</script>

</html>