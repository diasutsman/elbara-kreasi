// data table
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

    // const tr = event.target.closest("tr");
    // console.log(
    //     [...tr.querySelectorAll("input")]
    //         .filter(
    //             (input) =>
    //                 input.closest("form") === null && input.type !== "hidden"
    //         )
    //         .map((input) => [input.name, input.value])
    // );

    // const formData = [
    //     ...document.querySelectorAll(`input[form=${event.target.id}]`),
    //     tr.querySelector('input[name="_method"]'),
    //     tr.querySelector('input[name="_token"]'),
    // ].reduce((formData, { name, value }) => {
    //     formData.append(name, value);
    //     return formData;
    // }, new FormData());

    console.log([...(new FormData(event.target)).entries()]);

    await fetch(event.target.action, {
        method: 'PUT',
        body: new FormData(event.target),
    })
        .then((response) => response.text())
        .then((data) => console.log(data));
    categoryTable.ajax.reload(null, false);

    // $.ajax({
    //     url: event.target.action,
    //     type: "PUT",
    //     processData: false,
    //     contentType: false,
    //     data: formData,
    //     success: function (data) {
    //         console.log(data);
    //         categoryTable.ajax.reload(null, false);
    //     },
    // });
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
        (input) => input.closest("form") === null && input.type !== "hidden"
    );

    // console.log({ inputs });

    inputs.forEach(
        (input) =>
            (input.disabled = input.type == "text" ? false : input.disabled)
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

// document.addEventListener('trix-file-accept', (e) => {
//     e.preventDefault();
// })

function previewImage(event) {
    const image = event.target;
    const imgPreview = event.target.closest("td").querySelector("img");
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };

    // uploadImage(event.target.closest("#form-image"));
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
        // body: new URLSearchParams(new FormData(form)), // method unsupported eventhough it is literally the right url but laravel just didn't read the last bit for some reason
        body: new FormData(form), // still page expired 419,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        }, // when i add this, it says method not allowed for `/admin/categories` but it is /admin/categories/*slug* so it should be allowed
    });
    // .then(response => response.text())
    // .then(data => console.log(data))
}
