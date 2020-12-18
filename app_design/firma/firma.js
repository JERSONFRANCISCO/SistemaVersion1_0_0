$(function () {
        $('#colors_sketch').sketch();
        $(".tools a").eq(0).attr("style", "color:#000");
        $(".tools a").click(function () {
            $(".tools a").removeAttr("style");
            $(this).attr("style", "color:#000");
        });
        $("#btnSave").bind("click", function () {
            var base64 = $('#colors_sketch')[0].toDataURL();
            $("#imgCapture").attr("src", base64);
            $("#imgCapture").show();
        });
    });