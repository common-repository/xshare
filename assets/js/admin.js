/*
 * @package xshare
 * @author rainastudio
 * @version 1.0.1
*/
(function( $ ) {
    $(".xshare #rs_plugin_save").click(function(event){
        event.preventDefault();
        $('.xshare #submit').click();
    });
})( jQuery );