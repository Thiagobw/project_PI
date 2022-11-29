<?php
include_once '../DAO/cartBd.php';
include_once '../DAO/productsBd.php';
include_once '../DAO/employeesBd.php';
include_once '../DAO/customersBd.php';
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
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : seeCartItems($user['id_usuario']);
$customers = search_customers();
$employees = search_employee();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <!--link rel="stylesheet" href="css/styleHomePage.css" -->
  <link rel="stylesheet" href="img/icons/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <title>Checkout - LA Imports</title>
</head>

<body>

  <header>
    <?php
    include "../view/navbar/navbarHomePage.php";
    ?>
  </header>

  <section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">

              <div class="row">
                <div class="col-lg-7">
                    <a href="/project_PI/view/salePage.php" class="btn btn-dark">
                      <i class="fas fa-long-arrow-alt-left me-2"></i> Adicionar mais produtos
                    </a>
                    <hr>
                </div>
                <div class="col-lg-5">
                  <form action="/project_PI/control/control_checkout.php" method="POST">
                    <div class="card bg-primary text-white rounded-3">
                      <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                          <h5 class="mb-0">Informações da Venda</h5>
                        </div>
                        <hr class="my-4">
                        
                        <form action="/project_PI/control/control_checkout.php" method="GET" class="mt-4">
                          <p class="small mb-2">Forma de Pagamento</p>
                          <div class="row">
                            <div class="col-12 col-md-6">
                              <label for="card">
                                <input type="radio" name="method"<?php if(isset($_SESSION['method_selected']) && $_SESSION['method_selected'] == 'card'){?> checked <?php } ?> value="card">
                                 Cartão
                              </label>
                            </div>

                            <div class="col-12 col-md-6">
                              <label for="boleto">
                                <input type="radio" name="method" <?php if(isset($_SESSION['method_selected']) && $_SESSION['method_selected'] == 'boleto'){?> checked <?php } ?> value="boleto">
                                 Boleto
                              </label>
                            </div>

                            <div class="col-12 col-md-6">
                              <label for="tB">
                                <input type="radio" name="method" <?php if(isset($_SESSION['method_selected']) && $_SESSION['method_selected'] == 'tB'){?> checked <?php } ?> value="tB">
                                 Transf. Bancária
                              </label>
                            </div>

                            <div class="col-md-6">
                              <label for="money">
                                <input type="radio" name="method" <?php if(isset($_SESSION['method_selected']) && $_SESSION['method_selected'] == 'money'){?> checked <?php } ?> value="money">
                                 Dinheiro
                              </label>
                            </div>

                            <div class="col-md-6">
                              <label for="pix">
                                <input type="radio" name="method" <?php if(isset($_SESSION['method_selected']) && $_SESSION['method_selected'] == 'pix'){?> checked <?php } ?> value="pix">
                                 Pix
                              </label>
                            </div>
                          </div>
                          
                          <button type="submit">Escolher</button>
                        </form>
                      
                        <!-- here grab subtotal to send valor_pedido -->
                        <input min="<?php echo $_SESSION['checkout_subtotal']; ?>" max="<?php echo $_SESSION['checkout_subtotal']; ?>" type="number" hidden name="subtotal" value="<?php echo $_SESSION['checkout_subtotal']; ?>">

                        <!-- shipping details, his can get old values by session too --> 
                        <div class="row mb-4">
                          <div class="col-12 mt-2">
                            <div class="form-group">
                              <select class="form-control" name="employe">
                                <option selected>Vendedor</option>
                                <?php foreach ($employees as $employe) { ?>
                                  <option value="<?php echo $employe->getId(); ?>">
                                  <?php echo $employe->getName(); ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>

                          <div class="col-12 mt-1">
                            <div class="form-group">
                              <select class="form-control" name="customer">
                                <option selected>Comprador</option>
                                  <?php foreach ($customers as $customer) { ?>
                                    <option value="<?php echo $customer->getId(); ?>">
                                    <?php echo $customer->getName(); ?>
                                    </option>
                                  <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <hr class="my-4">
                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Subtotal</p>
                          <p class="mb-2">R$ <?php echo $_SESSION['checkout_subtotal'].",00" ?></p>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                          <p class="mb-2">Total</p>
                          <p class="mb-2">R$ <?php echo $_SESSION['checkout_subtotal'].",00" ?></p>
                        </div>
                        <!-- prevents you get here without items on cart! -->
                        <?php if (isset($_SESSION['method_selected']) and null !== $_SESSION['method_selected']) { ?>
                          <button type="submit" name="makeOrder" class="btn btn-info btn-block btn-lg">
                            <div class="d-flex justify-content-between">
                              <span>R$<?php echo $_SESSION['checkout_subtotal'] ?></span>
                              <span>Checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                            </div>
                          </button>
                        <?php } ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
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
  $('#cep').mask('00000-000');
</script>

</html>