let table;
$(document).ready(function () {
    table = $("#portfolios-table")
        .DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "/admin/portfolios",
            createdRow,
            columns: [
                {
                    name: "title",
                    data: "title_html",
                },
                {
                    name: "image",
                    data: "image_html",
                },
                {
                    name: "product_id",
                    data: "product_id_html",
                },
                {
                    data: "action_html",
                },
            ],
        })
        .columns.adjust()
        .responsive.recalc();
});
