$(document).ready(function () {
    var store_id = $(".navigation").find(".active").data("id");
    console.log(store_id);
    $(".filter-btn").on("click", function () {
        $(".filter-cnt").stop().slideToggle();
    });

    $(".form-check-input").change(function () {
        var checkedToppings = [];
        $(".form-check-input:checked").each(function () {
            checkedToppings.push($(this).val());
        });
        // console.log(checkedToppings);

        $.ajax({
            url: "/milk-tea-store/public/filter",
            type: "GET",
            data: { checkedToppings: checkedToppings, store_id },
            success: function (response) {
                view = response.view;
                $(".main-cnt-bot").html(view);
            },
            error: function (xhr, status, error) {
                console.log("Error:", error);
            },
        });
    });

    $("#sort-option").change(function () {
        var sort = $(this).val();
        // console.log("Selected value:", selectedValue);

        $.ajax({
            url: "/milk-tea-store/public/sort",
            type: "GET",
            data: { sort: sort, store_id },
            success: function (response) {
                view = response.view;
                $(".main-cnt-bot").html(view);
            },
            error: function (xhr, status, error) {
                console.log("Error:", error);
            },
        });
    });
});
