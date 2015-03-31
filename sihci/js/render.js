$(document).ready(function() {
    $("img#logocuentas2").click(function() {
        $(".loginHome").show();
    });
    $(".closelogin").click(function() {
        $(".loginHome").hide();
    });
    $(".closerecovery").click(function() {
        $(".recoverypass").hide();
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
});