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
                    name: "name",
                    data: "name_html",
                },
                {
                    name: "is_best_seller",
                    data: "is_best_seller_html",
                },
                {
                    name: "image",
                    data: "image_html",
                },
                {
                    name: "description",
                    data: "description_html",
                },
                {
                    name: "additional_information",
                    data: "additional_information_html",
                },
                {
                    name: "price",
                    data: "price_html",
                },
                {
                    name: "category_id",
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
