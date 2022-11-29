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
                <div class="col-lg-7">
                  <h5 class="mb-3"><a href="/project_PI/view/salePage.php" class="text-body">
                      <i class="fas fa-long-arrow-alt-left me-2">
                      </i>Continuar Comprando!!</a>
                  </h5>
                  <hr>
                </div>
                <div class="col-lg-5">

                  <div class="card bg-primary text-white rounded-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Informações de Compra</h5>
                        <img src="./dashboard/img/user.jpg" class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                      </div>
                          <!-- old form to get already use method of user -->
                      <form action="/project_PI/control/control_checkout.php" method="GET" class="mt-4">
                        <p class="small mb-2">Forma de Pagamento</p>
                        <label for="card">Cartão</label>
                        <input type="radio" name="method" checked value="card">
                        <label for="boleto">Boleto</label>
                        <input type="radio" name="method" value="boleto">
                      <!-- </form> -->
                      
                        <!-- here grab subtotal to send valor_pedido -->
                        <input min="<?php echo $_SESSION['checkout_subtotal']; ?>" max="<?php echo $_SESSION['checkout_subtotal']; ?>" type="number" hidden name="subtotal" value="<?php echo $_SESSION['checkout_subtotal']; ?>">

                        <!-- shipping details, his can get old values by session too -->
                        <hr class="my-4">
                        <div class="form-outline form-white mb-4">
                          <input type="text" class="form-control" name="inputAddress" size="17"></input>
                          <label for="inputAddress" class="form-label">Endereço</label>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="text" class="form-control form-control-lg" placeholder="00000-000" name="address_cep" size="7" id="cep" minlength="9" maxlength="9" />
                              <label class="form-label" for="typeExp">Cep</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="text" id="address_number" class="form-control form-control-lg" placeholder="000" name="address_number" size="1" minlength="1" maxlength="10" />
                              <label class="form-label" for="typeText">Numero</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="text" id="address_complement" class="form-control form-control-lg" placeholder="Lt:65" name="address_complement" size="7" minlength="1" maxlength="10" />
                              <label class="form-label" for="typeText">Complemento</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <select name="employe" class="form-select">
                                <?php foreach ($employees as $employe) { ?>
                                  <option value="<?php echo $employe->getId(); ?>">
                                  <?php echo $employe->getName(); ?>
                                  </option>
                                <?php } ?>
                              </select>
                              <label class="form-label" for="typeText">Vendedor</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                            <select name="customer" class="form-select">
                                <?php foreach ($customers as $customer) { ?>
                                  <option value="<?php echo $customer->getId(); ?>">
                                  <?php echo $customer->getName(); ?>
                                  </option>
                                <?php } ?>
                              </select>
                              <label class="form-label" for="typeText">Comprador</label>
                            </div>
                          </div>
                        </div>
                        <hr class="my-4">
                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Subtotal</p>
                          <p class="mb-2">R$<?php echo $_SESSION['checkout_subtotal'] ?></p>
                        </div>

                        <!-- you can make! -->
                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Entrega(implementar!!)</p>
                          <p class="mb-2">R$20.00</p>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                          <p class="mb-2">Total(Incl. entrega)</p>
                          <p class="mb-2">R$<?php echo $_SESSION['checkout_subtotal'] ?></p>
                        </div>
                        <!-- prevents you get here without items on cart! -->
                          <button type="submit" name="makeOrder" class="btn btn-info btn-block btn-lg">
                            <div class="d-flex justify-content-between">
                              <span>R$<?php echo $_SESSION['checkout_subtotal'] ?></span>
                              <span>Checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                            </div>
                          </button>
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