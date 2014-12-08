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
            <form action="<?php echo $form['action'] ?>" method="POST">
                <?php foreach($form['fields'] as $name => $field) : ?>
                    <div class="form-item">
                        <label for="<?php echo $name; ?>"><?php echo $form['text_' . $name] ?>: </label>
                        <input type="text" name="<?php echo $name; ?>" value="<?php echo date('d/m/Y', $field); ?>" />
                    </div>
                <?php endforeach; ?>
                <div class="form-item">
                    <input type="submit" value="<?php echo $form['text_submit']; ?>" />
                    <input type="button" value="<?php echo $form['text_clear']; ?>" />
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $footer; ?>