$(function () {
    $("#menuDropdownTrigger").on("click", function () {
        const menuDropdown = $("#menuDropdown");
        if (menuDropdown.hasClass("hidden")) {
            menuDropdown.removeClass("hidden").addClass("block");
        } else {
            menuDropdown.removeClass("block").addClass("hidden");
        }
    });

    $(document).on("click", function (event) {
        // I don't really like this handler, but I don't want to spend more time looking for something better
        if (
            $(event.target).closest("#menuDropdownTrigger").length == 0 &&
            !$("#menuDropdown").hasClass("hidden")
        ) {
            $("#menuDropdown").addClass("hidden");
        }
    });

    $("#menuResponsiveBtn").on("click", function () {
        const menuResponsive = $("#menuResponsive");
        if (menuResponsive.hasClass("hidden")) {
            menuResponsive.removeClass("hidden").addClass("block");
            $(this)
                .find("path.stack")
                .removeClass("inline-flex")
                .addClass("hidden");
            $(this)
                .find("path.x")
                .removeClass("hidden")
                .addClass("inline-flex");
        } else {
            menuResponsive.removeClass("block").addClass("hidden");
            $(this)
                .find("path.stack")
                .removeClass("hidden")
                .addClass("inline-flex");
            $(this)
                .find("path.x")
                .removeClass("inline-flex")
                .addClass("hidden");
        }
    });
});
