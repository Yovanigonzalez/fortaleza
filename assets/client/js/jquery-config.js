$(document).ready(function() {
    var formBackground = $('#form-contact');
    var overlay = $('.overlay-background');
    var openForm = $('#form-button');
    var closeForm = $('#close-form');
    //Variables de Forms.php
    var viewRegisterform = $('.sign-in-form');
    var viewLoginForm = $('.sign-up-form')
 
    openForm.on("click", function() {
        formBackground.fadeIn(500);
        overlay.fadeIn("slow");
    });

    closeForm.on("click", function(){
        formBackground.fadeOut(500);
        overlay.fadeOut("slow");
    });

    //Funciones de Forms.php
    $('.register-button').on("click", function(){
        viewLoginForm.fadeOut("slow");
        viewRegisterform.fadeIn(500);
    });

    $('.login-button').on("click", function(){
        viewRegisterform.fadeOut(200);
        viewLoginForm.fadeIn(200);
    });
});
