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
      <div class="buttons">
        <a onclick="$('#form-comissoes').submit();" class="button"><?php echo $text_substore_save; ?></a>
        <a href="<?php echo $button_substore_cancel; ?>" class="button"><?php echo $text_substore_cancel; ?></a>
      </div>

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

        <table>
          <thead>
            <tr>
              <th><?php echo $column_substore_revenda_name; ?> <span class="required">*</span></th>
              <th><?php echo $column_comissao; ?> <span class="required">*</span></th>
              <th><a href="#" class="add"><img src="view/image/add.png" alt="Novo" title="Novo" /></a></th>
            </tr>
          </thead>
          <tbody>

            <?php if (!empty($form_state)) : ?>

              <?php foreach ($form_state as $val) : ?>

                <tr>
                  <td>
                    <select name="revenda_id[]">
                      <option value="0">Selecione</option>
                      <?php foreach ($revendas as $rev): ?>
                        <option value="<?php echo $rev['revenda_id']; ?>" <?php echo $val['revenda_id'] == $rev['revenda_id'] ? 'selected' : null; ?>><?php echo $rev['revenda_nome']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                  <td>
                    <input type="text" name="comissao[]" maxlength="5" size="2" value="<?php echo $val['comissao'] ?>"/>
                  </td>
                  <td>
                    <a href="#" class="remove"><img src="view/image/delete.png" alt="Excluir" title="Excluir" /></a>
                  </td>
                </tr>
              <?php endforeach; ?>
              <!--item vazio quando tem dados -->
              <tr>
                <td>
                  <select name="revenda_id[]">
                    <option value="0">Selecione</option>
                    <?php foreach ($revendas as $rev): ?>
                      <option value="<?php echo $rev['revenda_id']; ?>"><?php echo $rev['revenda_nome']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
                <td>
                  <input type="text" name="comissao[]" maxlength="5" size="2" />
                </td>
                <td>
                  <a href="#" class="remove"><img src="view/image/delete.png" alt="Excluir" title="Excluir" /></a>
                </td>
              </tr>

            <?php else: ?>
              <tr>
                <td>
                  <select name="revenda_id[]">
                    <option value="0">Selecione</option>
                    <?php foreach ($revendas as $rev): ?>
                      <option value="<?php echo $rev['revenda_id']; ?>"><?php echo $rev['revenda_nome']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
                <td>
                  <input type="text" name="comissao[]" maxlength="5" size="2" />
                </td>
                <td>
                  <a href="#" class="remove"><img src="view/image/delete.png" alt="Excluir" title="Excluir" /></a>
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