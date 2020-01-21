require("./bootstrap");

$("input[type=radio]").each(function() {
    if ($(this).attr("checked")) {
        $(this)
            .parent()
            .addClass("active");
    }
});

$(document).on("click", ".list-survey li", function() {
    $parentId = $(this)
        .closest("ul")
        .attr("id");

    $("#" + $parentId + " li").removeClass("active");

    $(this).addClass("active");
});
