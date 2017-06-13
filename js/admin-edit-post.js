jQuery(document).ready(function() {
    jQuery('.datepicker').datepicker();

    if(jQuery('#course_day_schedule-repeatable .repeatable-remove').length == 1) {
        jQuery('#course_day_schedule-repeatable .repeatable-remove').hide();
    }

    if(jQuery('#course_night_schedule-repeatable .repeatable-remove').length == 1) {
        jQuery('#course_night_schedule-repeatable .repeatable-remove').hide();
    }

    jQuery('.repeatable-add').click(function() {
        jQuery('.datepicker').datepicker('destroy');//Hacky solution for the problem when cloning jquery-ui-datepicker
        field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
        fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
        jQuery('input', field).val('')
                .attr({ 'name' : function(index, name) {
                        return name.replace(/(\d+)/, function(fullMatch, n) {
                            return Number(n) + 1; //Increment the name
                        });
                    }, 'id' : function(index, id) {
                        return id.replace(/(\d+)/, function(fullMatch, n) {
                            return Number(n) + 1; //Increment the id
                        });
                }});
        field.insertAfter(fieldLocation, jQuery(this).closest('td'))

        if(jQuery(this).closest('td').find('li').length >= 1) {
            jQuery(this).siblings('ul').find('a').show(); //Show Delete button
        }

        jQuery('.datepicker').datepicker(); //Re-initialize again
        return false;
    });
    jQuery('.repeatable-remove').click(function(){
        if(jQuery(this).parent().closest('ul').find('li').length == 2) {
            jQuery(this).parent().closest('ul').find('a').hide(); //Hide Delete button
        }
        jQuery(this).parent().remove();
        return false;
    });
});