$(document).ready(function() {

    $('body').keyup(function(e) {
        if (e.which == 27) {
            $(".loginHome").hide();
            $(".recoveryHome").hide();
            $(".createHome").hide();
            $(".glyphicon").css("color", "#1EB9C0");
            $("#yt0").css("background-color", "#0E3152 !important");
            $("#yt0").val("Ingresar a mi cuenta");
            $('[id^=LoginForm_]').val('');

        }
    });
    $("img#logocuentas2").click(function() {
        $(".loginHome").show();
		 $("#login-form").show();
		$(document).mouseup(function (e)
			{
			var container = $("#login-form");

			if (!container.is(e.target) // if the target of the click isn't the container...
				&& container.has(e.target).length === 0) // ... nor a descendant of the container
			{
				container.hide();
				$(".loginHome").hide();
				$('[id^=LoginForm_]').val('');
			}
		});
        $(".glyphicon").css("color", "#1EB9C0");
        $("#yt0").css("background-color", "#0E3152 !important");
        $("#yt0").val("Ingresar a mi cuenta");

    });
    $(".closelogin").click(function() {
        $(".loginHome").hide();
        $(".glyphicon").css("color", "#1EB9C0");
        $("#yt0").css("background-color", "#0E3152 !important");
        $("#yt0").val("Ingresar a mi cuenta");
        $('[id^=LoginForm_]').val('');
    });
    $("#recoveryHome").click(function() {
        $(".loginHome").hide();
        $(".recoveryHome").show();
		 $("#recovery-form").show();
		$(document).mouseup(function (e)
			{
			var container = $("#recovery-form");

			if (!container.is(e.target) // if the target of the click isn't the container...
				&& container.has(e.target).length === 0) // ... nor a descendant of the container
			{
				container.hide();
				$(".recoveryHome").hide();
				$('[id^=RecoveryPassword]').val('');
			}
		});
        $(".glyphicon").css("color", "#1EB9C0");
        $("#yt0").css("background-color", "#0E3152 !important");
        $("#yt0").val("Ingresar a mi cuenta");
    });
    $(".closerecovery").click(function() {
        $(".recoveryHome").hide();
        $(".glyphicon").css("color", "#1EB9C0");
        $("#yt0").css("background-color", "#0E3152 !important");
        $("#yt0").val("Ingresar a mi cuenta");
    });
    $(".closecreate").click(function() {
        $(".createHome").hide();
        $(".glyphicon").css("color", "#1EB9C0");
        $("#yt0").css("background-color", "#0E3152 !important");
        $("#yt0").val("Ingresar a mi cuenta");
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
    $("img#logocuentas").click(function() {
        $(".createHome").show();
		 $("#users-form").show();
		$(document).mouseup(function (e)
			{
			
		});
        $(".glyphicon").css("color", "#1EB9C0");
        $("#yt0").css("background-color", "#0E3152 !important");
        $("#yt0").val("Ingresar a mi cuenta");
    });
});
