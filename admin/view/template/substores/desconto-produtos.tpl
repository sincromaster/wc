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

            <div class="buttons"><a onclick="$('#form-descontos').submit();" class="button"><?php echo $text_substore_save; ?></a><a href="<?php echo $button_substore_cancel; ?>" class="button"><?php echo $text_substore_cancel; ?></a></div>

        </div>

        <div class="content">

            <div id="tabs" class="htabs">
                <a href="javascript:;" class="selected" style="display: inline"><?php echo $text_substore_desconto_produtos; ?></a>
                <a href="<?php echo $tab_desconto_cupons; ?>" style="display: inline"><?php echo $text_substore_desconto_cupom; ?></a>
                <a href="<?php echo $tab_comissoes; ?>" style="display: inline"><?php echo $text_substore_comissoes; ?></a>
            </div>

            <form action="<?php echo $form['action']; ?>" method="post" enctype="multipart/form-data" id="form-descontos">

                <input type="hidden" name="store_id" value="<?php echo $form['store_id'] ?>" />
                <input type="hidden" name="table" value="<?php echo $form['table'] ?>" />

                <table>
                    <thead>
                        <tr>
                            <th><?php echo $text_substore_category; ?> <span class="required">*</span></th>
                            <th><?php echo $text_substore_product; ?></th>
                            <th><?php echo $text_substore_discount; ?> <span class="required">*</span></th>
                            <th><?php echo $text_substore_customer_group; ?></th>
                            <th><a href="#"><img src="view/image/add.png" alt="Novo" title="Novo" /></a></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (!empty($form_state)) : ?>

                            <?php foreach ($form_state as $discount) : ?>

                                <tr>
                                    <td>
                                        <select name="category_id[]">
                                            <option value="0">Selecione</option>
                                            <?php foreach ($form['categories'] as $arrCategory): ?>
                                                <option value="<?php echo $arrCategory['category_id']; ?>" <?php echo $discount['category_id'] == $arrCategory['category_id'] ? 'selected' : null; ?>><?php echo $arrCategory['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="product_id[]">
                                            <option value="0">Selecione</option>
                                            <?php foreach ($form['products'] as $arrProduct): ?>
                                                <option value="<?php echo $arrProduct['product_id']; ?>" <?php echo $discount['product_id'] == $arrProduct['product_id'] ? 'selected' : null; ?>><?php echo $arrProduct['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="discount[]" maxlength="5" size="2" value="<?php echo $discount['discount'] ?>"/>
                                    </td>
                                    <td>
                                        <select name="customer_group_id[]">
                                            <option value="0">Selecione</option>
                                            <?php foreach ($form['customers'] as $arrCustomerGroup): ?>
                                                <option value="<?php echo $arrCustomerGroup['customer_group_id']; ?>" <?php echo (int) $discount['customer_group_id'] == (int) $arrCustomerGroup['customer_group_id'] ? 'selected' : null; ?>><?php echo $arrCustomerGroup['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="#"><img src="view/image/delete.png" alt="Excluir" title="Excluir" /></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td>
                                    <select name="category_id[]">
                                        <option value="0">Selecione</option>
                                        <?php foreach ($form['categories'] as $arrCategory): ?>
                                            <option value="<?php echo $arrCategory['category_id']; ?>"><?php echo $arrCategory['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="product_id[]">
                                        <option value="0">Selecione</option>
                                        <?php foreach ($form['products'] as $arrProduct): ?>
                                            <option value="<?php echo $arrProduct['product_id']; ?>"><?php echo $arrProduct['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="discount[]" maxlength="5" size="2" />
                                </td>
                                <td>
                                    <select name="customer_group_id[]">
                                        <option value="0">Selecione</option>
                                        <?php foreach ($form['customers'] as $arrCustomerGroup): ?>
                                            <option value="<?php echo $arrCustomerGroup['customer_group_id']; ?>"><?php echo $arrCustomerGroup['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <a href="#"><img src="view/image/delete.png" alt="Excluir" title="Excluir" /></a>
                                </td>
                            </tr>

                        <?php else: ?>
                            <tr>
                                <td>
                                    <select name="category_id[]">
                                        <option value="0">Selecione</option>
                                        <?php foreach ($form['categories'] as $arrCategory): ?>
                                            <option value="<?php echo $arrCategory['category_id']; ?>"><?php echo $arrCategory['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="product_id[]">
                                        <option value="0">Selecione</option>
                                        <?php foreach ($form['products'] as $arrProduct): ?>
                                            <option value="<?php echo $arrProduct['product_id']; ?>"><?php echo $arrProduct['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="discount[]" maxlength="5" size="2" />
                                </td>
                                <td>
                                    <select name="customer_group_id[]">
                                        <option value="0">Selecione</option>
                                        <?php foreach ($form['customers'] as $arrCustomerGroup): ?>
                                            <option value="<?php echo $arrCustomerGroup['customer_group_id']; ?>"><?php echo $arrCustomerGroup['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <a href="#"><img src="view/image/delete.png" alt="Excluir" title="Excluir" /></a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </form>
            <?php
//            echo '<pre>';
//            print_r($form);
//            exit;
            ?>

        </div>
    </div>

</div>

<?php echo $footer; ?>