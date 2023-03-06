let trContent;

async function update(event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const tr = event.target.closest("tr");

    console.log([...formData.entries()]);

    const data = await fetch(event.target.action, {
        method: "POST",
        body: formData,
    })
        .then((response) => response.text())
        .then((data) => data);

    tr.innerHTML = data;
}

async function onEdit(event) {
    event.preventDefault();

    const tr = event.target.closest("tr");
    trContent = tr.innerHTML;

    const btnDelete = tr.querySelector(".btn-delete");
    const btnEdit = tr.querySelector(".btn-edit");
    const btnUpdate = tr.querySelector(".btn-update");
    const btnCancel = tr.querySelector(".btn-cancel");

    btnDelete.classList.add("hidden");
    btnEdit.classList.add("hidden");

    btnUpdate.classList.remove("hidden");
    btnCancel.classList.remove("hidden");

    const inputs = [...tr.querySelectorAll("input")].filter(
        (input) => input.closest("form") === null && !input.name.startsWith("_")
    );

    inputs.forEach((input) => (input.disabled = false));
    inputs[0].focus();
    inputs[0].selectionStart = inputs[0].selectionEnd = 10000;
}

async function onCancel(event) {
    event.target.closest("tr").innerHTML = trContent;
}

async function onDelete(event) {
    event.preventDefault();
    const result = await Swal.fire({
        title: "Do you want to delete data?",
        showDenyButton: true,
        confirmButtonText: "Delete",
        denyButtonText: `Don't delete`,
    }).then((result) => result);

    if (result.isDenied || result.isDismissed) return;

    await fetch(event.target.action, {
        method: event.target.querySelector('input[name="_method"]').value,
        body: new URLSearchParams(new FormData(event.target)),
    });

    Swal.fire("Successfully delete data!", "", "success");

    table.ajax.reload(null, false);
}

function previewImage(event) {
    const image = event.target;
    const imgPreview = event.target.closest("label").querySelector("img");
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}

async function onAdd(event) {
    event.preventDefault();

    try {
        await fetch(event.target.action, {
            method: "POST",
            body: new FormData(event.target),
        })

        table.ajax.reload();
    } catch (error) {
      
    }
}
