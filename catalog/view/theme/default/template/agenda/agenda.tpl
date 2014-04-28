<?php echo $header; ?>

<?php if ($success) { ?>

    <div class="success"><?php echo $success; ?></div>

<?php } ?>

<?php echo $column_left; ?><?php echo $column_right; ?>

<div id="content"><?php echo $content_top; ?>

    <div class="breadcrumb">

        <?php foreach ($breadcrumbs as $breadcrumb) { ?>

            <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>

        <?php } ?>

    </div>

    <h1><?php echo $heading_title; ?></h1>

    <div class="content">

        <div id="agenda">

            <div id="agenda-topo">

                <div class="box-topo-left">
                    <img src="catalog/view/theme/default/image/agenda/image-topo-left.jpg" />
                </div>

                <div class="box-topo-right">
                    <p>
                        Com a Agenda Grátis WeCare Auto você fica despreocupado com as<br/>
                        datas dos compromissos do carro e, se quiser, ainda conta com a<br/>
                        ajuda de nossos especialistas automotivos adquirindo nossos<br/>
                        serviços avulsos ou pacotes.<br/>
                    </p>
                    <p>Para usufruir da Agenda Grátis, basta preencher os dados abaixo:</p>
                </div>
            </div>

            <div id="agenda-bottom">

                <div class="box-bottom-left">

                    <div id="figura2">
                        <p>Alertas sobre:</p>
                        <ul>
                            <li>IPVA</li>
                            <li>DPVAT</li>
                            <li>Revisões</li>
                            <li>Licenciamento</li>
                            <li>Renovação da CNH</li>
                            <li>Inspeção Veicular</li>
                            <li>Vencimento do Seguro</li>
                        </ul>
                    </div>
                </div>

                <div class="box-bottom-right">

                    <form action="<?php echo $form['action']; ?>" method="post">
                        <h3>Seus dados:</h3>
                        <div class="form-item size7">
                            <input type="text" class="txtBox required" name="nome" placeholder="* Nome Completo" minlength="2" maxlength="72" autocomplete="off">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="txtCPF required" class="txtBox" name="cpf_cnpj" placeholder="* CPF ou CNPJ" minlength="14" maxlength="18" autocomplete="off">
                        </div>
                        <div class="form-item size6">
                            <input type="email" id="txtEmail required" class="txtBox" name="email" placeholder="* E-mail" >
                        </div>
                        <div class="form-item size3">
                            <input type="text" id="txtTelefone required" class="txtBox" name="telefone" placeholder="* Telefone com DDD" minlength="14" maxlength="15" autocomplete="off">
                        </div>

                        <h3>Seu endereço:</h3>
                        <div class="form-item size45">
                            <input type="text" class="txtBox required" name="endereco" placeholder="* Rua, praça ou avenida" minlength="3">
                        </div>
                        <div class="form-item size1">
                            <input type="text" class="txtBox required" name="numero" placeholder="* Número" maxlength="8" min="1">
                        </div>
                        <div class="form-item size1">
                            <input type="text" class="txtBox" name="complemento" placeholder="Compl." maxlength="10">
                        </div>
                        <div class="form-item size15">
                            <input type="text" id="txtCep" class="txtBox required" name="cep" placeholder="* CEP" minlength="9" maxlength="9" autocomplete="off">
                        </div>

                        <h3>dados do veículo:</h3>
                        <div class="form-item size2">
                            <input type="text" id="txtPlaca" class="txtBox required" name="placa" placeholder="* Placa" minlength="8" maxlength="8" autocomplete="off">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="txtUF" class="txtBox required" name="uf" placeholder="* UF Placa" minlength="2" maxlength="2" autocomplete="off">
                        </div>
                        <div class="form-item size2">
                            <input type="text" class="txtBox required" name="cidade" placeholder="* Cidade Placa" minlength="2" maxlength="50" autocomplete="off">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="dtVenctoCNH" class="txtBox required" name="cnh" placeholder="* Vencto CNH" minlength="2" maxlength="15" autocomplete="off">
                        </div>

                        <div class="form-item size25">
                            <input type="text" id="txtRenavam" class="txtBox" name="renavam" placeholder="Renavam" maxlength="11" autocomplete="off">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="dtVenctoSEG" class="txtBox" name="vctoSeguro" placeholder="Vencto Seguro" maxlength="11" autocomplete="off">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="txtKmAtual" class="txtBox" name="kmatual" placeholder="KM Atual" maxlength="11" autocomplete="off">
                        </div>

                        <div class="form-item size15">
                            <input type="text" id="txtKmDia" class="txtBox" name="kmdia" placeholder="KM dia" maxlength="11" autocomplete="off">
                        </div>
                        
                        <div class="form-item size25">
                            <input type="text" id="txtKmRevisao" class="txtBox" name="kmrevisao_l" placeholder="KM última revisão" maxlength="11" autocomplete="off">
                        </div>

                        <div class="form-item select size4">
                            <select type="text" class="txtBox required" name="regiao">
                                <option>* Região de circulação</option>
                                <option>São Paulo Capital</option>
                                <option>Barueri</option>
                                <option>Cotia</option>
                                <option>Diadema</option>
                                <option>Embu das Artes</option>
                                <option>Guarulhos</option>
                                <option>Itapecerica da Serra</option>
                                <option>Jandira</option>
                                <option>Osasco</option>
                                <option>Santana de Parnaíba</option>
                                <option>Santo André</option>
                                <option>São Bernardo do Campo</option>
                                <option>São Caetano do Sul</option>
                                <option>Taboão da Serra</option>
                                <option>Vargem Grande Paulista</option>
                            </select>
                        </div>

                        <div class="form-item select size25">
                            <select type="text" class="txtBox required" name="tipo">
                                <option>* Tipo de veículo</option>
                                <option>Automóvel</option>
                                <option>Camioneta/SUV</option>  
                                <option>Caminhonete</option>
                            </select>
                        </div>

                        <input type="submit" value="Enviar" class="submit">

                    </form>
                </div>

            </div>




        </div>


    </div>



</div>

<?php echo $footer; ?>