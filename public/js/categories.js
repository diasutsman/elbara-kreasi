let table;
$(document).ready(function () {
    table = $("#categories-table")
        .DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            createdRow,
            ajax: "/admin/categories",
            columns: [
                {
                    data: "name_html",
                },
                {
                    data: "image_html",
                },
                {
                    data: "action_html",
                },
            ],
        })
        .columns.adjust()
        .responsive.recalc();
});
