console.log("result.js");

$(function () {
    $("#end-poll").on("modal-confirmed", function () {
        $("form[id=deactivate]").trigger("submit");
    });
    $("#link-vote").on("click", async function () {
        await navigator.clipboard.writeText($(this).data("link"));
        $(this).hide();
        $("#link-vote-temp").show();
        setTimeout(() => {
            $(this).show();
            $("#link-vote-temp").hide();
        }, 3000);
    });
});
