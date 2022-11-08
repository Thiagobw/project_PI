<div class="modal-dialog">
    <div class="modal fade" id="PopUp_alter" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ttlCust"> Atualizar dados do Cliente </h5>
                    <h5 class="modal-title" id="ttlProv"> Atualizar dados do Fornecedores </h5>
                    <h5 class="modal-title" id="ttlProd"> Atualizar dados do Produtos </h5>
                    <h5 class="modal-title" id="ttlEmploy"> Atualizar dados do Funcionarios </h5>
                    <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
    
                <div class="modal-body">

                    <div class="row" id="contentAlterCust">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formChangeCustomers" action="../../control/customers_update.php" method="POST">
                            <input class=" form-control input-user" type="hidden" id="idCustomerChange" name="idCustomerChange">

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="Nome do cliente" id="changeNameCustomers" name="changeNameCustomers" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="CPF" id="changeCpfCustomers"  name="changeCpfCustomers" maxlength="14" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="email" placeholder="Email" id="changeEmailCustomers"  name="changeEmailCustomers" maxlength="40">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="tel" placeholder="Telefone" id="changeTellCustomers"  name="changeTellCustomers" maxlength="15">
                                </div>

                                <div class="col-8 col-sm-5 col-lg-5 mt-4 mb-2 center">
                                    <input class="btn btn-primary w-100" form="formChangeCustomers" type="submit" name="submitChangeCustomers" value="Atualizar">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row" id="contentAlterProv">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formChangeProviders" action="../../control/providers_update.php" method="POST">
                            <input class=" form-control input-user" type="hidden" id="idProviderChange" name="idProviderChange">
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="Nome do fornecedor" id="changeNameProviders" name="changeNameProviders" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="CNPJ" id="changeCnpjProviders"  name="changeCnpjProviders" maxlength="18" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="email" placeholder="Email" id="changeEmailProviders"  name="changeEmailProviders" maxlength="40">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="tel" placeholder="Telefone" id="changeTellProviders"  name="changeTellProviders" maxlength="15">
                                </div>

                                <div class="col-8 col-sm-5 col-lg-5 mt-4 mb-2 center">
                                    <input class="btn btn-primary w-100" form="formChangeProviders" type="submit" name="submitChangeProviders" value="Atualizar">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row" id="contentAlterProd">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formChangeProd" action="../../control/products_update.php" method="POST">
                            <input class=" form-control input-user" type="hidden" id="idProductChange" name="idProductChange">
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <div class="row center">
                                        <label class="col-12 col-sm-10 col-md-11 col-lg-8 selectFileImgProduct center" for="imgProduct">
                                            <i class="fa-solid fa-file-image fa-4x" id="imgSelect"></i>
                                            <img src="" id="imgSelected" alt="image selected" style="display: none;">
                                        </label>
                                    </div>
                                    <input class=" form-control input-user" type="file" accept="image/*" id="imgProduct" name="changeImgProduct" style="display: none;">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="Nome" id="changeNameProduct" name="changeNameProduct" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="Preço" id="changePriceProduct"  name="changePriceProduct" maxlength="14" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="number" placeholder="quantidade" id="changeAmountProviders"  name="changeAmountProviders"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                </div>

                                <div class="col-8 col-sm-5 col-lg-5 mt-4 mb-2 center">
                                    <input class="btn btn-primary w-100" form="formChangeProd" type="submit" name="submitChangeProduct" value="Atualizar">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row" id="contentAlterEploy">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formChangeEmployees" action="../../control/employees_update.php" method="POST">
                            <input class=" form-control input-user" type="hidden" id="idEmployeesChange" name="idEmployeesChange">
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="Nome do Funcionario" id="changeNameEmployees" name="changeNameEmployees" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="CPF" id="changeCpfEmployees"  name="changeCpfEmployees" maxlength="14" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="email" placeholder="Email" id="changeEmailEmployees"  name="changeEmailEmployees" maxlength="40">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="Telefone" id="changeTellEmployees"  name="changeTellEmployees" maxlength="15">
                                </div>

                                <div class="col-8 col-sm-5 col-lg-5 mt-4 mb-2 center">
                                    <input class="btn btn-primary w-100" form="formChangeEmployees" type="submit" name="submitChangeEmployees" value="Atualizar">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>