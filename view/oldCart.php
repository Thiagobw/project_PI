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
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : seeCartItems($user['id_usuario']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="img/icons/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <title>Cart & Checkout - LA Imports</title>
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
                      </i>Continue comprando</a>
                  </h5>
                  <hr>

                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                      <p class="mb-1">Shopping cart</p>
                      <?php if (!isset($cart) || $cart == 0){ ?>
                        <p class="alert alert-danger mb-0">
                          Voce não tem coisas no carrinho
                        </p>
                      <?php }else{ ?>
                      <p class="mb-0">Voce tem <?php echo count($cart);?> items no seu carrinho</p>
                      <?php } ?>
                    </div>
                    <div>
                      <p class="mb-0"><span class="text-muted">Sort by:</span>
                        <a href="#!" class="text-body">price
                          <i class="fas fa-angle-down mt-1"></i>
                        </a>
                      </p>
                    </div>
                  </div>
                  <?php if (empty($cart)) {
                  ?><div class="alert alert-danger" role="alert">
                      Opa, não está esquecendo algo?<p>
                        Voce ainda não tem nenhum produto no carrinho!
                        <a href="/project_PI/view/salePage.php" class="alert-link">Voltar para Página Inicial</a>
                      </p>
                    </div>
                    <?php } else { ?>
                      <form action="/project_PI/control/control_cart.php" method="POST">
                        <?php
                        foreach ($cart as $item) {
                        ?>
                          <div class="card mb-4">
                            <div class="card-body">
                              <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                  <div>
                                    <img src="./img/products/yezzyzebra.png" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                  </div>
                                  <div class="ms-3">
                                    <h5><?php $name = find_products_names($item->getProdutosId()); 
                                    echo $name['nome_produto'];?></h5>
                                    <p class="small mb-0">Tamanho: <?php echo $item->getTamanho();?></p>
                                  </div>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                  <div style="width: 50px;">
                                    <h5 class="fw-normal mb-0"><?php echo $item->getQuantidade();?></h5>
                                  </div>
                                  <div style="width: 80px;">
                                    <h5 class="mb-0">R$<?php echo $item->getValor();?></h5>
                                  </div>
                                  <a style="color: #cecece;">
                                    <button value="<?php echo $item->getId();?>" name="removeItem" class="btn btn-secondary fas fa-trash-alt"></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      </form>
                  <?php } ?>

                </div>
                <div class="col-lg-5">

                  <div class="card bg-primary text-white rounded-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Informações do Cartão</h5>
                        <img src="./dashboard/img/user.jpg" class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                      </div>

                      <p class="small mb-2">Tipo do Cartão</p>
                      <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-visa fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-amex fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                      <form class="mt-4">
                        <div class="form-outline form-white mb-4">
                          <input type="text" id="typeName" class="form-control form-control-lg" siez="17" placeholder="Cardholder's Name" />
                          <label class="form-label" for="typeName">Nome no Cartão</label>
                        </div>

                        <div class="form-outline form-white mb-4">
                          <input type="text" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                          <label class="form-label" for="typeText">Numero do Cartão</label>
                        </div>

                        <div class="row mb-4">
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                              <label class="form-label" for="typeExp">Data</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="password" id="typeText" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                              <label class="form-label" for="typeText">Cvv</label>
                            </div>
                          </div>
                        </div>

                      </form>

                      <hr class="my-4">

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Subtotal</p>
                        <p class="mb-2">$4798.00</p>
                      </div>

                      <div class="d-flex justify-content-between">
                        <p class="mb-2">Shipping</p>
                        <p class="mb-2">$20.00</p>
                      </div>

                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-2">Total(Incl. taxes)</p>
                        <p class="mb-2">$4818.00</p>
                      </div>

                      <button type="button" class="btn btn-info btn-block btn-lg">
                        <div class="d-flex justify-content-between">
                          <span>$4818.00</span>
                          <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        </div>
                      </button>

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

</html>