$(document).ready(function() {
    $(".login").click(function() {
        $(".loginHome").show();
    });
    $(".closelogin").click(function() {
        $(".loginHome").hide();
    });
    $("#recoveryHome").click(function() {
        $(".loginHome").hide();
        $(".recoveryHome").show();
    });
    $(".closerecovery").click(function() {
        $(".recoveryHome").hide();
    });
    $(".closecreate").click(function() {
        $(".createHome").hide();
    });
    $("#LoginForm_username").focus(function() {
        $(".infodialog").css("visibility", "visible");
    });
    $("#LoginForm_username").focusout(function() {
        $(".infodialog").css("visibility", "hidden");
    });
    $("#LoginForm_password").focus(function() {
        $(".infodialog1").css("visibility", "visible");
    });
    $("#LoginForm_password").focusout(function() {
        $(".infodialog1").css("visibility", "hidden");
    });
    $('#RecoveryPassword_email').focus(function() {
        $(".infodialog3").css("visibility", "visible");
    });
    $('#RecoveryPassword_email').focusout(function() {
        $(".infodialog3").css("visibility", "hidden");
    });
    $(".singin").click(function() {
        $(".createHome").show();
    });
});