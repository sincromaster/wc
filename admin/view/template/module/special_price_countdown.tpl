<?php echo $header; ?>

<script type="text/javascript" src="view/javascript/jquery/jquery.lwtCountdown-1.0.js"></script>
<script type="text/javascript" src="view/javascript/jquery/misc.js"></script>
<link rel="stylesheet" type="text/css" href="view/stylesheet/countdown.css" />
<script type="text/javascript" src="view/javascript/jquery/jquery.countdown.js"></script>


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
    <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
  </div>
  <div class="content">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
	  <table class="form">
		<?php foreach ($languages as $language) { ?>
            <tr>
				<td class="left"><?php echo $text_heading_title; ?></td>
				<td class="left"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <input type="text" name="special_price_countdown_heading_title_<?php echo $language['language_id'];?>" value="<?php echo $box_heading_title[$language['language_id']]; ?>" size="40" /></td>
			</tr>
        <?php } ?>
	  </table>
	
      <table id="module" class="list">
        <thead>
          <tr>
            <td class="left"><?php echo $entry_digit_wh; ?></td>
			<td class="left"><?php echo $entry_hours_bs; ?></td>
			<td class="left"><?php echo $entry_show_days; ?></td>
            <td class="left"><?php echo $entry_layout; ?></td>
            <td class="left"><?php echo $entry_position; ?></td>
            <td class="left"><?php echo $entry_status; ?></td>
            <td class="right"><?php echo $entry_sort_order; ?></td>
            <td></td>
          </tr>
        </thead>
        <?php $module_row = 0; ?>
        <?php foreach ($modules as $module) { ?>
        <tbody id="module-row<?php echo $module_row; ?>">
          <tr>
            <td class="left"><input type="text" name="special_price_countdown_module[<?php echo $module_row; ?>][digit_width]"  value="<?php echo $module['digit_width']; ?>"  readonly size="3" />
				<input type="text" name="special_price_countdown_module[<?php echo $module_row; ?>][digit_height]"  value="<?php echo $module['digit_height']; ?>"  onkeyup="calcDigitDimension($(this).val(), <?php echo $module_row; ?>);" size="3" />
			</td>
			</td>
			<td class="left"><input type="text" name="special_price_countdown_module[<?php echo $module_row; ?>][hours_bs]"  value="<?php echo $module['hours_bs']; ?>" size="3" /></td>
			<td class="left"><select name="special_price_countdown_module[<?php echo $module_row; ?>][show_days]">
                <?php if ($module['show_days']) { ?>
                <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                <option value="0"><?php echo $text_no; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_yes; ?></option>
                <option value="0" selected="selected"><?php echo $text_no; ?></option>
                <?php } ?>
              </select></td>
            <td class="left"><select name="special_price_countdown_module[<?php echo $module_row; ?>][layout_id]">
                <?php foreach ($layouts as $layout) { ?>
                <?php if ($layout['layout_id'] == $module['layout_id']) { ?>
                <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
            <td class="left"><select name="special_price_countdown_module[<?php echo $module_row; ?>][position]">
                <?php if ($module['position'] == 'content_top') { ?>
                <option value="content_top" selected="selected"><?php echo $text_content_top; ?></option>
                <?php } else { ?>
                <option value="content_top"><?php echo $text_content_top; ?></option>
                <?php } ?>
                <?php if ($module['position'] == 'content_bottom') { ?>
                <option value="content_bottom" selected="selected"><?php echo $text_content_bottom; ?></option>
                <?php } else { ?>
                <option value="content_bottom"><?php echo $text_content_bottom; ?></option>
                <?php } ?>
                <?php if ($module['position'] == 'column_left') { ?>
                <option value="column_left" selected="selected"><?php echo $text_column_left; ?></option>
                <?php } else { ?>
                <option value="column_left"><?php echo $text_column_left; ?></option>
                <?php } ?>
                <?php if ($module['position'] == 'column_right') { ?>
                <option value="column_right" selected="selected"><?php echo $text_column_right; ?></option>
                <?php } else { ?>
                <option value="column_right"><?php echo $text_column_right; ?></option>
                <?php } ?>
              </select></td>
            <td class="left"><select name="special_price_countdown_module[<?php echo $module_row; ?>][status]">
                <?php if ($module['status']) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
            <td class="right"><input type="text" name="special_price_countdown_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
            <td class="left"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
          </tr>
        </tbody>
        <?php $module_row++; ?>
        <?php } ?>
        <tfoot>
          <tr>
            <td colspan="7"></td>
            <td class="left"><a onclick="addModule();" class="button"><?php echo $button_add_module; ?></a></td>
          </tr>
        </tfoot>
      </table>
    </form>
  </div>
</div>

<script type="text/javascript"><!--
var module_row = <?php echo $module_row; ?>;

function addModule() {	
	html  = '<tbody id="module-row' + module_row + '">';
	html += '  <tr>'; 
	html += '    <td class="left"><input type="text" name="special_price_countdown_module[' + module_row + '][digit_width]" value="53" readonly size="3" class="' + module_row +'" />';
	html += '    <input type="text" name="special_price_countdown_module[' + module_row + '][digit_height]" value="77" size="3" class="' + module_row +'" onkeyup="calcDigitDimension($(this).val(), $(this).attr(\'class\'));" /></td>';
	html += '    <td class="left"><input type="text" name="special_price_countdown_module[' + module_row + '][hours_bs]" value="24" size="3" />';
	html += '    <td class="left"><select name="special_price_countdown_module[' + module_row + '][show_days]">';
    html += '      <option value="1" selected="selected"><?php echo $text_yes; ?></option>';
    html += '      <option value="0"><?php echo $text_no; ?></option>';
    html += '    </select></td>'
	html += '    <td class="left"><select name="special_price_countdown_module[' + module_row + '][layout_id]">';
	<?php foreach ($layouts as $layout) { ?>
	<?php if ($layout['layout_id'] == 2) { ?>
	html += '      <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>';
	<?php } else { ?>
	html += '      <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>';
	<?php } ?>
	<?php } ?>
	html += '    </select></td>';
	html += '    <td class="left"><select name="special_price_countdown_module[' + module_row + '][position]">';
	html += '      <option value="content_top"><?php echo $text_content_top; ?></option>';
	html += '      <option value="content_bottom"><?php echo $text_content_bottom; ?></option>';
	html += '      <option value="column_left"><?php echo $text_column_left; ?></option>';
	html += '      <option value="column_right"><?php echo $text_column_right; ?></option>';
	html += '    </select></td>';
	html += '    <td class="left"><select name="special_price_countdown_module[' + module_row + '][status]">';
    html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
    html += '      <option value="0"><?php echo $text_disabled; ?></option>';
    html += '    </select></td>';
	html += '    <td class="right"><input type="text" name="special_price_countdown_module[' + module_row + '][sort_order]" value="" size="3" /></td>';
	html += '    <td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#module tfoot').before(html);
	
	module_row++;
}
//--></script>

<script type="text/javascript">
function calcDigitDimension(height, row){
	if (isNaN(height)){
		width = 53;  // default value
		height = 77;
	}
	
	height = Math.abs(height);
	$('input[name=\'special_price_countdown_module[' + row + '][digit_height]\']').val( height );	
	
	var width = Math.round(53 / (4619 / (height * 60)));
    $('input[name=\'special_price_countdown_module[' + row + '][digit_width]\']').val(width);	
}
</script>


<?php echo $footer; ?>