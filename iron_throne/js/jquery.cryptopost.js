/* ------------------------------------------------------------------------
 Class: jquery.cryptopost.js
 Author: Mehmet INCE - Ayse Bilge Gunduz
 Version: 1.0.0
 ------------------------------------------------------------------------- */
// Include our js encryption library
$(document).ready(function(){

    //Initialize of JSEncryption Object. It uses CRYPT_RSA_ENCRYPTION_PKCS1.
    var crypt = new JSEncrypt();
    // We're setting public_key to cryption class. public_key defined index.php file
    crypt.setPublicKey(public_key);

    // Capture all fomr element
    $('form').on('submit', function (event) {
        // Serialize and encrypt current form of post body
        var encrypted_data = crypt.encrypt($(this).serialize());
        // Delete all post parameters
        $(this).find('input').each(function(index, elm){
            $(this).remove();
        });

        // Append our new encrypted string into to the post body.
        $('<input />').attr('type', 'hidden')
            .attr('name', 'encrypted_data')
            .attr('value', encrypted_data )
            .appendTo($(this));
        // Send it.
    });


});