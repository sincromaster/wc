<?php echo $header; ?>
<?php if ($attention) { ?>
    <div class="attention"><?php echo $attention; ?></div>
    <?php } ?>    
    <?php if ($success) { ?>
    <div class="success"><?php echo $success; ?></div>
    <?php } ?>
    <?php if ($error_warning) { ?>
    <div class="warning"><?php echo $error_warning; ?></div>
    <?php } ?>
<div data-role="content">
 <ul id="breadcrumbs-one">
    <?php 
    $total = count($breadcrumbs); 
    $i=0;
    foreach ($breadcrumbs as $breadcrumb) { 
        $i++;
        if($i==$total)
        {
    ?>
        <li><a class="current"><?php echo $breadcrumb['text']; ?></a></li>
    <?php 
        }else{
    ?>
      	<li><a href="<?php echo $breadcrumb['href']; ?>" rel="external"><?php echo $breadcrumb['text']; ?></a></li>
      <?php }
      } ?>
</ul>

<?php echo $column_left; ?>
<div id="column-center" style="margin-top:25px;">
<?php echo $content_top; ?>
  <!-- <h1><?php echo $heading_title; ?>
      <?php if ($weight) { ?>
      &nbsp;(<?php echo $weight; ?>)
      <?php } ?>
    </h1>-->
    <?php $final_total = sizeof($totals)-1; ?> 
    <ul data-role="listview" data-divider-theme="b">
       <li data-role="list-divider" style="padding-top:1px; padding-bottom:3px;"><h3><?php echo $heading_title; ?></h3>
       <span  class="cart-total-amount"><b><?php echo $totals[$final_total]['title']; ?>: </b><?php echo $totals[$final_total]['text']; ?></h3></span></li>
    </ul>
   <a href="<?php echo $checkout; ?>" class="button" data-role="button" data-inline="true" data-theme="b" style="margin-top:25px; margin-bottom:25px;" rel="external"><?php echo $button_checkout; ?></a>
  <!-- <a href="<?php echo $continue; ?>" class="button" data-role="button" rel="external" data-inline="true"><?php echo $button_shopping; ?></a>-->
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" data-ajax="false">
    
       <?php foreach ($products as $product) { ?>
       <ul data-role="listview" data-divider-theme="d">
       <li>
       <a href="<?php echo $product['href']; ?>" rel="external">
       <?php if ($product['thumb']) { ?>
       <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" />
          <?php } ?>
           
              <h3 style="margin-top:-4px; margin-bottom:3px;"><?php echo $product['name']; ?></h3>
               <p style="margin-bottom:-2px;"> 
               <?php if (!$product['stock']) { ?>
                ***
               <?php } ?>
               <?php foreach ($product['option'] as $option) { ?>
                  - <small><?php echo $option['name']; ?>: <?php echo $option['value']; ?></small><br />
                <?php } ?>
                <?php if (isset($product['reward'])) { ?>
                <small><?php echo $product['reward']; ?></small>
                <?php } ?></span>
              <?php echo $product['model']; ?>
              <!--<span class="quantity"><input type="text" name="quantity[<?php echo $product['key']; ?>]" value="<?php echo $product['quantity']; ?>" size="3" /></span>-->
              <br/>
              <?php echo $column_price; ?>:<?php echo $product['price']; ?>,
              &nbsp;Qnt:<?php echo $product['quantity']; ?>
              <br/><?php echo $column_total; ?>: <?php echo $product['total']; ?>
            </p>
             </a>
           </li>
           </ul>
           <table style="margin: 5px 0;"><tr>
           <td><input type="text" name="quantity[<?php echo $product['key']; ?>]" value="<?php echo $product['quantity']; ?>" data-inline="true" style="width:30px;" />
           <td>Quantity</td>
           </td>
			<td>        
          <input type="image" src="catalog/view/theme/default/image/update.png" alt="<?php echo $button_update; ?>" title="<?php echo $button_update; ?>" value="<?php echo $button_update; ?>" />
          </td><td>
          <a href="<?php echo $product['remove']; ?>" rel="external"><img src="catalog/view/theme/default/image/remove.png" alt="<?php echo $button_remove; ?>" title="<?php echo $button_remove; ?>" /></a>
          </td>
          </tr></table>
        
          <?php } ?>
    	
       </form> 
   <?php if ($coupon_status || $voucher_status || $reward_status || $shipping_status) { ?>
  <h2 style="margin-top:25px;"><?php echo $text_next; ?></h2>
  <div class="content">
   <fieldset data-role="controlgroup">
   <legend><?php echo $text_next_choice; ?></legend>
      <?php if ($coupon_status) { ?>
              <?php if ($next == 'coupon') { ?>
          <input type="radio" name="next" value="coupon" id="use_coupon" checked="checked" />
          <?php } else { ?>
          <input type="radio" name="next" value="coupon" id="use_coupon" />
          <?php } ?>
       <label for="use_coupon"><?php echo $text_use_coupon; ?></label>
      <?php } ?>
      <?php if ($voucher_status) { ?>
       <?php if ($next == 'voucher') { ?>
          <input type="radio" name="next" value="voucher" id="use_voucher" checked="checked" />
          <?php } else { ?>
          <input type="radio" name="next" value="voucher" id="use_voucher" />
          <?php } ?>
       <label for="use_voucher"><?php echo $text_use_voucher; ?></label>
      <?php } ?>
      <?php if ($reward_status) { ?>
       <?php if ($next == 'reward') { ?>
          <input type="radio" name="next" value="reward" id="use_reward" checked="checked" />
          <?php } else { ?>
          <input type="radio" name="next" value="reward" id="use_reward" />
          <?php } ?>
       <label for="use_reward"><?php echo $text_use_reward; ?></label>
      <?php } ?>
      <?php if ($shipping_status) { ?>
       <?php if ($next == 'shipping') { ?>
          <input type="radio" name="next" value="shipping" id="shipping_estimate" checked="checked" />
          <?php } else { ?>
          <input type="radio" name="next" value="shipping" id="shipping_estimate" />
          <?php } ?>
       <label for="shipping_estimate"><?php echo $text_shipping_estimate; ?></label>
      <?php } ?>
  </div>
  <style type="text/css">
.cart-module .ui-select .ui-btn-text, .ui-selectmenu .ui-btn-text  {
    display: block;
}
 </style>
  <div class="cart-module">
    <div id="coupon" class="content" style="display: <?php echo ($next == 'coupon' ? 'block' : 'none'); ?>;">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" data-ajax="false">
        <?php echo $entry_coupon; ?>&nbsp;
        <input type="text" name="coupon" value="<?php echo $coupon; ?>" />
        <input type="hidden" name="next" value="coupon" />
        &nbsp;
        <input type="submit" value="<?php echo $button_coupon; ?>" class="button" />
      </form>
    </div>
    <div id="voucher" class="content" style="display: <?php echo ($next == 'voucher' ? 'block' : 'none'); ?>;">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" data-ajax="false">
        <?php echo $entry_voucher; ?>&nbsp;
        <input type="text" name="voucher" value="<?php echo $voucher; ?>" />
        <input type="hidden" name="next" value="voucher" />
        &nbsp;
        <input type="submit" value="<?php echo $button_voucher; ?>" class="button" />
      </form>
    </div>
    <div id="reward" class="content" style="display: <?php echo ($next == 'reward' ? 'block' : 'none'); ?>;">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" data-ajax="false">
        <?php echo $entry_reward; ?>&nbsp;
        <input type="text" name="reward" value="<?php echo $reward; ?>" />
        <input type="hidden" name="next" value="reward" />
        &nbsp;
        <input type="submit" value="<?php echo $button_reward; ?>" class="button" />
      </form>
    </div>
    
    <div id="shipping" class="content" style="display: <?php echo ($next == 'shipping' ? 'block' : 'none'); ?>;">
      <p><?php echo $text_shipping_detail; ?></p>
 		<span class="required">*</span> <?php echo $entry_country; ?><br/>
         <select name="country_id" data-native-menu="true">
              <option value=""><?php echo $text_select; ?></option>
              <?php foreach ($countries as $country) { ?>

              <?php if ($country['country_id'] == $country_id) { ?>
              <option value="<?php echo $country['country_id']; ?>" selected="selected"><?php echo $country['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $country['country_id']; ?>"><?php echo $country['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select>
            
            <br/>
            
            <!--<span class="required">*</span> <?php echo $entry_zone; ?><br/>
          	<select name="zone_id">
            </select>-->
            
            
            <div id="cart_shipping_zone_id">
  		<span class="required">*</span> <?php echo $entry_zone; ?>
        <select name="zone_id" class="large-field" data-native-menu="true">
		   <option value=""><?php echo $text_select; ?></option>
	        <?php foreach ($zones as $zone) { ?>
	        <?php if ($zone['zone_id'] == $zone_id) { ?>
		        <option value="<?php echo $zone['zone_id']; ?>" selected="selected"><?php echo $zone['name']; ?></option>
	        <?php } else { ?>
		        <option value="<?php echo $zone['zone_id']; ?>"><?php echo $zone['name']; ?></option>
	        <?php } ?>
	        <?php } ?>
	      </select><br />    
		</div>
            
            
            <br/>
          <span id="postcode-required"  class="required">*</span> <?php echo $entry_postcode; ?><br/>
          <input type="text" name="postcode" value="<?php echo $postcode; ?>" /><br/>
   
      <input type="button" value="<?php echo $button_quote; ?>" id="button-quote" class="button" />
    </div>
  </div>
    <?php } ?>
    
  <ul data-role="listview" style="margin-bottom:15px; margin-top:15px;" data-divider-theme="d">
       <?php foreach ($totals as $total) { ?>
       <li data-role="list-divider" style="text-align:right; padding-top:1px; padding-bottom:2px;" ><h3><b><?php echo $total['title']; ?>:</b>
       <?php echo $total['text']; ?></h3></li>
        <?php } ?>
      </ul>
  
  <a href="<?php echo $checkout; ?>" class="button" data-role="button" data-inline="true" data-theme="b" rel="external"><span><?php echo $button_checkout; ?></span></a>
  <a href="<?php echo $continue; ?>" class="button" data-role="button" rel="external"><span><?php echo $button_shopping; ?></span></a>

<?php echo $content_bottom; ?>
</div>
</div>
<script type="text/javascript"><!--
function refresh_zone(){
$('#cart_shipping_zone_id span.ui-btn-text').html('<?php echo $text_select; ?>');
$('#cart_shipping_zone_id select[name=\'zone_id\']').empty();
}

$('input[name=\'next\']').bind('change', function() {
	$('.cart-module > div').hide();
	
	if ($('#use_coupon:checked').val() == 'coupon') {	       
	$('#coupon').show();
	}
	if ($('#use_voucher:checked').val() == 'voucher') {	       
	$('#voucher').show();
	}
	if ($('#use_reward:checked').val() == 'reward') {	       
	$('#reward').show();
	}
	if ($('#shipping_estimate:checked').val() == 'shipping') {	       
	$('#shipping').show();
	}
	
	//$('#' + this.value).show();
});


/*$('input[name=\'next\']:checked').trigger('change');*/

//--></script>
<?php if ($shipping_status) { ?>
<script type="text/javascript"><!--
$('#button-quote').live('click', function() {


	$.ajax({
		url: 'index.php?route=checkout/cart/quote',
		type: 'post',
		data: 'country_id=' + $('select[name=\'country_id\']').val() + '&zone_id=' + $('select[name=\'zone_id\']').val() + '&postcode=' + encodeURIComponent($('input[name=\'postcode\']').val()),
		dataType: 'json',		
		beforeSend: function() {
			$('#button-quote').attr('disabled', true);
			$('#button-quote').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
		},
		complete: function() {
			$('#button-quote').attr('disabled', false);
			$('.wait').remove();
		},		
		success: function(json) {
			$('.success, .warning, .attention, .error').remove();			
						
			if (json['error']) {
				if (json['error']['warning']) {
					$('#notification').html('<div class="warning" style="display: none;">' + json['error']['warning'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
					
					$('.warning').fadeIn('slow');
					
					$('html, body').animate({ scrollTop: 0 }, 'slow'); 
				}	
							
				if (json['error']['country']) {
					$('select[name=\'country_id\']').after('<span class="error">' + json['error']['country'] + '</span>');
				}	
				
				if (json['error']['zone']) {
					$('select[name=\'zone_id\']').after('<span class="error">' + json['error']['zone'] + '</span>');
				}
				
				if (json['error']['postcode']) {
					$('input[name=\'postcode\']').after('<span class="error">' + json['error']['postcode'] + '</span>');
				}					
			}
			
			if (json['shipping_method']) {
				html  = '<h2><?php echo $text_shipping_method; ?></h2>';
				html += '<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" data-ajax="false">';
				html += '<table class="radio">';
				
				for (i in json['shipping_method']) {
					html += '<tr>';
					html += '  <td colspan="3"><b>' + json['shipping_method'][i]['title'] + '</b></td>';
					html += '</tr>';
				
					if (!json['shipping_method'][i]['error']) {
						for (j in json['shipping_method'][i]['quote']) {
							html += '<tr class="highlight">';
							
							if (json['shipping_method'][i]['quote'][j]['code'] == '<?php echo $shipping_method; ?>') {
								html += '<td><input type="radio" name="shipping_method" value="' + json['shipping_method'][i]['quote'][j]['code'] + '" id="' + json['shipping_method'][i]['quote'][j]['code'] + '" checked="checked" /></td>';
							} else {

								html += '<td><input type="radio" name="shipping_method" value="' + json['shipping_method'][i]['quote'][j]['code'] + '" id="' + json['shipping_method'][i]['quote'][j]['code'] + '" /></td>';
							}
								

							html += '  <td><label for="' + json['shipping_method'][i]['quote'][j]['code'] + '">' + json['shipping_method'][i]['quote'][j]['title'] + '</label></td>';
							html += '  <td style="text-align: right;"><label for="' + json['shipping_method'][i]['quote'][j]['code'] + '">' + json['shipping_method'][i]['quote'][j]['text'] + '</label></td>';
							html += '</tr>';
						}		
					} else {
						html += '<tr>';
						html += '  <td colspan="3"><div class="error">' + json['shipping_method'][i]['error'] + '</div></td>';
						html += '</tr>';						
					}
				}
				
				html += '  </table>';
				html += '  <br />';
				html += '  <input type="hidden" name="next" value="shipping" />';
				
				<?php if ($shipping_method) { ?>
				html += '  <input type="submit" value="<?php echo $button_shipping; ?>" id="button-shipping" class="button" />';	
				<?php } else { ?>
				html += '  <input type="submit" value="<?php echo $button_shipping; ?>" id="button-shipping" class="button" disabled="disabled" />';	
				<?php } ?>
				
				html += '</form>';
				
				$.colorbox({
					overlayClose: true,
					opacity: 0.5,
					width: '600px',
					height: '400px',
					href: false,
					html: html
				});
				
				$('input[name=\'shipping_method\']').bind('change', function() {
					$('#button-shipping').attr('disabled', false);
				});
			}
		}
	});
});
//--></script> 
<script type="text/javascript"><!--
$('select[name=\'country_id\']').bind('change', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/country&country_id=' + this.value,
		dataType: 'json',
		beforeSend: function() {
			$('select[name=\'country_id\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
		},
		complete: function() {
			$('.wait').remove();
		},			
		success: function(json) {
			if (json['postcode_required'] == '1') {
				$('#postcode-required').show();
			} else {
				$('#postcode-required').hide();
			}
			
			html = '<option value=""><?php echo $text_select; ?></option>';
			
			if (json['zone'] != '') {
				for (i = 0; i < json['zone'].length; i++) {
        			html += '<option value="' + json['zone'][i]['zone_id'] + '"';
	    			
					if (json['zone'][i]['zone_id'] == '<?php echo $zone_id; ?>') {
	      				html += ' selected="selected"';
	    			}
	
	    			html += '>' + json['zone'][i]['name'] + '</option>';
				}
			} else {
				html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
			}
			
			$('select[name=\'zone_id\']').html(html);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$('select[name=\'country_id\']').trigger('change');
//--></script>
<?php } ?>
<?php echo $footer; ?>