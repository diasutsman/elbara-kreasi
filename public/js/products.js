let table;
$(document).ready(function () {
    table = $("#products-table")
        .DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: "/admin/products",
            columns: [
                {
                    data: "name",
                    name: "name",
                },
                {
                    data: "is_best_seller",
                    name: "is_best_seller",
                },
                {
                    data: "image",
                    name: "image",
                },
                {
                    data: "description",
                    name: "description",
                },
                {
                    data: "additional_information",
                    name: "additional_information",
                },
                {
                    data: "price",
                    name: "price",
                },
                {
                    data: "category_id",
                    name: "category_id",
                },
                {
                    data: "action",
                    name: "action",
                },
            ],
        })
        .columns.adjust()
        .responsive.recalc();
});
