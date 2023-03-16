let table;
$(document).ready(function () {
    table = $("#portfolios-table")
        .DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "/admin/portfolios",
            columns: [
                {
                    data: "title",
                    name: "title",
                },
                {
                    data: "image",
                    name: "image",
                },
                {
                    data: "product_id",
                    name: "product_id",
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
