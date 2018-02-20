"use strict";

$(function () {
    let progress = $("#progress-bar");
    let main = $("#main-progress");

    $("#upload").click(function () {
        if ($("#file").val() !== "") {
            $("#uploadForm").ajaxSubmit({
                beforeSubmit: function () {
                    main.css("display", "block");
                    progress.width("0%");
                    progress.html("0%");
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    progress.width(percentComplete + "%");
                    progress.html(percentComplete + "%");
                },
                success: function () {
                    progress.width("100%");
                    progress.html("100%");
                },
                complete: function () {
                    progress.width("0%");
                    progress.html("0%");
                    main.hide();
                }
            })
        }
    });
});
