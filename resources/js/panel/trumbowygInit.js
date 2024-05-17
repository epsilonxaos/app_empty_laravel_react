import "trumbowyg";
import "trumbowyg/dist/ui/trumbowyg.min.css";
import "trumbowyg/dist/plugins/base64/trumbowyg.base64";
import "trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste";
import "trumbowyg/dist/plugins/noembed/trumbowyg.noembed";
import icons from "./icons.svg";

$.trumbowyg.svgPath = icons;
$(".trumbowyg-panel").trumbowyg({
    btnsDef: {
        base64: {
            ico: "insert-image",
            title: "Insertar Imagen",
            text: "Insertar Imagen",
        },
        noembed: {
            title: "Insertar URL video",
            text: "Insertar URL video",
        },
    },
    btns: [
        ["viewHTML"],
        ["formatting"],
        ["strong", "em", "del", "underline"],
        ["link"],
        ["base64"],
        ["justifyLeft", "justifyCenter", "justifyRight", "justifyFull"],
        ["unorderedList", "orderedList"],
        ["horizontalRule"],
        ["removeformat"],
        ["noembed"],
    ],
});

$(".shorttext").trumbowyg({
    btns: [
        ["viewHTML"],
        ["strong", "em", "del", "underline"],
        ["link"],
        ["justifyLeft", "justifyCenter", "justifyRight", "justifyFull"],
        ["unorderedList", "orderedList"],
        ["horizontalRule"],
        ["removeformat"],
    ],
});
$(".shorttext").closest(".trumbowyg-box").css("min-height", "100px");
$(".shorttext").prev(".trumbowyg-editor").css("min-height", "100px");
