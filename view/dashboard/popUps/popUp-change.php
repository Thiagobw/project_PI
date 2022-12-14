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

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="changeNameCustomers">Nome do cliente</label>
                                    <input class=" form-control input-user" type="text" placeholder="Digite o nome" id="changeNameCustomers" name="changeNameCustomers" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="changeCpfCustomers">CPF</label>
                                    <input class=" form-control input-user" type="text" placeholder="EX: 60038190060" id="changeCpfCustomers" name="changeCpfCustomers" maxlength="14" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="changeEmailCustomers">Email</label>
                                    <input class=" form-control input-user" type="email" placeholder="Digite o email" id="changeEmailCustomers" name="changeEmailCustomers" maxlength="40">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="changeTellCustomers">Telefone</label>
                                    <input class=" form-control input-user" type="tel" placeholder="EX: 48148996766" id="changeTellCustomers" name="changeTellCustomers" maxlength="15">
                                </div>

                                <div class="col-10 col-sm-6 col-lg-5 mt-4 mb-2 center p-0">
                                    <input class="btn btn-primary btn-block" form="formChangeCustomers" type="submit" name="submitChangeCustomers" value="Atualizar" style="font-size:larger;">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row" id="contentAlterProv">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formChangeProviders" action="../../control/providers_update.php" method="POST">
                            <input class=" form-control input-user" type="hidden" id="idProviderChange" name="idProviderChange">
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3 p-0">
                                    <label class="ml-1" for="changeNameProviders">Nome do fornecedor</label>
                                    <input class=" form-control input-user" type="text" placeholder="Digite o nome" id="changeNameProviders" name="changeNameProviders" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="changeCnpjProviders">CNPJ</label>
                                    <input class=" form-control input-user" type="text" placeholder="EX: 41608257000108" id="changeCnpjProviders"  name="changeCnpjProviders" maxlength="18" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="changeEmailProviders">Email</label>
                                    <input class=" form-control input-user" type="email" placeholder="Email" id="changeEmailProviders"  name="changeEmailProviders" maxlength="40">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="changeTellProviders">Telefone</label>
                                    <input class=" form-control input-user" type="tel" placeholder="EX: 48148996766" id="changeTellProviders"  name="changeTellProviders" maxlength="15">
                                </div>

                                <div class="col-10 col-sm-6 col-lg-5 mt-4 mb-2 center p-0">
                                    <input class="btn btn-primary btn-block" form="formChangeProviders" type="submit" name="submitChangeProviders" value="Atualizar" style="font-size: larger;">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row" id="contentAlterProd">
                        <div class="col-12 input-group">
                            <form enctype="multipart/form-data" class="input-group center" id="formChangeProd" action="../../control/products_update.php" method="POST">
                            <input type="hidden" id="idProductChange" name="idProductChange">
                            <input type="hidden" id="idImage" name="idImg">


                                <div class="col-11 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3 p-0">
                                    <div class="row center">
                                        <label class="text-center">Selecione uma foto</label>
                                    </div>
                                    <div class="row center">
                                        <label class="col-12 col-sm-10 col-md-11 col-lg-9 selectFileImgProduct center m-0 rounded" for="changeImgProduct">
                                            <i class="fa-solid fa-file-image fa-4x" id="changeImgSelect"></i>
                                            <img class="img-fluid w-100" src="" id="changeImgSelected" alt="image selected for change" style="display: none;">
                                        </label>
                                    </div>
                                    <input class=" form-control input-user" type="file" accept="image/*" id="changeImgProduct" name="changeImgProd" style="display: none;">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="changeNameProduct">Nome do Produto</label>
                                    <input class=" form-control input-user" type="text" placeholder="Digite o nome" id="changeNameProduct" name="changeNameProduct" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="changePriceProduct">Pre??o do produto</label>
                                    <input class=" form-control input-user" type="text" placeholder="EX: 800" id="changePriceProduct"  name="changePriceProduct" maxlength="14" autocomplete="off">
                                </div>

                                <div class="row mt-3">
                                    <div class="col-11 center">
                                        <label class="text-center">Selecione os tamanhos e sua quantidade</label>
                                    </div>

                                    <!-- sizes and quantities to update -->
                                    <div class="col-11 pl-4 pr-0">
                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="changeCheckSize34" name="changeCheckSize34" onclick="selectOptionChangeData('changeCheckSize34', 'changeAmountProdSize34', null)">
                                                    <label class="form-check-label" for="changeCheckSize34">34</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="changeAmountProdSize34"  name="changeAmountProdSize34" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="changeCheckSize35" name="changeCheckSize35" onclick="selectOptionChangeData('changeCheckSize35', 'changeAmountProdSize35', null)">
                                                    <label class="form-check-label" for="changeCheckSize35">35</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="changeAmountProdSize35"  name="changeAmountProdSize35" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="changeCheckSize36" name="changeCheckSize36" onclick="selectOptionChangeData('changeCheckSize36', 'changeAmountProdSize36', null)">
                                                    <label class="form-check-label" for="changeCheckSize36">36</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="changeAmountProdSize36"  name="changeAmountProdSize36" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="changeCheckSize37" name="changeCheckSize37" onclick="selectOptionChangeData('changeCheckSize37', 'changeAmountProdSize37', null)">
                                                    <label class="form-check-label" for="changeCheckSize37">37</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="changeAmountProdSize37"  name="changeAmountProdSize37" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="changeCheckSize38" name="changeCheckSize38" onclick="selectOptionChangeData('changeCheckSize38', 'changeAmountProdSize38', null)">
                                                    <label class="form-check-label" for="changeCheckSize38">38</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="changeAmountProdSize38"  name="changeAmountProdSize38" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="changeCheckSize39" name="changeCheckSize39" onclick="selectOptionChangeData('changeCheckSize39', 'changeAmountProdSize39', null)">
                                                    <label class="form-check-label" for="changeCheckSize39">39</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="changeAmountProdSize39"  name="changeAmountProdSize39" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="changeCheckSize40" name="changeCheckSize40" onclick="selectOptionChangeData('changeCheckSize40', 'changeAmountProdSize40', null)">
                                                    <label class="form-check-label" for="changeCheckSize40">40</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="changeAmountProdSize40"  name="changeAmountProdSize40" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="changeCheckSize41" name="changeCheckSize41" onclick="selectOptionChangeData('changeCheckSize41', 'changeAmountProdSize41', null)">
                                                    <label class="form-check-label" for="changeCheckSize41">41</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="changeAmountProdSize41"  name="changeAmountProdSize41" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="changeCheckSize42" name="changeCheckSize42" onclick="selectOptionChangeData('changeCheckSize42', 'changeAmountProdSize42', null)">
                                                    <label class="form-check-label" for="changeCheckSize42">42</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="changeAmountProdSize42"  name="changeAmountProdSize42" value="0" readonly
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="changeCheckSize43" name="changeCheckSize43" onclick="selectOptionChangeData('changeCheckSize43', 'changeAmountProdSize43', null)">
                                                    <label class="form-check-label" for="changeCheckSize43">43</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="changeAmountProdSize43"  name="changeAmountProdSize43" value="0" readonly 
                                                    style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-10 col-sm-6 col-lg-5 mt-4 mb-2 center p-0">
                                    <input class="btn btn-primary btn-block" form="formChangeProd" type="submit" name="submitChangeProduct" value="Atualizar" id="inputSubmitProduct" style="font-size: larger;">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row" id="contentAlterEploy">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formChangeEmployees" action="../../control/employees_update.php" method="POST">
                            <input class=" form-control input-user" type="hidden" id="idEmployeesChange" name="idEmployeesChange">

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3 p-0">
                                    <label class="ml-1" for="changeNameEmployees">Nome do funcionario</label>
                                    <input class=" form-control input-user" type="text" placeholder="Digite o nome" id="changeNameEmployees" name="changeNameEmployees" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="changeCpfEmployees">CPF</label>
                                    <input class=" form-control input-user" type="text" placeholder="EX: 60038190060" id="changeCpfEmployees"  name="changeCpfEmployees" maxlength="14" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="changeEmailEmployees">Email</label>
                                    <input class=" form-control input-user" type="email" placeholder="Digite o email" id="changeEmailEmployees"  name="changeEmailEmployees" maxlength="40">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="changeTellEmployees">Telefone</label>
                                    <input class=" form-control input-user" type="text" placeholder="EX: 48148996766" id="changeTellEmployees"  name="changeTellEmployees" maxlength="15">
                                </div>

                                <div class="col-10 col-sm-6 col-lg-5 mt-4 mb-2 center p-0">
                                    <input class="btn btn-primary btn-block" form="formChangeEmployees" type="submit" name="submitChangeEmployees" value="Atualizar" style="font-size: larger;">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>