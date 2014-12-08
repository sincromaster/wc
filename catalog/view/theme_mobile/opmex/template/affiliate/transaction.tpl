<?php echo $header; ?>
<div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>" rel="external"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
<?php echo $content_top; ?>
<div data-role="content">
<h2 style="margin-top:0px;"><?php echo $heading_title; ?></h2>
  <?php echo $text_balance; ?><b> <?php echo $balance; ?></b>
  
 <!-- <?php echo $column_date_added; ?>
  <?php echo $column_description; ?>
  <?php echo $column_amount; ?>-->
  
  <?php if ($transactions) { ?>
      <ul data-role="listview">
      <?php foreach ($transactions  as $transaction) { ?>
      <li>      
        <h3>
        <?php echo $column_amount; ?><?php echo $transaction['amount']; ?>
        &nbsp;&nbsp;<?php echo $transaction['date_added']; ?>
        </h3>
        <p><?php echo $transaction['description']; ?></p>
      </li>
      <div class="pagination"><?php echo $pagination; ?></div>
      <?php } ?>
      </ul>
      <?php } else { ?>
      <br/><br/>
      <?php echo $text_empty; ?>
      <br/><br/>
      <?php } ?>

<a href="<?php echo $continue; ?>" class="button" rel="external" data-role="button" data-theme="a"><?php echo $button_continue; ?></a>
</div>
<?php echo $content_bottom; ?>
<?php echo $footer; ?>