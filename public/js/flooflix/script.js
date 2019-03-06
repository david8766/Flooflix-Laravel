$('document').ready(function () {
    document.body.style.backgroundColor = 'black';
})
$("#delete-user").click(function () {
    if (confirm("Etes vous sur de vouloir supprimer cet utilisateur ? Toutes ses informations seront définitivement perdues.")) {
        if (confirm("Les informations de cet utilisateur vont être supprimées")) {} else {
            event.preventDefault();
            alert("suppression annulée")
        }
    } else {
        event.preventDefault();
        alert("suppression annulée")
    }
});
$("#delete-category").click(function () {
    if (confirm("Etes vous sur de vouloir supprimer cette categorie ? Toutes ses informations seront définitivement perdues.")) {
        if (confirm("Les informations de cette categorie vont être supprimées")) {} else {
            event.preventDefault();
            alert("suppression annulée")
        }
    } else {
        event.preventDefault();
        alert("suppression annulée")
    }
});