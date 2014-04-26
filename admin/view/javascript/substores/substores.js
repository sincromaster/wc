$(document).ready(function() {

    if ($('#form-comissoes').length > 0) {

        var objTable = $('table', $('#form-comissoes'));
        var objTrClone = $('tbody tr', objTable).last().clone();

        /**********************************************************************
         *                              Add
         **********************************************************************/
        $('.add', objTable).live('click', function(e) {

            e.preventDefault();

            $('tbody', objTable).append('<tr>' + objTrClone.html() + '</tr>');
        });

        /**********************************************************************
         *                            Remove
         **********************************************************************/
        $('.remove', objTable).live('click', function(e) {

            e.preventDefault();

            if ($('tbody tr', objTable).length > 1) {

                $(this).parents('tr').remove();
            }
        });
    }

    if ($('#form-descontos').length > 0) {

        var objTable = $('table', $('#form-descontos'));
        var objTrClone = $('tbody tr', objTable).last().clone();
        var objSelectProductsClone = $('select[name^=product_id', objTable).last().clone();

        /**********************************************************************
         *                              Add
         **********************************************************************/
        $('.add', objTable).live('click', function(e) {

            e.preventDefault();

            $('tbody', objTable).append('<tr>' + objTrClone.html() + '</tr>');
        });

        /**********************************************************************
         *                            Remove
         **********************************************************************/
        $('.remove', objTable).live('click', function(e) {

            e.preventDefault();

            if ($('tbody tr', objTable).length > 1) {

                $(this).parents('tr').remove();
            }
        });

        /**********************************************************************
         *                            Change
         **********************************************************************/
        $('select[name^=category_id', objTable).live('change', function(e) {

            e.preventDefault();
            var intCategory = $(this).val();

            var objTr = $(this).parents('tr');

            $('select[name^=product_id', objTr).html(objSelectProductsClone.html());
            $('select[name^=product_id', objTr).children('option').each(function() {

                if (intCategory != 0 && $(this).data('category') != intCategory && $(this).text() != 'Todos') {

                    $(this).remove();
                }
            });
        });
    }
});
