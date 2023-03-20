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
                    name: "name",
                    data: "name_html",
                },
                {
                    name: "image",
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
