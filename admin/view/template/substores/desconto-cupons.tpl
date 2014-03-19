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

            <div class="buttons"><a onclick="$('#form-cupons').submit();" class="button"><?php echo $text_substore_save; ?></a><a href="<?php echo $button_substore_cancel; ?>" class="button"><?php echo $text_substore_cancel; ?></a></div>

        </div>

        <div class="content">

            <div id="tabs" class="htabs">
                <a href="<?php echo $text_substore_desconto_produtos; ?>" style="display: inline"><?php echo $text_substore_desconto_produtos; ?></a>
                <a href="javascript:;" class="selected" style="display: inline"><?php echo $text_substore_desconto_cupom; ?></a>
                <a href="<?php echo $tab_comissoes; ?>" style="display: inline"><?php echo $text_substore_comissoes; ?></a>
            </div>

            <form action="<?php echo $form['action']; ?>" method="post" enctype="multipart/form-data" id="form-cupons">

                <input type="hidden" name="store_id" value="<?php echo $form['store_id'] ?>" />
                <input type="hidden" name="table" value="<?php echo $form['table'] ?>" />

                <table>
                    <thead>
                        <tr>
                            <th><?php echo $text_substore; ?> </th>
                            <th><?php echo $text_substore_cupom; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div id="store-id">
                                    <span><?php echo $form['stores'][0]['name'] ?></span>
                                    </dib>
                            </td>
                            <td>
                                <select name="coupon_id[]">
                                    <option value="0">Selecione</option>
                                    <?php foreach ($form['coupons'] as $arrCoupon): ?>
                                        <option value="<?php echo $arrCoupon['coupon_id']; ?>" <?php echo (isset($form_state['coupon_id']) && $form_state['coupon_id'] == $arrCoupon['coupon_id']) ? 'selected' : null ;?> ><?php echo $arrCoupon['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<?php echo $footer; ?>