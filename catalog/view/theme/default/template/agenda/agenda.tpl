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

                <div class="box-topo">
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
                            <input type="text" id="txtKmAtual" class="txtBox" title="Digite a quilometragem atual do seu veículo. Este dado é encontrado no painel de seu carro."name="kmatual" placeholder="KM Atual" maxlength="11" autocomplete="off" value="<?php echo $fields['kmatual']; ?>">
                        </div>

                        <div class="form-item size15">
                            <input type="text" id="txtKmDia" class="txtBox" title="Digite a quilometragem média que o veículo anda por dia. Exemplo: Some o número de quilômetros que você gasta indo e voltando do trabalho, ou em qualquer outro percurso diário que você realize." name="kmdia" placeholder="KM dia" maxlength="11" autocomplete="off" value="<?php echo $fields['kmdia']; ?>">
                        </div>

                        <div class="form-item size25">
                            <input type="text" id="txtKmRevisao" class="txtBox" title="Digite a quilometragem do dia em que foi realizada a última revisão no veículo. Este dado é encontrado no manual do veículo. Caso a última revisão realizada não tenha sido na concessionária, basta digitar a quilometragem da última vez em que o veículo passou por uma verificação na oficina, trocando itens como óleo e filtros." name="kmrevisao_l" placeholder="KM última revisão" maxlength="11" autocomplete="off" value="<?php echo $fields['kmrevisao_1']; ?>">
                        </div>

                        <div class="form-item size22">
                            <input type="text" id="dtRevisao" class="txtBox" title="Digite a data de quando foi realizada a última revisão no seu veículo. Este dado é encontrado no manual do veículo. Caso a última revisão realizada não tenha sido na concessionária, basta digitar a data da última vez em que o veículo passou por uma verificação na oficina, trocando itens como óleo e filtros." name="dtrevisao_l" placeholder="Data da última revisão" maxlength="11" autocomplete="off" value="<?php echo $fields['dtrevisao_1']; ?>">
                        </div>

                        <div class="form-item select size39">
                            <select type="text" class="txtBox required" name="regiao" title="Escolha a região na qual o seu veículo circula. Exemplo: Podem existir veículos com placas de outros estados que rodam em nossa área de atuação, estes veículos também serão atendidos pela WeCare Auto.">
                                <option value="">* Região de circulação</option>
                                <option value="São Paulo Capital" <?php echo $fields['regiao'] == 'São Paulo Capital' ? 'selected' : null; ?>>São Paulo Capital</option>
                                <option value="Barueri" <?php echo $fields['regiao'] == 'Barueri' ? 'selected' : null; ?>>Barueri</option>
                                <option value="Cotia" <?php echo $fields['regiao'] == 'Cotia' ? 'selected' : null; ?>>Cotia</option>
                                <option value="Diadema" <?php echo $fields['regiao'] == 'Diadema' ? 'selected' : null; ?>>Diadema</option>
                                <option value="Embu das Artes" <?php echo $fields['regiao'] == 'Embu das Artes' ? 'selected' : null; ?>>Embu das Artes</option>
                                <option value="Guarulhos" <?php echo $fields['regiao'] == 'Guarulhos' ? 'selected' : null; ?>>Guarulhos</option>
                                <option value="Itapecerica da Serra" <?php echo $fields['regiao'] == 'Itapecerica da Serra' ? 'selected' : null; ?>>Itapecerica da Serra</option>
                                <option value="Jandira" <?php echo $fields['regiao'] == 'Jandira' ? 'selected' : null; ?>>Jandira</option>
                                <option value="Osasco" <?php echo $fields['regiao'] == 'Osasco' ? 'selected' : null; ?>>Osasco</option>
                                <option value="Santana de Parnaíba" <?php echo $fields['regiao'] == 'Santana de Parnaíba' ? 'selected' : null; ?>>Santana de Parnaíba</option>
                                <option value="Santo André" <?php echo $fields['regiao'] == 'Santo André' ? 'selected' : null; ?>>Santo André</option>
                                <option value="São Bernardo do Campo" <?php echo $fields['regiao'] == 'São Bernardo do Campo' ? 'selected' : null; ?>>São Bernardo do Campo</option>
                                <option value="São Caetano do Sul" <?php echo $fields['regiao'] == 'São Caetano do Sul' ? 'selected' : null; ?>>São Caetano do Sul</option>
                                <option value="Taboão da Serra" <?php echo $fields['regiao'] == 'Taboão da Serra' ? 'selected' : null; ?>>Taboão da Serra</option>
                                <option value="Vargem Grande Paulista" <?php echo $fields['regiao'] == 'Vargem Grande Paulista' ? 'selected' : null; ?>>Vargem Grande Paulista</option>
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