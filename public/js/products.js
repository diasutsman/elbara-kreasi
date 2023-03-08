let table;
$(document).ready(function () {
    table = $("#products-table")
        .DataTable({
            responsive: true,
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
                    data: "action",
                    name: "action",
                },
            ],
        })
        .columns.adjust()
        .responsive.recalc();
});
