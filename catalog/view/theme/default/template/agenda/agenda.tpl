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
                    <img src="catalog/view/theme/default/image/agenda/image-topo-left.png" class="image1" width="200"/>
                    <img src="catalog/view/theme/default/image/agenda/image-topo-left-2.png" class="image2" width="70"/>
                </div>

                <div class="box-topo-right">
                    <?php echo html_entity_decode($text_cabecalho); ?>
                </div>
            </div>

            <div id="agenda-bottom">

                <div class="box-bottom-right">

                    <form action="<?php echo $form['action']; ?>" method="post">
                        <h3>Seus dados:</h3>
                        <div class="form-item size67">
                            <input type="text" class="txtBox required" name="nome" title="Digite seu nome completo." placeholder="* Nome Completo" minlength="2" maxlength="72" autocomplete="off" value="<?php echo $fields['nome']; ?>">
                        </div>
                        <div class="form-item size2">
                            <input type="text" class="txtBox required" id="txtCPF" title="Digite seu CPF. Em caso de Pessoa Jurídica, digite o CNPJ da empresa. Não é necessário colocar pontos ou hífen." class="txtBox" name="cpf_cnpj" placeholder="* CPF ou CNPJ" minlength="14" maxlength="18" autocomplete="off" value="<?php echo $fields['cpf_cnpj']; ?>">
                        </div>
                        <div class="form-item size6">
                            <input type="email" id="txtEmail" class="txtBox required" title="Digite seu e-mail e confira. Esta informação será muito importante para a gente se comunicar com você." name="email" placeholder="* E-mail" value="<?php echo $fields['email']; ?>">
                        </div>
                        <div class="form-item size27">
                            <input type="text" id="txtTelefone" class="txtBox required" title="Digite seu telefone com DDD." name="telefone" placeholder="* Telefone com DDD" minlength="14" maxlength="15" autocomplete="off" value="<?php echo $fields['telefone']; ?>">
                        </div>

                        <h3>Seu endereço:</h3>
                        <div class="form-item size45">
                            <input type="text" class="txtBox required" title="Digite o nome da sua rua ou avenida. Ex: Rua Arantes" name="endereco" placeholder="* Rua, praça ou avenida" minlength="3" value="<?php echo $fields['endereco']; ?>">
                        </div>
                        <div class="form-item size1">
                            <input type="text" class="txtBox required" title="Digite o número do seu endereço." name="numero" placeholder="* Número" maxlength="8" min="1" value="<?php echo $fields['numero']; ?>">
                        </div>
                        <div class="form-item size1">
                            <input type="text" class="txtBox" title="Digite o complemento do seu endereço." name="complemento" placeholder="Compl." maxlength="10" value="<?php echo $fields['complemento']; ?>">
                        </div>
                        <div class="form-item size15">
                            <input type="text" id="txtCep" class="txtBox required" title="Digite o seu CEP. Não é necessário colocar hífen." name="cep" placeholder="* CEP" minlength="9" maxlength="9" autocomplete="off" value="<?php echo $fields['cep']; ?>">
                        </div>

                        <h3>dados do veículo:</h3>
                        <div class="form-item size2">
                            <input type="text" id="txtPlaca" class="txtBox required" title="Digite a placa do seu veículo. Não é necessário colocar hífen." name="placa" placeholder="* Placa" minlength="8" maxlength="8" autocomplete="off" value="<?php echo $fields['placa']; ?>">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="txtUF" class="txtBox required" title="Digite o estado de emissão da placa do veículo. Ex: SP" name="uf" placeholder="* UF Placa" minlength="2" maxlength="2" autocomplete="off" value="<?php echo $fields['uf']; ?>">
                        </div>
                        <div class="form-item size2">
                            <input type="text" class="txtBox required" name="cidade" title="Digite a cidade de emissão da placa do veículo." placeholder="* Cidade Placa" minlength="2" maxlength="50" autocomplete="off" value="<?php echo $fields['cidade']; ?>">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="dtVenctoCNH" class="txtBox required" title="Digite a data de vencimento da sua Carteira de Habilitação (DD/MM/AAAA)" name="cnh" placeholder="* Vencto CNH" minlength="2" maxlength="15" autocomplete="off" value="<?php echo $fields['cnh']; ?>">
                        </div>

                        <div class="form-item size25">
                            <input type="text" id="txtRenavam" class="txtBox" title="Digite o RENAVAM do seu veículo. Este número você encontra no documento do seu carro." name="renavam" placeholder="Renavam" maxlength="11" autocomplete="off" value="<?php echo $fields['renavam']; ?>">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="dtVenctoSEG" class="txtBox" title="Digite a data de vencimento do Seguro do seu veículo (DD/MM/AAAA)." name="vctoSeguro" placeholder="Vencto Seguro" maxlength="11" autocomplete="off" value="<?php echo $fields['vctoSeguro']; ?>">
                        </div>
                        <div class="form-item size2">
                            <input type="text" id="txtKmAtual" class="txtBox" title="Digite a quilometragem média que o veículo anda por dia. Exemplo: Some o número de
                            quilômetros que você gasta indo e voltando do trabalho, ou em qualquer outro percurso diário 
                            que você realize."name="kmatual" placeholder="KM Atual" maxlength="11" autocomplete="off" value="<?php echo $fields['kmatual']; ?>">
                        </div>

                        <div class="form-item size15">
                            <input type="text" id="txtKmDia" class="txtBox" title="Digite a quilometragem do dia em que foi realizada a última revisão no veículo. Este dado 
                            é encontrado no manual do veículo. Caso a última revisão realizada não tenha sido na 
                            concessionária, basta digitar a quilometragem da última vez em que o veículo passou por uma 
                            verificação na oficina, trocando itens como óleo e filtros." name="kmdia" placeholder="KM dia" maxlength="11" autocomplete="off" value="<?php echo $fields['kmdia']; ?>">
                        </div>
                        
                        <div class="form-item size25">
                            <input type="text" id="txtKmRevisao" class="txtBox" title="Digite a data de quando foi realizada a última revisão no seu veículo. Este dado é encontrado
                            no manual do veículo. Caso a última revisão realizada não tenha sido na concessionária, basta 
                            digitar a data da última vez em que o veículo passou por uma verificação na oficina, trocando 
                            itens como óleo e filtros." name="kmrevisao_l" placeholder="KM última revisão" maxlength="11" autocomplete="off" value="<?php echo $fields['kmrevisao_1']; ?>">
                        </div>

                        <div class="form-item select size39">
                            <select type="text" class="txtBox required" name="regiao" title="Escolha a região na qual o seu veículo circula. Exemplo: Podem existir veículos com placas de
                            outros estados que rodam em nossa área de atuação, estes veículos também serão atendidos 
                            pela WeCare Auto.">
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

            <br class="clear" />
            <div class="agenda-more-info">
                <?php echo html_entity_decode($text_rodape); ?>
            </div>

                <div class="slogan">
                    <img src="catalog/view/theme/default/image/agenda/wecare-logo.png" class="image1" width="100"/>
                    <p>Mais cuidado para o seu carro.<br />Mais tempo para você.</p>
                </div>
        </div>


    </div>



</div>

<?php echo $footer; ?>