<div class="modal-dialog">
    <div class="modal fade" id="PopUp_register" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ttl-customers"> Cliente </h5>
                    <h5 class="modal-title" id="ttl-providers"> Fornecedores </h5>
                    <h5 class="modal-title" id="ttl-products"> Produtos </h5>
                    <h5 class="modal-title" id="ttl-employees"> Funcionarios</h5>
                    <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
    
                <div class="modal-body">

                    <div class="row" id="contentRegisterCust">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formCustomers" action="../../control/customers_registration.php" method="POST">
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="Nome do cliente" id="nameCustomers" name="nameCustomers" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="CPF" id="cpfCustomers"  name="cpfCustomers" maxlength="14" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="email" placeholder="Email" id="emailCustomers"  name="emailCustomers" maxlength="40">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="tel" placeholder="Telefone" id="tellCustomers"  name="tellCustomers" maxlength="15">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="rua" placeholder="Rua" id="ruaCustomers"  name="ruaCustomers" maxlength="45">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="bairro" placeholder="Bairro" id="bairroCustomers"  name="bairroCustomers" maxlength="45">
                                </div>
                                
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="cidade" placeholder="Cidade" id="cidadeCustomers"  name="cidadeCustomers" maxlength="30">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="estado" placeholder="Estado" id="estadoCustomers"  name="estadoCustomers" maxlength="30">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="cep" placeholder="Cep" id="cepCustomers"  name="cepCustomers" maxlength="9">
                                </div>
                                
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="comple" placeholder="Complemento" id="compleCustomers"  name="compleCustomers" maxlength="11">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="num" placeholder="Numéro" id="numCustomers"  name="numCustomers" maxlength="11">
                                </div>

                                <div class="col-8 col-sm-5 col-lg-5 mt-4 mb-2 center">
                                    <input class="btn btn-primary w-100" form="formCustomers" type="submit" name="submitCustomers" value="Cadastrar Cliente">
                                </div>
                                
                            </form>
                        </div>
                    </div>

                    <div class="row" id="contentRegisterProv">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formProviders" action="../../control/providers_registration.php" method="POST">
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="Nome do fornecedor" id="nameProviders" name="nameProviders" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="CNPJ" id="cnpjProviders"  name="cnpjProviders" maxlength="18" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="email" placeholder="Email" id="emailProviders"  name="emailProviders" maxlength="40">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="tel" placeholder="Telefone" id="tellProviders"  name="tellProviders" maxlength="15">
                                </div>

                                <div class="col-8 col-sm-5 col-lg-5 mt-4 mb-2 center">
                                    <input class="btn btn-primary w-100" form="formProviders" type="submit" name="submitProviders" value="Cadastrar Fornecedor">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row" id="contentRegisterProd">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formProd" action="../../control/products_registration.php" method="POST">
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <div class="row center">
                                        <label class="col-12 col-sm-10 col-md-11 col-lg-8 selectFileImgProduct center" for="imgProduct">
                                            <i class="fa-solid fa-file-image fa-4x" id="imgSelect"></i>
                                            <img src="" id="imgSelected" alt="image selected" style="display: none;">
                                        </label>
                                    </div>
                                    <input class=" form-control input-user" type="file" accept="image/*" id="imgProduct" name="imgProduct" style="display: none;">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="Nome" id="nameProduct" name="nameProduct" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="Preço" id="priceProduct"  name="priceProduct" maxlength="14" autocomplete="off">
                                </div>

                                <div class="row mt-3 center">
                                    <div class="col-12 center">
                                        <label class="text-center">Selecione os tamanhos e sua quantidade</label>
                                    </div>

                                    <div class="col-12">
                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize34" value="34">
                                                    <label class="form-check-label" for="checkSize34">34</label>
                                                    <input class=" form-control input-user" type="number" placeholder="quantidade" id="amountProduct34"  name="amountProdSize34" readonly
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize35" value="35">
                                                    <label class="form-check-label" for="checkSize35">35</label>
                                                    <input class=" form-control input-user" type="number" placeholder="quantidade" id="amountProduct35"  name="amountProdSize35" readonly
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize36" value="36">
                                                    <label class="form-check-label" for="checkSize36">36</label>
                                                    <input class=" form-control input-user" type="number" placeholder="quantidade" id="amountProduct36"  name="amountProdSize36" readonly
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize37" value="37">
                                                    <label class="form-check-label" for="checkSize37">37</label>
                                                    <input class=" form-control input-user" type="number" placeholder="quantidade" id="amountProduct37"  name="amountProdSize37" readonly
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize38" value="38">
                                                    <label class="form-check-label" for="checkSize38">38</label>
                                                    <input class=" form-control input-user" type="number" placeholder="quantidade" id="amountProduct38"  name="amountProdSize38" readonly
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize39" value="39">
                                                    <label class="form-check-label" for="checkSize39">39</label>
                                                    <input class=" form-control input-user" type="number" placeholder="quantidade" id="amountProduct39"  name="amountProdSize39" readonly
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize40" value="40">
                                                    <label class="form-check-label" for="checkSize40">40</label>
                                                    <input class=" form-control input-user" type="number" placeholder="quantidade" id="amountProduct40"  name="amountProdSize40" readonly
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize41" value="41">
                                                    <label class="form-check-label" for="checkSize41">41</label>
                                                    <input class=" form-control input-user" type="number" placeholder="quantidade" id="amountProduct41"  name="amountProdSize41" readonly
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize42" value="42">
                                                    <label class="form-check-label" for="checkSize42">42</label>
                                                    <input class=" form-control input-user" type="number" placeholder="quantidade" id="amountProduct42"  name="amountProdSize42" readonly
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize43" value="43">
                                                    <label class="form-check-label" for="checkSize43">43</label>
                                                    <input class=" form-control input-user" type="number" placeholder="quantidade" id="amountProduct43"  name="amountProdSize43" readonly
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-8 col-sm-5 col-lg-5 mt-4 mb-2 center">
                                    <input class="btn btn-primary w-100" form="formProd" type="submit" name="submitProduct" value="Cadastrar Produto">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row" id="contentRegisterEploy">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formEmployees" action="../../control/employees_registration.php" method="POST">
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="Nome do Funcionario" id="nameEmployees" name="nameEmployees" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="CPF" id="cpfEmployees"  name="cpfEmployees" maxlength="14" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="email" placeholder="Email" id="emailEmployees"  name="emailEmployees" maxlength="40">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3">
                                    <input class=" form-control input-user" type="text" placeholder="Telefone" id="tellEmployees"  name="tellEmployees" maxlength="15">
                                </div>

                                <div class="col-8 col-sm-5 col-lg-5 mt-4 mb-2 center">
                                    <input class="btn btn-primary w-100" form="formEmployees" type="submit" name="submitEmployees" value="Cadastrar Fornecedor">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>