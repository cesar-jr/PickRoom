console.log("public-list.js");

const loading = function (loading) {
    if (loading) {
        $("#btnPrev").prop("disabled", true);
        $("#btnNext").prop("disabled", true);
        $("div.loading").show();
        $("#tableList").children(".clone").remove();
    } else {
        $("div.loading").hide();
        if ($("#btnPrev").data("url")) $("#btnPrev").prop("disabled", false);
        if ($("#btnNext").data("url")) $("#btnNext").prop("disabled", false);
    }
};

const loadTable = function ({ search, url } = {}) {
    loading(true);
    axios
        .get(url ?? "/polls/list", {
            params: {
                search,
                type: "public",
            },
        })
        .then((response) => {
            const data = response.data.data;
            if (Array.isArray(data)) {
                const listNode = $("#tableList");
                const mockRow = listNode.find(".original").first();
                data.forEach((value) => {
                    const newRow = mockRow.clone();
                    newRow.addClass("clone").removeClass("original");
                    newRow.find(".question").text(value.question);
                    newRow.find(".votes").text(value.votes_count);
                    newRow.find(".action").attr("href", `/vote/${value.slug}`);
                    newRow.show();
                    listNode.append(newRow);
                });
            }
            $("#from").text(response.data.from ?? "-");
            $("#to").text(response.data.to ?? "-");
            $("#total").text(response.data.total ?? "-");
            $("#btnPrev").data("url", response.data.prev_page_url);
            $("#btnNext").data("url", response.data.next_page_url);
        })
        .catch((reason) => {
            console.log(reason);
            alert("Error!");
        })
        .finally(() => {
            loading(false);
        });
};

const btnNav = function () {
    loadTable({ url: $(this).data("url") });
};

$(function () {
    $("tr.original").hide();
    $("div.loading").show();
    $("#from").text("-");
    $("#to").text("-");
    $("#total").text("-");
    $("#btnPrev").prop("disabled", true).on("click", btnNav);
    $("#btnNext").prop("disabled", true).on("click", btnNav);
    loadTable();
    $("#table-search").on("keypress", function (event) {
        if (event.which == 13) {
            if ($(this).val()) loadTable({ search: $(this).val() });
            else loadTable();
        }
    });
});
