let changeLinks = function (selectElement, showElement, editElement, deleteElement) {
    let newId = selectElement.value;

    let showLink = showElement.getAttribute("href");
    let showLinkArray = showLink.split("/");
    showLinkArray[showLinkArray.length - 1] = newId;
    showElement.setAttribute("href", showLinkArray.join("/"));

    let editLink = editElement.getAttribute("href");
    let editLinkArray = editLink.split("/");
    editLinkArray[editLinkArray.length - 2] = newId;
    editElement.setAttribute('href', editLinkArray.join("/"));

    let deleteLink = deleteElement.getAttribute("action");
    let deleteLinkArray = deleteLink.split("/");
    deleteLinkArray[deleteLinkArray.length - 1] = newId;
    deleteElement.setAttribute("action", deleteLinkArray.join("/"));
}

let panel = document.querySelector(".panel");
if (panel !== null) {
    let toyPanelSelect = document.querySelector(".panel__toy-select");
    let toyShowLink = document.querySelector(".panel__toy-show");
    let toyEditLink = document.querySelector(".panel__toy-edit");
    let toyDeleteLink = document.querySelector(".panel__toy-delete");
    toyPanelSelect.addEventListener("change", () => changeLinks(toyPanelSelect, toyShowLink, toyEditLink, toyDeleteLink));

    let materialPanelSelect = document.querySelector(".panel__material-select");
    let materialShowLink = document.querySelector(".panel__material-show");
    let materialEditLink = document.querySelector(".panel__material-edit");
    let materialDeleteLink = document.querySelector(".panel__material-delete");
    materialPanelSelect.addEventListener("change", () => changeLinks(materialPanelSelect, materialShowLink, materialEditLink, materialDeleteLink));

    let typePanelSelect = document.querySelector(".panel__type-select");
    let typeShowLink = document.querySelector(".panel__type-show");
    let typeEditLink = document.querySelector(".panel__type-edit");
    let typeDeleteLink = document.querySelector(".panel__type-delete");
    typePanelSelect.addEventListener("change", () => changeLinks(typePanelSelect, typeShowLink, typeEditLink, typeDeleteLink));

}