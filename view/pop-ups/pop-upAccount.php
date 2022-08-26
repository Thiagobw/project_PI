<div id="pop-upAccount" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title" id="title-account">Entre em sua conta</h2>
                <h2 class="modal-title" id="title-createAcc">Crie a sua conta</h2>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
</svg></button>
            </div>

            <div class="modal-body">
                <div class="row" id="account">
                    <div class="col-12 input-group">
                        <form class="input-group center" action="">
                            <div class="col-11 col-sm-7">
                                <label for="Email"><i class="far fa-envelope"></i></label>
                                <input class=" form-control input-user" type="text" placeholder="Email">
                            </div>
                            <div class="col-11 col-sm-7 mt-3">
                                <label for="Senha"><i class="bi bi-key"></i></label>
                                <input class="form-control input-user" type="text" placeholder="Senha">
                            </div>
                            <div class="col-6 mt-3 center">
                                <input class="btn w-80 btn-log" type="submit" name="" value="Entrar">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" id="createAcc">
                    <div class="col-12 input-group">
                        <form class="input-group center" action="" method="POST">
                            <div class="col-11 col-sm-7">
                                <label for="Nome"><i class="fa-regular fa-user"></i></label>
                                <input class=" form-control input-user" type="text" placeholder="Nome" name="name">
                            </div>

                            <div class="col-11 col-sm-7 mt-3">
                                <label for="CPF"><i class="fa-regular fa-address-card"></i></label>
                                <input class=" form-control input-user" type="text" placeholder="CPF" name="cpf">
                            </div>

                            <div class="col-11 col-sm-7 mt-3">
                                <label for="Telefone"><i class="bi bi-telephone"></i></label>
                                <input class=" form-control input-user" type="text" placeholder="Telefone" name="tell">
                            </div>

                            <div class="col-11 col-sm-7 mt-3">
                                <label for="Email"><i class="fa-regular fa-envelope"></i></label>
                                <input class=" form-control input-user" type="text" placeholder="Email" name="email">
                            </div>

                            <div class="col-11 col-sm-7 mt-3">
                                <label for="Senha"><i class="bi bi-key"></i></label>
                                <input class="form-control input-user" type="password" placeholder="Senha" name="password">
                            </div>
                            <div class="col-6 mt-3 center">
                                <input class="btn w-80 btn-log" type="submit" name="" value="Criar conta">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer center">
            <span id="toRegister"><p> Caso não tenha uma conta, cadastre-se clicando <a href="" id="btncreateAcc" data-bs-toggle="modal">aqui</a>.</p></span>
            </div>
        </div>
    </div>
</div>