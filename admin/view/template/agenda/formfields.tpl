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
            <form action="<?php echo $form['action'] ?>" method="POST" id="form-agenda-texts">
                <?php foreach ($form['fields'] as $name => $field) : ?>
                    <div class="form-item">
                        <label for="<?php echo $name; ?>"><?php echo $form['text_' . $name] ?>: </label>
                        <textarea id="<?php echo $name; ?>" name="<?php echo $name; ?>" rows="10" cols="100"><?php echo $field; ?></textarea>
                    </div>
                <?php endforeach; ?>
                <div class="form-item">
                    <input type="submit" value="<?php echo $form['text_agenda_save']; ?>" />
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $footer; ?>
<script type="text/javascript">
<?php foreach ($form['fields'] as $name => $field) : ?>
        CKEDITOR.replace('<?php echo $name; ?>', {
            filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
            filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'

        });
<?php endforeach; ?>
</script>