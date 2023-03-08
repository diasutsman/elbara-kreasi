let trContent;

async function update(event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const tr = event.target.closest("tr");
    const btnUpdate = tr.querySelector(".btn-update");
    const btnCancel = tr.querySelector(".btn-cancel");

    /* Loading State */
    btnUpdate.innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-clockwise h-5 w-5" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
      <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
    </svg>
    `;
    btnUpdate.disabled = true;
    btnUpdate.classList.remove("bg-green-600", "hover:bg-green-700");
    btnUpdate.classList.add("bg-gray-800", "hover:bg-gray-900");
    btnUpdate.querySelector("svg").classList.add("animate-spin");

    btnCancel.classList.add('hidden');
    /* End Loading State */

    console.log([...formData.entries()]);

    try {
        const data = await fetch(event.target.action, {
            method: "POST",
            body: formData,
        })
            .then((response) => {
                if (!response.ok)return response.text().then((text) => {throw new Error(text)});
                return response.text();
            })
            .then((data) => data)
        tr.innerHTML = data;
    } catch (error) {
        const obj = JSON.parse(error.message)
        Swal.fire(obj['error'], "", "error")
        tr.innerHTML = trContent;
    }
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

    const btnAdd = event.target.querySelector(".btn-add");
    const { innerHTML: btnAddContent } = btnAdd;
    const classes = btnAdd.getAttribute("class");

    btnAdd.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-clockwise h-5 w-5" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
        </svg>
        <p>Adding...</p>
    `;
    btnAdd.disabled = true;
    btnAdd.classList.remove("bg-green-600", "hover:bg-green-700");
    btnAdd.classList.add("bg-gray-800", "hover:bg-gray-900");
    btnAdd.querySelector("svg").classList.add("animate-spin");

    try {
        await fetch(event.target.action, {
            method: "POST",
            body: new FormData(event.target),
        });

        btnAdd.innerHTML = btnAddContent;
        btnAdd.disabled = false;
        btnAdd.setAttribute("class", classes);

        table.ajax.reload();
    } catch (error) {}
}
