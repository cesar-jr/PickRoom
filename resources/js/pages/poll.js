console.log("poll.js");

const clickInput = function () {
    if ($("input:checked").length) {
        $("#btnConfirm").prop("disabled", false);
    } else {
        $("#btnConfirm").prop("disabled", true);
    }
};

$(function () {
    if (!$("#btnConfirm").is(":disabled")) {
        // confirm disabled means can't vote
        clickInput();
        $("input[name=options\\[\\]]").on("click", clickInput);
    }
});
