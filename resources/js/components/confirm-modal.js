$(function () {
    $(".confirm-modal").each(function () {
        $(this).css("display", "flex").hide();
        $(this)
            .find(".close-modal-btn")
            .on("click", () => {
                $(this).fadeOut();
            });
        $(this)
            .find(".confirm-modal-btn")
            .on("click", () => {
                $(this).trigger("modal-confirmed");
                $(this).fadeOut();
            });
    });
    $("button[confirm-modal]").on("click", function () {
        $(`#${$(this).attr("confirm-modal")}`).fadeIn();
    });
});
