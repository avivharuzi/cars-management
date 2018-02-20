"use strict";

$(document).ready(function() {
    $(".icon-edit").on("click", function() {
        $(this).parent().next().show();
    });
});

$(document).ready(function() {
    $(".cancel-edit").on("click", function() {
        $(this).parent().hide();
    });
});
