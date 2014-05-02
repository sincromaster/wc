$(document).ready(function() {

    jQuery('#txtCep').mask('99999-999');
    jQuery('#txtPlaca').mask('aaa-9999');
    jQuery('#txtUF').mask('aa');
    jQuery('#dtVenctoCNH').mask('99/99/9999');
    jQuery('#dtVenctoSEG').mask('99/99/9999');
    jQuery('#txtCPF, #txtRenavam, #txtKmAtual, #txtKmDia, #txtKmRevisao').keypress(function(e){
        
        return isNumberKey(e);
    })
    jQuery('#dtVenctoCNH, #dtVenctoSEG').datepicker({ dateFormat: 'dd/mm/yy' });
    
    jQuery('form').submit(function(){
        
        var validated = true;
        jQuery('.required', jQuery(this)).each(function(){
            if(jQuery(this).val() == '') {
                
                jQuery(this).addClass('error');
                validated = false;
            }
        });
        return validated;
    });
    
    jQuery('input, select', 'form').focus(function(){
        
        jQuery(this).removeClass('error');
    });
    
    // Tooltip
    $('input, select').hover(function(){
        if(typeof $(this).attr('title') !== 'undefined') {
            $(this).after('<div class="tooltip" style="display: none">' + $(this).attr('title') + '</div>');
            $(this).parent().css({
                position: 'relative'
            });
            $(this).next().fadeIn();
        }
    }, function() {
        
        if(typeof $(this).attr('title') !== 'undefined') {
            $(this).next().fadeOut();
            $(this).next().remove();
        }
    });
});

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}