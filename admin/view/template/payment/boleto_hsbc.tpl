<!--
/*
	OpenCart
	v1.5.3.1
	Atualização Boleto Bancario.
	Empresa Brasilnaweb
	www.brasilnaweb.com.br
	Feito por 
	Tiago Agenor
	http://www.tiagoagenor.com.br/novo
*/
-->
<?php echo $header; ?>

<div id="content">

<div class="breadcrumb">

    <?php foreach ($breadcrumbs as $breadcrumb) { ?>

    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>

    <?php } ?>

  </div>

<?php if ($error_warning) { ?>

<div class="warning"><?php echo $error_warning; ?></div>

<?php } ?>

<div class="box">

  <div class="heading">

    <h1><img src="view/image/payment.png" alt="" /><?php echo $heading_title; ?></h1>

    <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location='<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>

</div>

  <div class="content">

	<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">

    <table class="form">

      <tr>

        <td width="25%"><?php echo $entry_status; ?></td>

        <td><select name="boleto_hsbc_status">

          <?php if ($boleto_hsbc_status) { ?>

          <option value="1" selected="selected"><?php echo $text_enabled; ?></option>

          <option value="0"><?php echo $text_disabled; ?></option>

          <?php } else { ?>

          <option value="1"><?php echo $text_enabled; ?></option>

          <option value="0" selected="selected"><?php echo $text_disabled; ?></option>

          <?php } ?>

        </select></td>

      </tr>

      <tr>

        <td><?php echo $entry_geo_zone; ?></td>

        <td><select name="boleto_hsbc_geo_zone_id">

          <option value="0"><?php echo $text_all_zones; ?></option>

          <?php foreach ($geo_zones as $geo_zone) { ?>

          <?php if ($geo_zone['geo_zone_id'] == $boleto_hsbc_geo_zone_id) { ?>

          <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>

          <?php } else { ?>

          <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>

          <?php } ?>

          <?php } ?>

        </select></td>

      </tr>

      <tr>

        <td><?php echo $entry_order_status; ?></td>

        <td><select name="boleto_hsbc_order_status_id">

          <?php foreach ($order_statuses as $order_status) { ?>

          <?php if ($order_status['order_status_id'] == $boleto_hsbc_order_status_id) { ?>

          <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>

          <?php } else { ?>

          <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>

          <?php } ?>

          <?php } ?>

        </select></td>

      </tr>

      <tr>

        <td><?php echo $entry_logo; ?></td>

        <td><input type="text" name="boleto_hsbc_logo" value="<?php echo $boleto_hsbc_logo; ?>" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_identificacao; ?></td>

        <td><input type="text" name="boleto_hsbc_identificacao" value="<?php echo $boleto_hsbc_identificacao; ?>" /></td>

      </tr>

      <tr>
        <td><?php echo $entry_cpf_cnpj; ?></td>
        <td><input name="boleto_hsbc_cpf_cnpj" type="text" id="boleto_hsbc_cpf_cnpj" value="<?php echo $boleto_hsbc_cpf_cnpj; ?>" /></td>
      </tr>      

      <tr>

        <td><?php echo $entry_endereco; ?></td>

        <td><input name="boleto_hsbc_endereco" type="text" id="boleto_hsbc_endereco" value="<?php echo $boleto_hsbc_endereco; ?>" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_cidade_uf; ?></td>

        <td><input name="boleto_hsbc_cidade_uf" type="text" id="boleto_hsbc_cidade_uf" value="<?php echo $boleto_hsbc_cidade_uf; ?>" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_cedente; ?></td>

        <td><input name="boleto_hsbc_cedente" type="text" id="boleto_hsbc_cedente" value="<?php echo $boleto_hsbc_cedente; ?>" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_agencia; ?></td>

        <td><input name="boleto_hsbc_agencia" type="text" id="boleto_hsbc_agencia" value="<?php echo $boleto_hsbc_agencia; ?>" maxlength="4" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_conta; ?></td>

        <td><input name="boleto_hsbc_conta" type="text" id="boleto_hsbc_conta" value="<?php echo $boleto_hsbc_conta; ?>" maxlength="7" /></td>

      </tr>

     <tr>

        <td><?php echo $entry_posto; ?></td>

        <td><input name="boleto_hsbc_posto" type="text" id="boleto_hsbc_posto" value="<?php echo $boleto_hsbc_posto; ?>" maxlength="7" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_carteira; ?></td>

        <td><input name="boleto_hsbc_carteira" type="text" id="boleto_hsbc_carteira" value="<?php echo $boleto_hsbc_carteira; ?>" maxlength="3" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_dia_prazo_pg; ?></td>

        <td><input name="boleto_hsbc_dia_prazo_pg" type="text" id="boleto_hsbc_dia_prazo_pg" value="<?php echo $boleto_hsbc_dia_prazo_pg; ?>" maxlength="2" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_taxa_boleto; ?></td>

        <td><input name="boleto_hsbc_taxa_boleto" type="text" id="boleto_hsbc_taxa_boleto" value="<?php echo $boleto_hsbc_taxa_boleto; ?>" maxlength="4" /></td>

      </tr>

 

      <tr>

        <td><?php echo $entry_demonstrativo1; ?></td>

        <td><input name="boleto_hsbc_demonstrativo1" type="text" id="boleto_hsbc_demonstrativo1" value="<?php echo $boleto_hsbc_demonstrativo1; ?>" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_demonstrativo2; ?></td>

        <td><input name="boleto_hsbc_demonstrativo2" type="text" id="boleto_hsbc_demonstrativo2" value="<?php echo $boleto_hsbc_demonstrativo2; ?>" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_demonstrativo3; ?></td>

        <td><input name="boleto_hsbc_demonstrativo3" type="text" id="boleto_hsbc_demonstrativo3" value="<?php echo $boleto_hsbc_demonstrativo3; ?>" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_instrucoes1; ?></td>

        <td><input name="boleto_hsbc_instrucoes1" type="text" id="boleto_hsbc_instrucoes1" value="<?php echo $boleto_hsbc_instrucoes1; ?>" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_instrucoes2; ?></td>

        <td><input name="boleto_hsbc_instrucoes2" type="text" id="boleto_hsbc_instrucoes2" value="<?php echo $boleto_hsbc_instrucoes2; ?>" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_instrucoes3; ?></td>

        <td><input name="boleto_hsbc_instrucoes3" type="text" id="boleto_hsbc_instrucoes3" value="<?php echo $boleto_hsbc_instrucoes3; ?>" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_instrucoes4; ?></td>

        <td><input name="boleto_hsbc_instrucoes4" type="text" id="boleto_hsbc_instrucoes4" value="<?php echo $boleto_hsbc_instrucoes4; ?>" /></td>

      </tr>

      <tr>

        <td><?php echo $entry_sort_order; ?></td>

        <td><input type="text" name="boleto_hsbc_sort_order" value="<?php echo $boleto_hsbc_sort_order; ?>" size="1" /></td>

      </tr>

    </table>

 

</form>

</div>

</div>

<script type="text/javascript"><!--

//$.tabs('.tabs a'); 

//--></script>

<?php echo $footer; ?>

