let categoryTable;
$(document).ready(function () {
    categoryTable = $("#category-table")
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

async function update(event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const tr = event.target.closest("tr");

    console.log([...formData.entries()]);

    await fetch(event.target.action, {
        method: tr.querySelector('input[name="_method"]').value,
        body: new URLSearchParams(formData),
    })
        .then((response) => response.text())
        .then((data) => console.log(data));
    categoryTable.ajax.reload(null, false);
}

async function onEdit(event) {
    event.preventDefault();

    const tr = event.target.closest("tr");

    const btnDelete = tr.querySelector(".btn-delete");
    const btnEdit = tr.querySelector(".btn-edit");
    const btnUpdate = tr.querySelector(".btn-update");
    const btnCancel = tr.querySelector(".btn-cancel");

    btnDelete.classList.add("hidden");
    btnEdit.classList.add("hidden");

    btnUpdate.classList.remove("hidden");
    btnCancel.classList.remove("hidden");

    const inputs = [...tr.querySelectorAll("input")].filter(
        (input) => input.closest("form") === null && !input.name.startsWith('_')
    );

    inputs.forEach(
        (input) => input.disabled = false
    );
    inputs[0].focus();
    inputs[0].selectionStart = inputs[0].selectionEnd = 10000;
}

async function onCancel() {
    categoryTable.ajax.reload(null, false);
}

async function onDelete(event) {
    event.preventDefault();
    const result = await Swal.fire({
        title: "Do you want to delete data?",
        showDenyButton: true,
        confirmButtonText: "Delete",
        denyButtonText: `Don't delete`,
    }).then((result) => result);

    if (result.isDenied || result.isDismissed) {
        Swal.fire("Data not deleted", "", "info");
        return;
    }

    await fetch(event.target.action, {
        method: event.target.querySelector('input[name="_method"]').value,
        body: new URLSearchParams(new FormData(event.target)),
    });

    Swal.fire("Successfully delete data!", "", "success");

    categoryTable.ajax.reload(null, false);
}

function previewImage(event) {
    const image = event.target;
    const imgPreview = event.target.closest("td").querySelector("img");
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}

function uploadImage(form) {
    console.log(
        [...form.querySelectorAll("input")].map((input) => [
            input.name,
            input.value,
        ])
    );

    fetch(`/admin/categories/${form.dataset.slug}`, {
        method: "PUT",

        body: new FormData(form), // still page expired 419,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        }, // when i add this, it says method not allowed for `/admin/categories` but it is /admin/categories/*slug* so it should be allowed
    });
}
