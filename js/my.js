
jQuery(document).ready(function () {
    jQuery('.order__form-button').bind("click", function()   {

        var link = $(this);
        var name = jQuery('#name').val();
        var email = jQuery('#email').val();
        var phone = jQuery('#phone').val();
        var street = jQuery('#street').val();
        var home = jQuery('#home').val();
        var part = jQuery('#part').val();
        var appt = jQuery('#appt').val();
        var floor = jQuery('#floor').val();
        var comment = jQuery('#comment').val();

        jQuery('#name').val('');
        jQuery('#email').val('');
        jQuery('#phone').val('');
        jQuery('#street').val('');
        jQuery('#home').val('');
        jQuery('#part').val('');
        jQuery('#appt').val('');
        jQuery('#floor').val('');

        jQuery.ajax({
            url: "my.php",
            type: "POST",
            data: {name: name, email: email, phone: phone, street: street, home: home, part: part, appt: appt, floor: floor, comment: comment},
            dataType: "json",
        });
        return false;
    });
});


