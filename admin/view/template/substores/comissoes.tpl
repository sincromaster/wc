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

  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>

  <div class="box">
    <div class="heading">
      <h1><img src="view/image/setting.png" alt="" /> <?php echo $heading_title; ?></h1>
    </div>

    <div class="content">

      <div id="tabs" class="htabs">
        <a href="<?php echo $tab_desconto_produtos; ?>" style="display: inline"><?php echo $text_substore_desconto_produtos; ?></a>
        <a href="<?php echo $tab_desconto_cupons; ?>" style="display: inline"><?php echo $text_substore_desconto_cupom; ?></a>
        <a href="javascript:;" style="display: inline" class="selected"><?php echo $text_substore_comissoes; ?></a>
      </div>

      <form action="<?php echo $form['action']; ?>" method="post" enctype="multipart/form-data" id="form-comissoes">

        <input type="hidden" name="store_id" value="<?php echo $form['store_id'] ?>" />
        <input type="hidden" name="table" value="<?php echo $form['table'] ?>" />

        <table class="list">
          <thead>
            <tr>
              <td><?php echo $text_substore_comissao_pedido_id; ?></th>
              <td><?php echo $text_substore_nome_produto; ?></th>
              <td><?php echo $text_substore_comissao_comissao; ?></th>
              <td><?php echo $text_substore_preco_produto; ?></th>
              <td><?php echo $text_substore_comissao_valor; ?></th>
              <td><?php echo $text_substore_comissao_data; ?></th>
            </tr>
          </thead>
          <tbody>

            <?php if (!empty($form_state)) : ?>
            <?php foreach ($form_state as $val) : ?>
            <tr>
              <td><?php echo $val['order_id'] ; ?></td>
              <td><?php echo $val['name'] ; ?></td>
              <td><?php echo $val['sales_comission'] ; ?></td>
              <td><?php echo $val['price'] ; ?></td>
              <td><?php echo (($val['price'] * $val['sales_comission']) / 100) ; ?></td>
              <td><?php echo date('d/m/Y',  $val['sales_created'])  ; ?></td>
            </tr>
            <?php endforeach; ?>

            <?php else: ?>
            <tr>
              <td colspan="3" align="center">
                <?php echo $text_no_results ?>
              </td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>

      </form>
    </div>
  </div>

</div>

<?php echo $footer; ?>