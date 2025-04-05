$(function () {
    const numToasts = $(".toast").length;
    $(".toast").each(function (index) {
        $(this).css("display", "flex").hide();
        $(this).toggle(600);
        $(this)
            .find(".close-toast-btn")
            .on("click", () => {
                $(this).toggle(600);
            });
        setTimeout(() => {
            if ($(this).is(":visible")) {
                $(this).toggle(600);
            }
        }, (numToasts - index) * 5000);
    });
});
