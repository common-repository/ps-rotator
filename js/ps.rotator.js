jQuery(document).ready(function($){
    $.wait = function( callback, seconds){
        return window.setTimeout( callback, seconds * 1000 );
    }

    var $settingsSaved = $("#settingsSaved");
    $.wait( function(){
        $settingsSaved.fadeOut(500)
    }, 2);
});