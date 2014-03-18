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

      <div class="buttons"><a href="<?php echo $insert; ?>" class="button"><?php echo $button_insert; ?></a>
        <!--<a onclick="$('form').submit();" class="button"><?php echo $button_delete; ?></a>-->
      </div>

    </div>

    <div class="content">

      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">

        <table class="list">

          <thead>

            <tr>


              <td class="left"><?php echo $column_revenda_id; ?></a></td>
              <td class="left"><?php echo $column_name; ?></a></td>
              <td class="left"><?php echo $column_comissao; ?></a></td>
              <td class="left"><?php echo $column_url; ?></td>
              <td class="right"><?php echo $column_action; ?></td>

            </tr>

          </thead>

          <tbody>

            <?php if ($revendas) { ?>

            <?php foreach ($revendas as $val) { ?>

            <tr>

              <td class="left"><?php echo $val['revenda_id']; ?></td>
              <td class="left"><?php echo $val['name']; ?></td>
              <td class="left"><?php echo $val['comissao']; ?></td>
              <td class="left"><?php echo $val['url']; ?></td>
              <td class="right"><?php foreach ($val['action'] as $action) { ?>

                [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]

                <?php } ?></td>

            </tr>

            <?php } ?>

            <?php } else { ?>

            <tr>

              <td class="center" colspan="4"><?php echo $text_no_results; ?></td>

            </tr>

            <?php } ?>

          </tbody>

        </table>

      </form>

    </div>

  </div>

</div>

<?php echo $footer; ?> 