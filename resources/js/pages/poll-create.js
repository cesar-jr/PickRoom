const minOptions = 2;

console.log("poll-create.js");

const btnDeleteFn = function () {
    $(this).parents(".clone").remove();
    const list = $("#optionsList").children(".clone");
    list.each(function (index) {
        $(this)
            .find("p.num")
            .text(`${index + 1}`);
        if (list.length <= minOptions) {
            $(this).find(".divDelete").hide();
        }
    });
};

const btnNewOption = function () {
    const newDiv = $("#optionsList").find(".clone").first().clone();
    newDiv.find(".btnDelete").on("click", btnDeleteFn);
    newDiv.find("input[name=answer]").val("");
    newDiv.find("input[name=additional]").val("");
    $("#optionsList").append(newDiv);
    const list = $("#optionsList").children(".clone");
    newDiv.find("p.num").text(`${list.length}`);
    if (list.length > minOptions) {
        list.each(function () {
            $(this).find(".divDelete").show();
        });
    } else {
        list.each(function () {
            $(this).find(".divDelete").hide();
        });
    }
};

$(function () {
    $("#btnNewOption").on("click", btnNewOption);
    $("#optionsList")
        .find(".clone")
        .first()
        .find(".divDelete")
        .hide()
        .find(".btnDelete")
        .on("click", btnDeleteFn);
    // Prepare initial options list
    for (
        let i = $("#optionsList").children(".clone").length;
        i < minOptions;
        i++
    ) {
        btnNewOption();
    }
});
