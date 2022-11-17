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

                                <div class="row mt-3">
                                    <div class="col-12 center">
                                        <label class="text-center">Selecione os tamanhos e sua quantidade</label>
                                    </div>

                                    <div class="col-12">
                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize34" name="checkSize34" onclick="selectOption('checkSize34', 'amountProdSize34')">
                                                    <label class="form-check-label" for="checkSize34">34</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize34"  name="amountProdSize34" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize35" name="checkSize35" onclick="selectOption('checkSize35', 'amountProdSize35')">
                                                    <label class="form-check-label" for="checkSize35">35</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize35"  name="amountProdSize35" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize36" name="checkSize36" onclick="selectOption('checkSize36', 'amountProdSize36')">
                                                    <label class="form-check-label" for="checkSize36">36</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize36"  name="amountProdSize36" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize37" name="checkSize37" onclick="selectOption('checkSize37', 'amountProdSize37')">
                                                    <label class="form-check-label" for="checkSize37">37</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize37"  name="amountProdSize37" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize38" name="checkSize38" onclick="selectOption('checkSize38', 'amountProdSize38')">
                                                    <label class="form-check-label" for="checkSize38">38</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize38"  name="amountProdSize38" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize39" name="checkSize39" onclick="selectOption('checkSize39', 'amountProdSize39')">
                                                    <label class="form-check-label" for="checkSize39">39</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize39"  name="amountProdSize39" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize40" name="checkSize40" onclick="selectOption('checkSize40', 'amountProdSize40')">
                                                    <label class="form-check-label" for="checkSize40">40</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize40"  name="amountProdSize40" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize41" name="checkSize41" onclick="selectOption('checkSize41', 'amountProdSize41')">
                                                    <label class="form-check-label" for="checkSize41">41</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize41"  name="amountProdSize41" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize42" name="checkSize42" onclick="selectOption('checkSize42', 'amountProdSize42')">
                                                    <label class="form-check-label" for="checkSize42">42</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize42"  name="amountProdSize42" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize43" name="checkSize43" onclick="selectOption('checkSize43', 'changeAmountProdSize43')">
                                                    <label class="form-check-label" for="checkSize43">43</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize43"  name="changeAmountProdSize43" value="0" readonly 
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-7 mt-4 mb-2 center" style="padding: 0;">
                                    <input class="btn btn-primary" form="formChangeProd" type="submit" name="submitChangeProduct" value="Atualizar" id="inputSubmitProduct">
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