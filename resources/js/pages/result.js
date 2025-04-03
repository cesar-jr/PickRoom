console.log("result.js");

$(function () {
    $("#end-poll").on("modal-confirmed", function () {
        $("form[id=deactivate]").trigger("submit");
    });
});
