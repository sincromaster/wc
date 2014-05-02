<?php echo $header; ?>

<?php echo $column_left; ?><?php echo $column_right; ?>

<?php $fields = unserialize($fields); ?>

<div id="content"><?php echo $content_top; ?>

    <div class="breadcrumb">

        <?php foreach ($breadcrumbs as $breadcrumb) { ?>

            <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>

        <?php } ?>

    </div>

    <h1><?php echo $heading_title; ?></h1>

    <?php if ($error_warning) { ?>

    <div class="message error"><?php echo $error_warning; ?></div>

    <?php } ?>

    <?php if ($success) { ?>

        <div class="success"><?php echo $success; ?></div>

    <?php } ?>
    
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
                            <input type="text" class="txtBox required" name="nome" placeholder="* Nome Completo" minlength="2" maxlength="72" autocomplete="off" value="<?php echo $fields['nome']; ?>">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="txtCPF required" class="txtBox" name="cpf_cnpj" placeholder="* CPF ou CNPJ" minlength="14" maxlength="18" autocomplete="off" value="<?php echo $fields['cpf_cnpj']; ?>">
                        </div>
                        <div class="form-item size6">
                            <input type="email" id="txtEmail required" class="txtBox" name="email" placeholder="* E-mail" value="<?php echo $fields['email']; ?>">
                        </div>
                        <div class="form-item size3">
                            <input type="text" id="txtTelefone required" class="txtBox" name="telefone" placeholder="* Telefone com DDD" minlength="14" maxlength="15" autocomplete="off" value="<?php echo $fields['telefone']; ?>">
                        </div>

                        <h3>Seu endereço:</h3>
                        <div class="form-item size45">
                            <input type="text" class="txtBox required" name="endereco" placeholder="* Rua, praça ou avenida" minlength="3" value="<?php echo $fields['endereco']; ?>">
                        </div>
                        <div class="form-item size1">
                            <input type="text" class="txtBox required" name="numero" placeholder="* Número" maxlength="8" min="1" value="<?php echo $fields['numero']; ?>">
                        </div>
                        <div class="form-item size1">
                            <input type="text" class="txtBox" name="complemento" placeholder="Compl." maxlength="10" value="<?php echo $fields['complemento']; ?>">
                        </div>
                        <div class="form-item size15">
                            <input type="text" id="txtCep" class="txtBox required" name="cep" placeholder="* CEP" minlength="9" maxlength="9" autocomplete="off" value="<?php echo $fields['cep']; ?>">
                        </div>

                        <h3>dados do veículo:</h3>
                        <div class="form-item size2">
                            <input type="text" id="txtPlaca" class="txtBox required" name="placa" placeholder="* Placa" minlength="8" maxlength="8" autocomplete="off" value="<?php echo $fields['placa']; ?>">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="txtUF" class="txtBox required" name="uf" placeholder="* UF Placa" minlength="2" maxlength="2" autocomplete="off" value="<?php echo $fields['uf']; ?>">
                        </div>
                        <div class="form-item size2">
                            <input type="text" class="txtBox required" name="cidade" placeholder="* Cidade Placa" minlength="2" maxlength="50" autocomplete="off" value="<?php echo $fields['cidade']; ?>">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="dtVenctoCNH" class="txtBox required" name="cnh" placeholder="* Vencto CNH" minlength="2" maxlength="15" autocomplete="off" value="<?php echo $fields['cnh']; ?>">
                        </div>

                        <div class="form-item size25">
                            <input type="text" id="txtRenavam" class="txtBox" name="renavam" placeholder="Renavam" maxlength="11" autocomplete="off" value="<?php echo $fields['renavam']; ?>">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="dtVenctoSEG" class="txtBox" name="vctoSeguro" placeholder="Vencto Seguro" maxlength="11" autocomplete="off" value="<?php echo $fields['vctoSeguro']; ?>">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="txtKmAtual" class="txtBox" name="kmatual" placeholder="KM Atual" maxlength="11" autocomplete="off" value="<?php echo $fields['kmatual']; ?>">
                        </div>

                        <div class="form-item size15">
                            <input type="text" id="txtKmDia" class="txtBox" name="kmdia" placeholder="KM dia" maxlength="11" autocomplete="off" value="<?php echo $fields['kmdia']; ?>">
                        </div>
                        
                        <div class="form-item size25">
                            <input type="text" id="txtKmRevisao" class="txtBox" name="kmrevisao_l" placeholder="KM última revisão" maxlength="11" autocomplete="off" value="<?php echo $fields['kmrevisao_1']; ?>">
                        </div>

                        <div class="form-item select size4">
                            <select type="text" class="txtBox required" name="regiao">
                                <option value="">* Região de circulação</option>
                                <option value="sao_paulo" <?php echo $fields['regiao'] == 'sao_paulo' ? 'selected' : null; ?>>São Paulo Capital</option>
                                <option value="barueri" <?php echo $fields['regiao'] == 'barueri' ? 'selected' : null; ?>>Barueri</option>
                                <option value="cotia" <?php echo $fields['regiao'] == 'cotia' ? 'selected' : null; ?>>Cotia</option>
                                <option value="diadema" <?php echo $fields['regiao'] == 'diadema' ? 'selected' : null; ?>>Diadema</option>
                                <option value="embu_das_artes" <?php echo $fields['regiao'] == 'embu_das_artes' ? 'selected' : null; ?>>Embu das Artes</option>
                                <option value="guarulhos" <?php echo $fields['regiao'] == 'guarulhos' ? 'selected' : null; ?>>Guarulhos</option>
                                <option value="itapecerica_da_serra" <?php echo $fields['regiao'] == 'itapecerica_da_serra' ? 'selected' : null; ?>>Itapecerica da Serra</option>
                                <option value="jandira" <?php echo $fields['regiao'] == 'jandira' ? 'selected' : null; ?>>Jandira</option>
                                <option value="osasco" <?php echo $fields['regiao'] == 'osasco' ? 'selected' : null; ?>>Osasco</option>
                                <option value="santana_de_parnaiba" <?php echo $fields['regiao'] == 'santana_de_parnaiba' ? 'selected' : null; ?>>Santana de Parnaíba</option>
                                <option value="santo_andre" <?php echo $fields['regiao'] == 'santo_andre' ? 'selected' : null; ?>>Santo André</option>
                                <option value="sao_bernardo_do_campo" <?php echo $fields['regiao'] == 'sao_bernardo_do_campo' ? 'selected' : null; ?>>São Bernardo do Campo</option>
                                <option value="sao_caetano_do_sul" <?php echo $fields['regiao'] == 'sao_caetano_do_sul' ? 'selected' : null; ?>>São Caetano do Sul</option>
                                <option value="taboao_da_serra" <?php echo $fields['regiao'] == 'taboao_da_serra' ? 'selected' : null; ?>>Taboão da Serra</option>
                                <option value="vargem_grande_paulista" <?php echo $fields['regiao'] == 'vargem_grande_paulista' ? 'selected' : null; ?>>Vargem Grande Paulista</option>
                            </select>
                        </div>

                        <div class="form-item select size25">
                            <select type="text" class="txtBox required" name="tipo">
                                <option value="">* Tipo de veículo</option>
                                <option value="automovel" <?php echo $fields['tipo'] == 'automovel' ? 'selected' : null; ?>>Automóvel</option>
                                <option value="suv" <?php echo $fields['tipo'] == 'suv' ? 'selected' : null; ?>>Camioneta/SUV</option>  
                                <option value="caminhonete" <?php echo $fields['tipo'] == 'caminhonete' ? 'selected' : null; ?>>Caminhonete</option>
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