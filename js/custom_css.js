$ = jQuery.noConflict();

/*  upload a picture wp_enqueue_media()   */
$(function () {
    var updateCSS = function () {
       $('#custom_css').val(editor.getSession().getValue() ) ;
 }
  $('#sunset_custom_css').submit(updateCSS);
});

var editor = ace.edit("customCSS");
editor.setTheme("ace/theme/monokai"); /* edit became dark background */
editor.getSession().setMode("ace/mode/css"); /* mode css with colors */

//sunset_custom_css custom_css