<?php
include_once '../DAO/cartBd.php';
include_once '../DAO/productsBd.php';
include_once '../DAO/imagesBd.php';
@session_start();
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
$img = selectImage($prod->getImagemId()); //get the img object->name
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/styleHomePage.css">
  <link rel="stylesheet" href="img/icons/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <title>LA Imports - Escolher Tamanhos</title>
</head>

<style>
  .img-prod {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .text-prod h6 {
    font-size: larger;
    font-weight: 500;
  }
  .text-prod p {
    font-size: medium;
    font-weight: 300;
  }
  @media (min-width: 240px) and (max-width: 575px) {
    .text-prod {
      text-align: center;
    }
  }
  
</style>

<body class="bg-secondary">

  <header>
    <?php
    include "../view/navbar/navbarHomePage.php";
    ?>
  </header>

  <section class="container">
    <div class="row center">
      <div class="col-12 bg-white mt-5 rounded-bottom shadow-lg">

        <div class="card-body">
          
            <form class="col-12" id="productSelected" method="POST" action="/project_PI/control/control_cart.php">

              <!-- Product information -->
              <div class="row">
                <div class="col-12 col-sm-2 img-prod">
                    <!-- product image, his geting the name of file intended on uploads folder -->
                    <img class="img-fluid shadow rounded" src="../uploads/<?php echo $img->getName() ?>" alt="">
                </div>

                <!-- name and price product -->
                <div class="col-12 col-sm-8 text-prod">
                  <h6 class="mt-3"> <?php echo $prod->getName();?> </h6>
                  <p class="mt-2">R$ <?php echo $prod->getPrice() * $_SESSION['quantity'].',00'; ?> cada unidade</p>
                </div>
                <!-- name and price product -->
              </div>
              <!-- Product information -->


              <div class="row mt-5">
                <div class="col-12 center">
                  <p>Selecione o tamanho desejado</p>
                </div>
                
                <!-- available sizes -->
                <div class="col-12">
                  <div class="row center">
                  <?php foreach ($sizes as $size) {
                    if ($size['quantidade'] < $_SESSION['quantity']) { //see out-of-stock
                    ?>
                    
                      <!-- message if no stock -->
                      <label class="col-11 col-sm-5 col-md-3 col-lg-3 col-xl-3 mt-2">
                        <div class="alert alert-danger" role="alert">
                          <?php echo $size['tamanho']; ?>
                          <p class="small">Sem estoque!</p>
                        </div>
                      </label>
                      <!-- message if no stock -->

                    <?php } else { ?>


                      <label class="col-11 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-2">
                      <div class="alert alert-success" role="alert">
                        <input type="checkbox" name="sizeSelected[]" value="<?php echo $size['tamanho'];?>"><!-- this to send correctly id by "auto_increment" id of database -->
                        <?php echo $size['tamanho']; ?>
                        <p class="small flex mr-1">
                          Em estoque:<?php echo $size['quantidade'] ?>
                        </p>
                      </div>
                      </label>
                    <?php } ?>
                  <?php
                  } ?>
                  </div>
                </div>
                <!-- price product selected -->
                <div class="cart-row-cell amount">
                  
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