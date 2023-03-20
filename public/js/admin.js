function htmlDecode(input) {
    const doc = new DOMParser().parseFromString(input, "text/html");
    return doc.documentElement.textContent;
}

String.prototype.simplified = function () {
    const text = this.replace(/<[^>]*>/g, "");

    return text.slice(0, 20) + (text.slice(20) && "...");
};

function createdRow(row, data, dataIndex) {
    const jsonString = JSON.stringify(
        Object.keys(data).reduce(
            (obj, key) => (key.endsWith("_html") ? delete obj[key] : null, obj),
            { ...data }
        )
    );
    $(row).attr(
        "x-data",
        `{
            data: ${jsonString},
            ...EditAction(),
            ...CancelAction(),
            ...UpdateAction(),
            ...DeleteAction(),
        }
        `
    );
}

function UpdateAction() {
    return {
        isUpdating: false,
        async onUpdate(event) {
            const formData = new FormData(event.target);

            console.log([...formData.entries()]);

            this.isUpdating = true;

            try {
                const data = await fetch(event.target.action, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                })
                    .then((response) => {
                        if (!response.ok)
                            return response.text().then((text) => {
                                throw new Error(text);
                            });
                        return response.json();
                    })
                    .then((data) => data);
                Object.keys(data).forEach((key) => {
                    this.data[key] = data[key];
                });
                
                this.isUpdating = false;
                this.editMode = false;
            } catch (error) {
                console.error(error.message);
                const obj = JSON.parse(error.message);
                this.onCancel()
                this.isUpdating = false;
                
                Swal.fire(obj["message"], "", "error");

            }
        },
    };
}

function EditAction() {
    return {
        editMode: false,
        async onEdit() {
            this.editMode = true;

            Object.keys(this.data).forEach((key) => {
                this.data[key + "_temp"] = this.data[key];
            });
        },
    };
}

function CancelAction() {
    return {
        onCancel() {

            Object.keys(this.data).forEach((key) => {
                if (key.endsWith("_temp")) {
                    this.data[key.replace(/_temp$/, "")] = this.data[key];
                }
            });

            this.editMode = false;
        },
    };
}

function DeleteAction() {
    return {
        isDeleting: false,
        async onDelete(event) {
            event.preventDefault();
            const result = await Swal.fire({
                title: "Do you want to delete data?",
                showDenyButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Don't delete`,
            }).then((result) => result);

            if (result.isDenied || result.isDismissed) return;
            this.isDeleting = true;

            await fetch(event.target.action, {
                method: event.target.querySelector('input[name="_method"]')
                    .value,
                body: new URLSearchParams(new FormData(event.target)),
            });

            table.ajax.reload(() => {
                Swal.fire("Successfully delete data!", "", "success");
            }, false);
        },
    };
}

function ImagePreview(placeholder) {
    return {
        src: placeholder,
        previewImage(event) {
            const image = event.target;
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = (oFREvent) => {
                this.src = oFREvent.target.result;
            };
        },
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
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok)
                    return response.text().then((text) => {
                        throw new Error(text);
                    });
                return response.text();
            })
            .then((data) => console.log(data));

        table.ajax.reload();
    } catch (error) {
        console.error(error.message);
        const obj = JSON.parse(error.message);
        Swal.fire(obj["message"], "", "error");
    } finally {
        btnAdd.innerHTML = btnAddContent;
        btnAdd.disabled = false;
        btnAdd.setAttribute("class", classes);
    }
}

/* 
    Elements related code
*/
document.addEventListener("trix-file-accept", (e) => {
    e.preventDefault();
});

function openModal(key) {
    document.getElementById(key).showModal();
    document.body.setAttribute("style", "overflow: hidden;");
    document.getElementById(key).children[0].scrollTop = 0;
    document.getElementById(key).children[0].classList.remove("opacity-0");
    document.getElementById(key).children[0].classList.add("opacity-100");
}

function modalClose(key) {
    document.getElementById(key).children[0].classList.remove("opacity-100");
    document.getElementById(key).children[0].classList.add("opacity-0");
    setTimeout(function () {
        document.getElementById(key).close();
        document.body.removeAttribute("style");
    }, 100);
}

function okModal(key) {
    const parentElement = document.getElementById(key).closest("div");
    const tempDiv = document.createElement("div");
    tempDiv.innerHTML = document
        .getElementById(key)
        .querySelector("input").value;

    const value = parentElement.querySelector(".value");

    const text =
        tempDiv.innerText.slice(0, 20) +
        (tempDiv.innerText.length > 20 ? "..." : "");

    if (value.tagName === "INPUT") value.value = text;
    else value.innerHTML = text;

    modalClose(key);
}
