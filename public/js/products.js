let table;
$(document).ready(function () {
    table = $("#products-table")
        .DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            createdRow,
            ajax: "/admin/products",
            columns: [
                {
                    data: "name_html",
                },
                {
                    data: "is_best_seller_html",
                },
                {
                    data: "image_html",
                },
                {
                    data: "description_html",
                },
                {
                    data: "additional_information_html",
                },
                {
                    data: "price_html",
                },
                {
                    data: "category_id_html",
                },
                {
                    data: "action_html",
                },
            ],
        })
        .columns.adjust()
        .responsive.recalc();
});
