let table;
$(document).ready(function () {
    table = $("#category-table")
        .DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "/admin/categories",
            columns: [
                {
                    data: "name",
                    name: "name",
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
