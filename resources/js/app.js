require("./bootstrap");

$(document).on("click", ".list-survey li", function() {
    $parentId = $(this)
        .closest("ul")
        .attr("id");

    $("#" + $parentId + " li").removeClass("active");

    $(this).addClass("active");
});
