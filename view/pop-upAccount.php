<div id="pop-upAccount" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title" id="title-account">Entre em sua conta</h2>
                <h2 class="modal-title" id="title-createAcc">Crie a sua conta</h2>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                    </svg>
                </button>
            </div>

            <!-- log in form -->
            <div class="modal-body">
                <div class="row" id="account">
                    <div class="col-12 input-group">
                        <form class="input-group center" id="form1" action="/project_PI/control/autenticacao.php"  method="post">
                            <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8">
                                <label for="Email"><i class="fa-regular fa-address-card"></i></label>
                                <input class=" form-control input-user" type="text" placeholder="CPF" id="CpfLog"  name="CpfLog" maxlength="14" autocomplete="off">
                            </div>
                            <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                <label for="Senha"><i class="bi bi-key"></i></label>
                                <input class="form-control input-user" type="password" placeholder="Senha" id="passLog"  name="passLog">
                            </div>
                            <div class="col-5 col-sm-5 col-lg-5 mt-3 center">
                                <input class="btn btn-primary w-100 btn-log" form="form1" type="submit" name="log-in" value="Entrar">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- registration form -->
                <div class="row" id="createAcc">
                    <div class="col-12 input-group">
                        <form class="input-group center" id="form2">

                            <div class="col-12 col-sm-7 col-lg-8">
                                <label for="Nome"><i class="fa-regular fa-user"></i></label>
                                <input class=" form-control input-user" type="text" placeholder="Nome" name="name" id="name">
                            </div>

                            <div class="col-12 col-sm-7 col-lg-8 mt-3">
                                <label for="CPF"><i class="fa-regular fa-address-card"></i></label>
                                <input class=" form-control input-user" type="text" placeholder="CPF" name="cpf" id="cpf" maxlength="14" autocomplete="off">
                            </div>

                            <div class="col-12 col-sm-7 col-lg-8 mt-3">
                                <label for="Telefone"><i class="bi bi-telephone"></i></label>
                                <input class=" form-control input-user" type="text" placeholder="Telefone" name="tell" id="tell" maxlength="15">
                            </div>

                            <div class="col-12 col-sm-7 col-lg-8 mt-3">
                                <label for="Email"><i class="fa-regular fa-envelope"></i></label>
                                <input class=" form-control input-user" type="text" placeholder="Email" name="email" id="email">
                            </div>

                            <div class="col-12 col-sm-7 col-lg-8 mt-3">
                                <label for="Senha"><i class="bi bi-key"></i></label>
                                <input class="form-control input-user" type="password" placeholder="Senha" name="password" id="pass">
                            </div>
                            <div class="col-8 col-lg-5 mt-3 center">
                                <input class="btn btn-primary w-75 btn-log" form="form2" type="submit" name="" value="Criar conta">
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