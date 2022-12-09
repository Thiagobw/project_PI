<?php 
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/providersBd.php";
$providers = search_provider();
?>
<div class="modal-dialog">
    <div class="modal fade" id="PopUp_register" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ttl-customers"> Cadastrar Cliente </h5>
                    <h5 class="modal-title" id="ttl-providers"> Cadastrar Fornecedor </h5>
                    <h5 class="modal-title" id="ttl-products"> Cadastrar Produto </h5>
                    <h5 class="modal-title" id="ttl-employees"> Cadastrar Funcionario </h5>
                    <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row" id="contentRegisterCust">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formCustomers" action="../../control/customers_registration.php" method="POST">
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3 p-0">
                                    <label class="ml-1" for="nameCustomers">Nome do cliente</label>
                                    <input class=" form-control input-user" type="text" placeholder="Digite o nome" id="nameCustomers" name="nameCustomers" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="cpfCustomers">CPF</label>
                                    <input class=" form-control input-user" type="text" placeholder="EX: 60038190060" id="cpfCustomers" name="cpfCustomers" maxlength="14" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="emailCustomers"></label>
                                    <input class=" form-control input-user" type="email" placeholder="Digite o email" id="emailCustomers" name="emailCustomers" maxlength="40">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="tellCustomers">Telefone</label>
                                    <input class=" form-control input-user" type="tel" placeholder="EX: 48148996766" id="tellCustomers" name="tellCustomers" maxlength="15">
                                </div>

                                <div class="col-10 col-sm-6 col-lg-5 mt-4 mb-2 center p-0">
                                    <input class="btn btn-primary btn-block" form="formCustomers" type="submit" name="submitCustomers" value="Cadastrar" style="font-size: larger;">
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="row" id="contentRegisterProv">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formProviders" action="../../control/providers_registration.php" method="POST">
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3 p-0">
                                    <label class="ml-1" for="nameProviders">Nome do fornecedor</label>
                                    <input class=" form-control input-user" type="text" placeholder="Digite o nome" id="nameProviders" name="nameProviders" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="cnpjProviders">CNPJ</label>
                                    <input class=" form-control input-user" type="text" placeholder="EX: 41608257000108" id="cnpjProviders" name="cnpjProviders" maxlength="18" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="emailProviders">Email</label>
                                    <input class=" form-control input-user" type="email" placeholder="Digite o email" id="emailProviders" name="emailProviders" maxlength="40">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-0" for="tellProviders">Telefone</label>
                                    <input class=" form-control input-user" type="tel" placeholder="EX: 48148996766" id="tellProviders" name="tellProviders" maxlength="15">
                                </div>

                                <div class="col-10 col-sm-6 col-lg-5 mt-4 mb-2 center p-0">
                                    <input class="btn btn-primary btn-block" form="formProviders" type="submit" name="submitProviders" value="Cadastrar" style="font-size: larger;">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row" id="contentRegisterProd">
                        <div class="col-12 input-group">
                            <form enctype="multipart/form-data" class="input-group center" id="formProd" action="../../control/products_registration.php" method="POST">

                                <!-- image for the product -->
                                <div class="col-11 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3 p-0">
                                    <div class="row center">
                                        <label class="text-center">Selecione uma foto</label>
                                    </div>
                                    <div class="row center">
                                        <label class="col-12 col-sm-10 col-md-11 col-lg-9 selectFileImgProduct center m-0 rounded" for="imgProduct">
                                            <i class="fa-solid fa-file-image fa-4x" id="imgSelect"></i>
                                            <img src="" id="imgSelected" alt="image selected" style="display: none;">
                                        </label>
                                    </div>
                                    <input class=" form-control input-user" type="file" accept="image/*" id="imgProduct" name="imgProduct" style="display: none;">
                                </div>
                                <!-- image for the product -->

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="nameProduct">Nome do produto</label>
                                    <input class=" form-control input-user" type="text" placeholder="Digite o nome" id="nameProduct" name="nameProduct" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                <label class="ml-1" for="priceProduct">Preço do produto</label>
                                    <input class=" form-control input-user" type="text" placeholder="EX: 800" id="priceProduct" name="priceProduct" maxlength="14" autocomplete="off">
                                </div>

                                <div class="row mt-3 center">
                                    <div class="col-12 center">
                                        <label class="text-center">Selecione os tamanhos e sua quantidade</label>
                                    </div>

                                    <div class="col-11 pl-4 pr-0">
                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize34" name="checkSize34" onclick="selectOption('checkSize34', 'amountProdSize34')">
                                                    <label class="form-check-label" for="checkSize34">34</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize34" name="amountProdSize34" value="0" readonly style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize35" name="checkSize35" onclick="selectOption('checkSize35', 'amountProdSize35')">
                                                    <label class="form-check-label" for="checkSize35">35</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize35" name="amountProdSize35" value="0" readonly style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize36" name="checkSize36" onclick="selectOption('checkSize36', 'amountProdSize36')">
                                                    <label class="form-check-label" for="checkSize36">36</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize36" name="amountProdSize36" value="0" readonly style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize37" name="checkSize37" onclick="selectOption('checkSize37', 'amountProdSize37')">
                                                    <label class="form-check-label" for="checkSize37">37</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize37" name="amountProdSize37" value="0" readonly style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize38" name="checkSize38" onclick="selectOption('checkSize38', 'amountProdSize38')">
                                                    <label class="form-check-label" for="checkSize38">38</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize38" name="amountProdSize38" value="0" readonly style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize39" name="checkSize39" onclick="selectOption('checkSize39', 'amountProdSize39')">
                                                    <label class="form-check-label" for="checkSize39">39</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize39" name="amountProdSize39" value="0" readonly style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize40" name="checkSize40" onclick="selectOption('checkSize40', 'amountProdSize40')">
                                                    <label class="form-check-label" for="checkSize40">40</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize40" name="amountProdSize40" value="0" readonly style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize41" name="checkSize41" onclick="selectOption('checkSize41', 'amountProdSize41')">
                                                    <label class="form-check-label" for="checkSize41">41</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize41" name="amountProdSize41" value="0" readonly style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row center">
                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize42" name="checkSize42" onclick="selectOption('checkSize42', 'amountProdSize42')">
                                                    <label class="form-check-label" for="checkSize42">42</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize42" name="amountProdSize42" value="0" readonly style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>

                                            <div class="col-8 col-sm-10 col-md-6 col-lg-4 col-xl-4 mt-3" id="contentInputSize">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkSize43" name="checkSize43" onclick="selectOption('checkSize43', 'amountProdSize43')">
                                                    <label class="form-check-label" for="checkSize43">43</label>
                                                    <input class=" form-control input-user amountProduct" type="number" placeholder="quantidade" id="amountProdSize43" name="amountProdSize43" value="0" readonly style="display: none;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- provider selector -->
                                
                                    <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0" id="contentInputSize">
                                        <div class="form-group">
                                            <label class="ml-1" for="">Fornecedor do produto</label>
                                            <select class="form-control" name="provider">
                                                <option selected value="null">Nennhum</option>
                                                <!-- Iterates the object -->
                                                <?php foreach ($providers as $provider) { ?>
                                                    <option value="<?php echo $provider->getId(); ?>">
                                                        <?php echo $provider->getName(); ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                
                                <!-- provider selector -->

                                <div class="col-10 col-sm-6 col-lg-5 mt-4 mb-2 center p-0">
                                    <input class="btn btn-primary btn-block" form="formProd" type="submit" name="submitProduct" value="Cadastrar" id="inputSubmitProduct" style="font-size: larger;">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row" id="contentRegisterEploy">
                        <div class="col-12 input-group">
                            <form class="input-group center" id="formEmployees" action="../../control/employees_registration.php" method="POST">
                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-3 p-0">
                                    <label class="ml-1" for="nameEmployees">Nome do funcionario</label>
                                    <input class=" form-control input-user" type="text" placeholder="Digite o nome" id="nameEmployees" name="nameEmployees" maxlength="100">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="cpfEmployees">CPF</label>
                                    <input class=" form-control input-user" type="text" placeholder="EX: 60038190060" id="cpfEmployees" name="cpfEmployees" maxlength="14" autocomplete="off">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="emailEmployees">Email</label>
                                    <input class=" form-control input-user" type="email" placeholder="Digite o email" id="emailEmployees" name="emailEmployees" maxlength="40">
                                </div>

                                <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mt-4 p-0">
                                    <label class="ml-1" for="tellEmployees">Telefone</label>
                                    <input class=" form-control input-user" type="text" placeholder="EX: 48148996766" id="tellEmployees" name="tellEmployees" maxlength="15">
                                </div>

                                <div class="col-10 col-sm-6 col-lg-5 mt-4 mb-2 center p-0">
                                    <input class="btn btn-primary btn-block" form="formEmployees" type="submit" name="submitEmployees" value="Cadastrar" style="font-size: larger;">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>