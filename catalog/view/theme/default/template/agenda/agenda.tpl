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
          <span>
            Com a Agenda Grátis WeCare Auto você fica despreocupado com as<br/>
            datas dos compromissos do carro e, se quiser, ainda conta com a<br/>
            ajuda de nossos especialistas automotivos adquirindo nossos<br/>
            serviços avulsos ou pacotes.<br/>
          </span
          >
        </div>
      </div>

      <div id="agenda-bottom">

        <div class="box-bottom-left">

          <div id="figura2">
            <br><br>
            <p>Alertas sobre:</p>
            <br>
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
            <label class="label_txt" style="margin-left:15px;">
              <input type="text" class="txtBox" name="nome" placeholder="* Nome Completo" size="48" required="" minlength="2" maxlength="72" autocomplete="off">
            </label>
            <label class="label_txt" style="margin-left:5px;">
              <input type="text" id="txtCPF" class="txtBox" onfocus="txtCPF_get_focus()" onblur="txtCPF_lose_focus()" name="cpf_cnpj" placeholder="* CPF ou CNPJ" size="18" required="" minlength="14" maxlength="18" autocomplete="off">
            </label>
            <label class="label_txt" style="margin-left:15px;">
              <input type="email" id="txtEmail" class="txtBox" name="email" placeholder="* E-mail" size="41" required="">
            </label>
            <label class="label_txt" style="margin-left:5px;">
              <input type="text" id="txtTelefone" onfocus="txtTelefone_get_focus()" onblur="txtTelefone_lose_focus()" class="txtBox" name="telefone" placeholder="* Telefone com DDD" size="25" required="" minlength="14" maxlength="15" autocomplete="off">
            </label>

            <h3 style="margin-top:15px">Seu endereço:</h3>
            <label class="label_txt" style="margin-left:15px;">
              <input type="text" class="txtBox" name="endereco" placeholder="* Rua, praça ou avenida" size="29" required="" minlength="3">
            </label>
            <label class="label_txt" style="margin-left:5px;">
              <input type="text" class="txtBox" name="numero" onkeypress="return somente_numeros(event)" placeholder="* Número" size="7" maxlength="8" required="" min="1">
            </label>
            <label class="label_txt" style="margin-left:5px;">
              <input type="text" class="txtBox" name="complemento" placeholder="Comple." size="7" maxlength="10">
            </label>
            <label class="label_txt" style="margin-left:5px;">
              <input type="text" id="txtCep" onfocus="txtCep_get_focus()" onblur="txtCep_lose_focus()" class="txtBox" name="cep" placeholder="* CEP" size="9" required="" minlength="9" maxlength="9" autocomplete="off">
            </label>

            <h3 style="margin-top:15px">dados do veículo:</h3>
            <label class="label_txt" style="margin-left:15px;">
              <input type="text" id="txtPlaca" onfocus="txtPlaca_get_focus()" onblur="txtPlaca_lose_focus();upper(this.value, this.id)" class="txtBox" name="placa" placeholder="* Placa" size="15" required="" minlength="8" maxlength="8" autocomplete="off">
            </label>
            <label class="label_txt" style="margin-left:5px;">
              <input type="text" id="txtUF" onkeypress="return somente_letras(event)" onblur="upper(this.value, this.id)" class="txtBox" name="uf" placeholder="* UF Placa" size="7" required="" minlength="2" maxlength="2" autocomplete="off">
            </label>
            <label class="label_txt" style="margin-left:5px;">
              <input type="text" class="txtBox" name="cidade" placeholder="* Cidade Placa" size="15" required="" minlength="2" maxlength="50" autocomplete="off">
            </label>
            <label class="label_txt" style="margin-left:5px;">
              <input type="text" id="dtVenctoCNH" class="txtBox hasDatepicker" name="cnh" placeholder="* Vencto CNH" size="15" required="" minlength="2" maxlength="15" autocomplete="off">
            </label>

            <label class="label_txt" style="margin-left:15px;">
              <input type="text" id="txtRenavam" onkeypress="return somente_numeros(event)" class="txtBox" name="renavam" placeholder="Renavam" size="18" maxlength="11" autocomplete="off">
            </label>
            <label class="label_txt" style="margin-left:5px;">
              <input type="text" id="dtVenctoSEG" class="txtBox hasDatepicker" name="vctoSeguro" placeholder="Vencto Seguro" size="15" maxlength="11" autocomplete="off">
            </label>
            <label class="label_txt" style="margin-left:5px;">
              <input type="text" class="txtBox" name="kmatual" onkeypress="return somente_numeros(event)" placeholder="KM Atual" size="11" maxlength="11" autocomplete="off">
            </label>

            <label class="label_txt" style="margin-left:5px;">
              <input type="text" class="txtBox" name="kmdia" onkeypress="return somente_numeros(event)" placeholder="KM dia" size="8" maxlength="11" autocomplete="off">
            </label>
            <label class="label_txt" style="margin-left:15px;">
              <input type="text" class="txtBox" name="kmrevisao_l" onkeypress="return somente_numeros(event)" placeholder="KM última revisão" size="13" maxlength="11" autocomplete="off">
            </label>

            <label class="label_txt" style="margin-left:5px;">
              <select type="text" class="txtBox" name="regiao" style="width:210px;height:31px" required="">
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
            </label>

            <label class="label_txt" style="margin-left:5px;">
              <select type="text" class="txtBox" name="tipo" style="width:198px;height:31px" required="">
                <option>* Tipo de veículo</option>
                <option>Automóvel</option>
                <option>Camioneta/SUV</option>  
                <option>Caminhonete</option>
              </select>
            </label>

            <br>
            <input type="submit" value="Enviar" class="submit">

          </form>
        </div>

      </div>




    </div>


  </div>



</div>

<?php echo $footer; ?>