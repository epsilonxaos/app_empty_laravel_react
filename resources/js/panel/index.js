import axios from "axios";
import Toastify from "toastify-js";
import "toastify-js/src/toastify.css";

window.deleteSubmitForm = function (id) {
    Swal.fire({
        title: "¿Finalizar eliminación?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        denyButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Eliminado!", "", "success");
            document.querySelector(".delete-form-" + id).submit();
        }
    });
};

window.cambiar_status = function (el, id, status, url) {
    axios
        .post(url, {
            id,
            status,
        })
        .then(function (response) {
            document.querySelector("#" + el).removeAttribute("onclick");
            let n = status == 1 ? 0 : 1;
            document
                .querySelector("#" + el)
                .setAttribute(
                    "onclick",
                    "cambiar_status('" +
                        el +
                        "', " +
                        id +
                        ", '" +
                        n +
                        "', '" +
                        url +
                        "')"
                );
            Toastify({
                text: "Ajustes aplicados",
                className: "success",
                style: {
                    background: "#00b09b",
                },
            }).showToast();
            // alertify.notify("Hecho!", "success", 2);
        })
        .catch(function (error) {
            console.log(error);
        });
};

$(".dropify").dropify({
    messages: {
        default: "Arrastre y suelte un archivo o haga clic aquí",
        replace: "Arrastre y suelte un archivo o haga clic para reemplazar",
        remove: "Eliminar",
        error: "Ooops, algo salio mal.",
    },
    error: {
        fileSize:
            "El tamaño del archivo es demasiado grande. ({{ value }} max).",
        minWidth:
            "El tamaño del archivo es demasiado pequeño. ({{ value }}}px min).",
        maxWidth:
            "El ancho de la imagen es demasiado grande. ({{ value }}}px max).",
        minHeight:
            "El alto de la imagen es demasiado pequeño. ({{ value }}}px min).",
        maxHeight:
            "El alto de la imagen es demasiado grande. ({{ value }}px max).",
        imageFormat:
            "El formato de la imagen no está permitido. Formatos aceptados ({{ value }}).",
    },
});
