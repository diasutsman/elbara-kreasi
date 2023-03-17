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
                    data: "title_html",
                },
                {
                    data: "image_html",
                },
                {
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
