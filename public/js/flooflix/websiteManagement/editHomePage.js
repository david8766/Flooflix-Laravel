/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT BACKGROUND OF JUMBOTRON
|--------------------------------------------------------------------------
|
|
*/

// Check if a background color is saved locally for jumbotron
if (localStorage.getItem('backgroundColor_home_jumbotron') != null) {
    var background_home_jumbotron = JSON.parse(localStorage.getItem("backgroundColor_home_jumbotron"));
    $("select[name='backgroundColor_home_jumbotron']").val(background_home_jumbotron.id)
    $("select[name='backgroundColor_home_jumbotron'] option:selected")
    $("select[name='backgroundColor_home_jumbotron']").attr('disabled','disabled')
    $("select[name='backgroundImage_home_jumbotron']").attr('hidden','hidden')
    $('p.mt-3').attr('hidden', 'hidden')
    $('#background-jumbotron-submit').attr('hidden')
    $('#background-jumbotron-remove').attr('hidden')
    $('#background-jumbotron-delete').removeAttr('hidden')
} 

// Check if a background image is saved locally for jumbotron
if (localStorage.getItem('backgroundImage_home_jumbotron') != null) {
    var background_home_jumbotron = JSON.parse(localStorage.getItem("backgroundImage_home_jumbotron"));
    $("select[name='backgroundImage_home_jumbotron']").val(background_home_jumbotron.id)
    $("select[name='backgroundImage_home_jumbotron'] option:selected")
    $("select[name='backgroundImage_home_jumbotron']").attr('disabled','disabled')
    $("select[name='backgroundColor_home_jumbotron']").attr('hidden','hidden')
    $('p.mt-3').attr('hidden', 'hidden')
    $('#background-jumbotron-submit').attr('hidden')
    $('#background-jumbotron-remove').attr('hidden')
    $('#background-jumbotron-delete').removeAttr('hidden')
}

// Show validation button if color is selected
$("select[name='backgroundColor_home_jumbotron']").change(function () {
    if ($("select[name='backgroundColor_home_jumbotron'] option:selected").val().length) {
        $("select[name='backgroundColor_home_jumbotron']").attr('disabled','disabled')
        $("select[name='backgroundImage_home_jumbotron']").attr('hidden', 'hidden')
        $('p.mt-3').attr('hidden','hidden')
        $('#background-jumbotron-submit').removeAttr('hidden')
        $('#background-jumbotron-remove').removeAttr('hidden')
    }
});

// Show validation button if image is selected
$("select[name='backgroundImage_home_jumbotron']").change(function () {
    if ($("select[name='backgroundImage_home_jumbotron'] option:selected").val().length) {
        $("select[name='backgroundImage_home_jumbotron']").attr('disabled','disabled')
        $("select[name='backgroundColor_home_jumbotron']").attr('hidden','hidden')
        $('p.mt-3').attr('hidden','hidden')
        $('#background-jumbotron-submit').removeAttr('hidden')
        $('#background-jumbotron-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForBackgroundJumbotron() {
    $("select[name='backgroundImage_home_jumbotron']").removeAttr('hidden')
    $("select[name='backgroundImage_home_jumbotron']").removeAttr('disabled')
    $("select[name='backgroundImage_home_jumbotron']").val('')
    $("select[name='backgroundColor_home_jumbotron']").removeAttr('hidden')
    $("select[name='backgroundColor_home_jumbotron']").removeAttr('disabled')
    $("select[name='backgroundColor_home_jumbotron']").val('')
    $('p.mt-3').removeAttr('hidden')
    $('#background-jumbotron-submit').attr('hidden','hidden')
    $('#background-jumbotron-remove').attr('hidden','hidden')
}

function writeInLocalStorageBackgroundJumbotron() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object
        backgroundColor_home_jumbotron, backgroundImage_home_jumbotron  */
        if ($("select[name='backgroundColor_home_jumbotron'] option:selected").val().length) {
            var backgroundColor_home_jumbotron = {
                id:$("select[name='backgroundColor_home_jumbotron']").val(),
                name: $("select[name='backgroundColor_home_jumbotron'] option:selected").text(),
            }
            /* Serialization to a JSON object */
            localStorage.setItem("backgroundColor_home_jumbotron",JSON.stringify(backgroundColor_home_jumbotron));
            var data = JSON.parse(localStorage.getItem("backgroundColor_home_jumbotron"));
            var display = data.name;
        }
        if ($("select[name='backgroundImage_home_jumbotron'] option:selected").val().length) {
            var backgroundImage_home_jumbotron = {
                id:$("select[name='backgroundImage_home_jumbotron']").val(),
                name:$("select[name='backgroundImage_home_jumbotron'] option:selected").text(),
            }
            localStorage.setItem("backgroundImage_home_jumbotron",JSON.stringify(backgroundImage_home_jumbotron));
            var data = JSON.parse(localStorage.getItem("backgroundImage_home_jumbotron"));
        }
        
        $('#background-jumbotron-submit').attr('hidden','hidden')
        $('#background-jumbotron-remove').attr('hidden','hidden')
        $('#background-jumbotron-delete').removeAttr('hidden')
       
        /* Control display */
        alert("Enregistrement pour l'arrière plan de la page d'accueil : " + data.name);
    } else {
        /* Error message (no possibility local storageStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForBackgroundJumbotron(){
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('backgroundColor_home_jumbotron') != null) {
        localStorage.removeItem("backgroundColor_home_jumbotron");    
        $("select[name='backgroundColor_home_jumbotron']").removeAttr('disabled')
        $("select[name='backgroundImage_home_jumbotron']").removeAttr('hidden')
        $("select[name='backgroundColor_home_jumbotron'] option:eq(0)").prop('selected', true)
    }
    if (localStorage.getItem('backgroundImage_home_jumbotron') != null) {
        localStorage.removeItem("backgroundImage_home_jumbotron");
        $("select[name='backgroundImage_home_jumbotron']").removeAttr('disabled')
        $("select[name='backgroundColor_home_jumbotron']").removeAttr('hidden')
        $("select[name='backgroundImage_home_jumbotron'] option:eq(0)").prop('selected', true)
    }
    $('p.mt-3').removeAttr('hidden')
    $('#background-jumbotron-delete').attr('hidden','hidden')
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE TEXT TITLE OF JUMBOTRON
|--------------------------------------------------------------------------
|
|
*/
// Check if a text is saved locally for the title
if (localStorage.getItem('text_home_title') != null) {
    var text_home_title = JSON.parse(localStorage.getItem("text_home_title"));
    $("input[name='text_home_title']").val(text_home_title.text)
    $("input[name='text_home_title']").attr('disabled','disabled')
    $('#text-home-title-delete').removeAttr('hidden')
}

// Show validation button if text is entered
$("input[name='text_home_title']").on("change keydown", function () {
    $('#text-home-title-submit').removeAttr('hidden')
});

$("input[name='text_home_title']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalTextTitle();
    }
});

// Remove validation button if the field is empty
$("input[name='text_home_title']").on("change blur", function () {
    if ($("input[name='text_home_title']").val() == "") {
        $('#text-home-title-submit').attr('hidden','hidden')
    }
});


function writeInLocalTextTitle(){
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object text_home_title */
        if ($("input[name='text_home_title']").val().length) {
            var text_home_title = {
                text: $("input[name='text_home_title']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("text_home_title", JSON.stringify(text_home_title));
            var data = JSON.parse(localStorage.getItem("text_home_title"));
            $("input[name='text_home_title']").val(data.text)
            $("input[name='text_home_title']").attr('disabled','disabled')
        }
        $('#text-home-title-submit').attr('hidden','hidden')
        $('#text-home-title-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du texte pour le titre de la page d'accueil : " + data.text);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForTextTitle(){
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('text_home_title') != null) {
        localStorage.removeItem("text_home_title");
        $("input[name='text_home_title']").val('')
        $("input[name='text_home_title']").removeAttr('disabled')
        $('#text-home-title-delete').attr('hidden','hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FONT TITLE OF JUMBOTRON
|--------------------------------------------------------------------------
|
|
*/

// Check if a font is saved locally for the title
if (localStorage.getItem('font_home_title') != null) {
    var font_home_title = JSON.parse(localStorage.getItem("font_home_title"));
    $("select[name='font_home_title']").val(font_home_title.id)
    $("select[name='font_home_title'] option:selected")
    $("select[name='font_home_title']").attr('disabled', 'disabled')
    $('#font-home-title-submit').attr('hidden')
    $('#font-home-title-remove').attr('hidden')
    $('#font-home-title-delete').removeAttr('hidden')
}

// Show validation button if font is selected
$("select[name='font_home_title']").change(function () {
    if ($("select[name='font_home_title'] option:selected").val().length) {
        $("select[name = 'font_home_title']").attr('disabled', 'disabled')
        $('#font-home-title-submit').removeAttr('hidden')
        $('#font-home-title-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForFontHomeTitle(){
    $("select[name='font_home_title']").removeAttr('disabled')
    $("select[name='font_home_title']").val('')
    $('#font-home-title-submit').attr('hidden','hidden')
    $('#font-home-title-remove').attr('hidden','hidden')
}
function writeInLocalStorageFontHomeTitle() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object text_home_title */
        if ($("select[name='font_home_title']").val().length) {
            var font_home_title = {
                id: $("select[name='font_home_title'] option:selected").val(),
                name: $("select[name='font_home_title'] option:selected").text()
            }
            console.log(font_home_title);
            
            /* Serialization to a JSON object */
            localStorage.setItem("font_home_title", JSON.stringify(font_home_title));
            var data = JSON.parse(localStorage.getItem("font_home_title"));
            $("select[name='font_home_title']").attr('disabled','disabled')
        }
        $('#font-home-title-submit').attr('hidden','hidden')
        $('#font-home-title-remove').attr('hidden','hidden')
        $('#font-home-title-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la police : "+ data.name + " pour le titre de la page d'accueil");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFontHomeTitle() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('font_home_title') != null) {
        localStorage.removeItem("font_home_title");
        $("select[name='font_home_title']").val('')
        $("select[name='font_home_title']").removeAttr('disabled')
        $('#font-home-title-delete').attr('hidden','hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE COLOR TITLE OF JUMBOTRON
|--------------------------------------------------------------------------
|
|
*/

// Check if a color is saved locally for the title
if (localStorage.getItem('color_home_title') != null) {
    var color_home_title = JSON.parse(localStorage.getItem("color_home_title"));
    $("select[name='color_home_title']").val(color_home_title.id)
    $("select[name='color_home_title'] option:selected")
    $("select[name='color_home_title']").attr('disabled', 'disabled')
    $('#color-home-title-submit').attr('hidden')
    $('#color-home-title-remove').attr('hidden')
    $('#color-home-title-delete').removeAttr('hidden')
}

// Show validation button if color is selected
$("select[name='color_home_title']").change(function () {
    if ($("select[name='color_home_title'] option:selected").val().length) {
        $("select[name = 'color_home_title']").attr('disabled','disabled')
        $('#color-home-title-submit').removeAttr('hidden')
        $('#color-home-title-remove').removeAttr('hidden')
    }
});
function retrunSelectOptionForColorHomeTitle() {
    $("select[name='color_home_title']").removeAttr('disabled')
    $("select[name='color_home_title']").val('')
    $('#color-home-title-submit').attr('hidden', 'hidden')
    $('#color-home-title-remove').attr('hidden', 'hidden')
}
function writeInLocalStorageColorHomeTitle() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object text_home_title */
        if ($("select[name='color_home_title']").val().length) {
            var color_home_title = {
                id: $("select[name='color_home_title'] option:selected").val(),
                name: $("select[name='color_home_title'] option:selected").text()
            }
            console.log(color_home_title);

            /* Serialization to a JSON object */
            localStorage.setItem("color_home_title", JSON.stringify(color_home_title));
            var data = JSON.parse(localStorage.getItem("color_home_title"));
            $("select[name='color_home_title']").attr('disabled','disabled')
        }
        $('#color-home-title-submit').attr('hidden','hidden')
        $('#color-home-title-remove').attr('hidden','hidden')
        $('#color-home-title-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la couleur : " + data.name + " pour le titre de la page d'accueil");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForColorHomeTitle() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('color_home_title') != null) {
        localStorage.removeItem("color_home_title");
        $("select[name='color_home_title']").val('')
        $("select[name='color_home_title']").removeAttr('disabled')
        $('#color-home-title-delete').attr('hidden','hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE TEXT OF CATCH PHRASE OF JUMBOTRON
|--------------------------------------------------------------------------
|
|
*/

// Check if a text is saved locally for the catch phrase
if (localStorage.getItem('text_home_catch') != null) {
    var text_home_catch = JSON.parse(localStorage.getItem("text_home_catch"));
    $("textarea[name='text_home_catch']").val(text_home_catch.text)
    $("textarea[name='text_home_catch']").attr('disabled', 'disabled')
    $('#text-home-catch-delete').removeAttr('hidden')
}

// Show validation button if text is entered
$("textarea[name='text_home_catch']").on("change keydown", function () {
    $('#text-home-catch-submit').removeAttr('hidden')
});

// Remove validation button if the field is empty
$("textarea[name='text_home_catch']").on("change blur", function () {
    if ($("textarea[name='text_home_catch']").val() == "") {
        $('#text-home-catch-submit').attr('hidden', 'hidden')
    }
});

function writeInLocalTextCatch(){
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object text_home_catch */
        if ($("textarea[name='text_home_catch']").val().length) {
            var text_home_catch = {
                text: $("textarea[name='text_home_catch']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("text_home_catch", JSON.stringify(text_home_catch));
            var data = JSON.parse(localStorage.getItem("text_home_catch"));
            $("textarea[name='text_home_catch']").val(data.text)
            $("textarea[name='text_home_catch']").attr('disabled','disabled')
        }
        $('#text-home-catch-submit').attr('hidden','hidden')
        $('#text-home-catch-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du texte pour la phrase d'accroche de la page d'accueil : " + data.text);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForTextCatch(){
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('text_home_catch') != null) {
        localStorage.removeItem("text_home_catch");
        $("textarea[name='text_home_catch']").val('')
        $("textarea[name='text_home_catch']").removeAttr('disabled')
        $('#text-home-catch-delete').attr('hidden','hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FONT OF THE CATCH PHRASE OF JUMBOTRON
|--------------------------------------------------------------------------
|
|
*/

// Check if a font is saved locally for the catch phrase
if (localStorage.getItem('font_home_catch') != null) {
    var font_home_catch = JSON.parse(localStorage.getItem("font_home_catch"));
    $("select[name='font_home_catch']").val(font_home_catch.id)
    $("select[name='font_home_catch'] option:selected")
    $("select[name='font_home_catch']").attr('disabled', 'disabled')
    $('#font-home-catch-submit').attr('hidden')
    $('#font-home-catch-remove').attr('hidden')
    $('#font-home-catch-delete').removeAttr('hidden')
}

// Show validation button if font is selected
$("select[name='font_home_catch']").change(function () {
    if ($("select[name='font_home_catch'] option:selected").val().length) {
        $("select[name = 'font_home_catch']").attr('disabled', 'disabled')
        $('#font-home-catch-submit').removeAttr('hidden')
        $('#font-home-catch-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForFontHomeCatch(){
    $("select[name='font_home_catch']").removeAttr('disabled')
    $("select[name='font_home_catch']").val('')
    $('#font-home-catch-submit').attr('hidden','hidden')
    $('#font-home-catch-remove').attr('hidden','hidden')
}

function writeInLocalStorageFontHomeCatch() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object text_home_catch */
        if ($("select[name='font_home_catch']").val().length) {
            var font_home_catch = {
                id: $("select[name='font_home_catch'] option:selected").val(),
                name: $("select[name='font_home_catch'] option:selected").text()
            }
            console.log(font_home_catch);
            
            /* Serialization to a JSON object */
            localStorage.setItem("font_home_catch", JSON.stringify(font_home_catch));
            var data = JSON.parse(localStorage.getItem("font_home_catch"));
            $("select[name='font_home_catch']").attr('disabled','disabled')
        }
        $('#font-home-catch-submit').attr('hidden','hidden')
        $('#font-home-catch-remove').attr('hidden','hidden')
        $('#font-home-catch-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la police : "+ data.name + " pour la phrase d'accroche de la page d'accueil");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFontHomeCatch() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('font_home_catch') != null) {
        localStorage.removeItem("font_home_catch");
        $("select[name='font_home_catch']").val('')
        $("select[name='font_home_catch']").removeAttr('disabled')
        $('#font-home-catch-delete').attr('hidden','hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE COLOR OF THE CATCH PHRASE OF JUMBOTRON
|--------------------------------------------------------------------------
|
|
*/

// Check if a color is saved locally for the catch phrase
if (localStorage.getItem('color_home_catch') != null) {
    var color_home_catch = JSON.parse(localStorage.getItem("color_home_catch"));
    $("select[name='color_home_catch']").val(color_home_catch.id)
    $("select[name='color_home_catch'] option:selected")
    $("select[name='color_home_catch']").attr('disabled', 'disabled')
    $('#color-home-catch-submit').attr('hidden')
    $('#color-home-catch-remove').attr('hidden')
    $('#color-home-catch-delete').removeAttr('hidden')
}

// Show validation button if color is selected
$("select[name='color_home_catch']").change(function () {
    if ($("select[name='color_home_catch'] option:selected").val().length) {
        $("select[name = 'color_home_catch']").attr('disabled','disabled')
        $('#color-home-catch-submit').removeAttr('hidden')
        $('#color-home-catch-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForColorHomeCatch() {
    $("select[name='color_home_catch']").removeAttr('disabled')
    $("select[name='color_home_catch']").val('')
    $('#color-home-catch-submit').attr('hidden', 'hidden')
    $('#color-home-catch-remove').attr('hidden', 'hidden')
}
function writeInLocalStorageColorHomeCatch() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object text_home_catch */
        if ($("select[name='color_home_catch']").val().length) {
            var color_home_catch = {
                id: $("select[name='color_home_catch'] option:selected").val(),
                name: $("select[name='color_home_catch'] option:selected").text()
            }
            console.log(color_home_catch);

            /* Serialization to a JSON object */
            localStorage.setItem("color_home_catch", JSON.stringify(color_home_catch));
            var data = JSON.parse(localStorage.getItem("color_home_catch"));
            $("select[name='color_home_catch']").attr('disabled','disabled')
        }
        $('#color-home-catch-submit').attr('hidden','hidden')
        $('#color-home-catch-remove').attr('hidden','hidden')
        $('#color-home-catch-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la couleur : " + data.name + " pour la phrase d'accroche de la page d'accueil");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForColorHomeCatch() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('color_home_catch') != null) {
        localStorage.removeItem("color_home_catch");
        $("select[name='color_home_catch']").val('')
        $("select[name='color_home_catch']").removeAttr('disabled')
        $('#color-home-catch-delete').attr('hidden','hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE DESCRIPTIF OF JUMBOTRON
|--------------------------------------------------------------------------
|
|
*/

// Check if a text is saved locally for the descriptif
if (localStorage.getItem('text_home_desc') != null) {
    var text_home_desc = JSON.parse(localStorage.getItem("text_home_desc"));
    $("textarea[name='text_home_desc']").val(text_home_desc.text)
    $("textarea[name='text_home_desc']").attr('disabled', 'disabled')
    $('#text-home-desc-delete').removeAttr('hidden')
}

// Show validation button if text is entered
$("textarea[name='text_home_desc']").on("change keydown", function () {
    $('#text-home-desc-submit').removeAttr('hidden')
});

// Remove validation button if the field is empty
$("textarea[name='text_home_desc']").on("change blur", function () {
    if ($("textarea[name='text_home_desc']").val() == "") {
        $('#text-home-desc-submit').attr('hidden', 'hidden')
    }
});

function writeInLocalTextDesc() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object text_home_desc */
        if ($("textarea[name='text_home_desc']").val().length) {
            var text_home_desc = {
                text: $("textarea[name='text_home_desc']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("text_home_desc", JSON.stringify(text_home_desc));
            var data = JSON.parse(localStorage.getItem("text_home_desc"));
            $("textarea[name='text_home_desc']").val(data.text)
            $("textarea[name='text_home_desc']").attr('disabled', 'disabled')
        }
        $('#text-home-desc-submit').attr('hidden', 'hidden')
        $('#text-home-desc-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du texte pour le descriptif de la page d'accueil : " + data.text);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForTextDesc() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('text_home_desc') != null) {
        localStorage.removeItem("text_home_desc");
        $("textarea[name='text_home_desc']").val('')
        $("textarea[name='text_home_desc']").removeAttr('disabled')
        $('#text-home-desc-delete').attr('hidden', 'hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FONT OF THE DESCRIPTIF OF JUMBOTRON
|--------------------------------------------------------------------------
|
|
*/

// Check if a font is saved locally for the descriptif
if (localStorage.getItem('font_home_desc') != null) {
    var font_home_desc = JSON.parse(localStorage.getItem("font_home_desc"));
    $("select[name='font_home_desc']").val(font_home_desc.id)
    $("select[name='font_home_desc'] option:selected")
    $("select[name='font_home_desc']").attr('disabled', 'disabled')
    $('#font-home-desc-submit').attr('hidden')
    $('#font-home-desc-remove').attr('hidden')
    $('#font-home-desc-delete').removeAttr('hidden')
}

// Show validation button if font is selected
$("select[name='font_home_desc']").change(function () {
    if ($("select[name='font_home_desc'] option:selected").val().length) {
        $("select[name = 'font_home_desc']").attr('disabled', 'disabled')
        $('#font-home-desc-submit').removeAttr('hidden')
        $('#font-home-desc-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForFontHomeDesc() {
    $("select[name='font_home_desc']").removeAttr('disabled')
    $("select[name='font_home_desc']").val('')
    $('#font-home-desc-submit').attr('hidden', 'hidden')
    $('#font-home-desc-remove').attr('hidden', 'hidden')
}

function writeInLocalStorageFontHomeDesc() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object font_home_desc */
        if ($("select[name='font_home_desc']").val().length) {
            var font_home_desc = {
                id: $("select[name='font_home_desc'] option:selected").val(),
                name: $("select[name='font_home_desc'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("font_home_desc", JSON.stringify(font_home_desc));
            var data = JSON.parse(localStorage.getItem("font_home_desc"));
            $("select[name='font_home_desc']").attr('disabled', 'disabled')
        }
        $('#font-home-desc-submit').attr('hidden', 'hidden')
        $('#font-home-desc-remove').attr('hidden', 'hidden')
        $('#font-home-desc-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la police : " + data.name + " pour le descriptif de la page d'accueil");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFontHomeDesc() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('font_home_desc') != null) {
        localStorage.removeItem("font_home_desc");
        $("select[name='font_home_desc']").val('')
        $("select[name='font_home_desc']").removeAttr('disabled')
        $('#font-home-desc-delete').attr('hidden', 'hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE COLOR OF THE DESCRIPTIF OF JUMBOTRON
|--------------------------------------------------------------------------
|
|
*/

// Check if a color is saved locally for the descriptif
if (localStorage.getItem('color_home_desc') != null) {
    var color_home_desc = JSON.parse(localStorage.getItem("color_home_desc"));
    $("select[name='color_home_desc']").val(color_home_desc.id)
    $("select[name='color_home_desc'] option:selected")
    $("select[name='color_home_desc']").attr('disabled', 'disabled')
    $('#color-home-desc-submit').attr('hidden')
    $('#color-home-desc-remove').attr('hidden')
    $('#color-home-desc-delete').removeAttr('hidden')
}

// Show validation button if color is selected
$("select[name='color_home_desc']").change(function () {
    if ($("select[name='color_home_desc'] option:selected").val().length) {
        $("select[name = 'color_home_desc']").attr('disabled', 'disabled')
        $('#color-home-desc-submit').removeAttr('hidden')
        $('#color-home-desc-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForColorHomeDesc() {
    $("select[name='color_home_desc']").removeAttr('disabled')
    $("select[name='color_home_desc']").val('')
    $('#color-home-desc-submit').attr('hidden', 'hidden')
    $('#color-home-desc-remove').attr('hidden', 'hidden')
}

function writeInLocalStorageColorHomeDesc() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object color_home_desc */
        if ($("select[name='color_home_desc']").val().length) {
            var color_home_desc = {
                id: $("select[name='color_home_desc'] option:selected").val(),
                name: $("select[name='color_home_desc'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("color_home_desc", JSON.stringify(color_home_desc));
            var data = JSON.parse(localStorage.getItem("color_home_desc"));
            $("select[name='color_home_desc']").attr('disabled', 'disabled')
        }
        $('#color-home-desc-submit').attr('hidden', 'hidden')
        $('#color-home-desc-remove').attr('hidden', 'hidden')
        $('#color-home-desc-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la couleur : " + data.name + " pour le descriptif de la page d'accueil");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForColorHomeDesc() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('color_home_desc') != null) {
        localStorage.removeItem("color_home_desc");
        $("select[name='color_home_desc']").val('')
        $("select[name='color_home_desc']").removeAttr('disabled')
        $('#color-home-desc-delete').attr('hidden', 'hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE BACKGROUND OF THE SECOND BAND OF TOP MOVIES
|--------------------------------------------------------------------------
|
|
*/

// Check if a color is saved locally for the background color
if (localStorage.getItem('backgroundColor_home_second_article') != null) {
    var backgroundColor_home_second_article = JSON.parse(localStorage.getItem("backgroundColor_home_second_article"));
    $("select[name='backgroundColor_home_second_article']").val(backgroundColor_home_second_article.id)
    $("select[name='backgroundColor_home_second_article'] option:selected")
    $("select[name='backgroundColor_home_second_article']").attr('disabled', 'disabled')
    $('#background-second-article-submit').attr('hidden')
    $('#background-second-article-remove').attr('hidden')
    $('#background-second-article-delete').removeAttr('hidden')
}

// Show validation button if color is selected
$("select[name='backgroundColor_home_second_article']").change(function () {
    if ($("select[name='backgroundColor_home_second_article'] option:selected").val().length) {
        $("select[name='backgroundColor_home_second_article']").attr('disabled', 'disabled')
        $('#background-second-article-submit').removeAttr('hidden')
        $('#background-second-article-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForBackgroundSecondArticle() {
    $("select[name='backgroundColor_home_second_article']").removeAttr('disabled')
    $("select[name='backgroundColor_home_second_article']").val('')
    $('#background-second-article-submit').attr('hidden', 'hidden')
    $('#background-second-article-remove').attr('hidden', 'hidden')
}

function writeInLocalStorageBackgroundSecondArticle() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object backgroundColor_home_second_article */
        if ($("select[name='backgroundColor_home_second_article']").val().length) {
            var backgroundColor_home_second_article = {
                id: $("select[name='backgroundColor_home_second_article'] option:selected").val(),
                name: $("select[name='backgroundColor_home_second_article'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("backgroundColor_home_second_article", JSON.stringify(backgroundColor_home_second_article));
            var data = JSON.parse(localStorage.getItem("backgroundColor_home_second_article"));
            $("select[name='backgroundColor_home_second_article']").attr('disabled', 'disabled')
        }
        $('#background-second-article-submit').attr('hidden', 'hidden')
        $('#background-second-article-remove').attr('hidden', 'hidden')
        $('#background-second-article-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la couleur : " + data.name + " pour l'arrière-plan du deuxième bandeau");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForBackgroundSecondArticle() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('backgroundColor_home_second_article') != null) {
        localStorage.removeItem("backgroundColor_home_second_article");
        $("select[name='backgroundColor_home_second_article']").val('')
        $("select[name='backgroundColor_home_second_article']").removeAttr('disabled')
        $('#background-second-article-delete').attr('hidden', 'hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE TEXT OF TITLE FOR TOP MOVIES
|--------------------------------------------------------------------------
|
|
*/

// Check if a text is saved locally for the top movies
if (localStorage.getItem('text_home_top') != null) {
    var text_home_top = JSON.parse(localStorage.getItem("text_home_top"));
    $("input[name='text_home_top']").val(text_home_top.text)
    $("input[name='text_home_top']").attr('disabled', 'disabled')
    $('#text-home-top-delete').removeAttr('hidden')
}

// Show validation button if text is entered
$("input[name='text_home_top']").on("change keydown", function () {
    $('#text-home-top-submit').removeAttr('hidden')
});

$("input[name='text_home_top']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalTextTop();
    }
});

// Remove validation button if the field is empty
$("input[name='text_home_top']").on("change blur", function () {
    if ($("input[name='text_home_top']").val() == "") {
        $('#text-home-top-submit').attr('hidden', 'hidden')
    }
});

function writeInLocalTextTop() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object text_home_top */
        if ($("input[name='text_home_top']").val().length) {
            var text_home_top = {
                text: $("input[name='text_home_top']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("text_home_top", JSON.stringify(text_home_top));
            var data = JSON.parse(localStorage.getItem("text_home_top"));
            var display = data.text;
            $("input[name='text_home_top']").val(data.text)
            $("input[name='text_home_top']").attr('disabled', 'disabled')
        }
        $('#text-home-top-submit').attr('hidden', 'hidden')
        $('#text-home-top-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du texte pour le deuxième bandeau : " + display);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForTextTop() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('text_home_top') != null) {
        localStorage.removeItem("text_home_top");
        $("input[name='text_home_top']").val('')
        $("input[name='text_home_top']").removeAttr('disabled')
        $('#text-home-top-delete').attr('hidden', 'hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FONT OF TITLE FOR TOP MOVIES
|--------------------------------------------------------------------------
|
|
*/

// Check if a font is saved locally for the title
if (localStorage.getItem('font_home_top') != null) {
    var font_home_top = JSON.parse(localStorage.getItem("font_home_top"));
    $("select[name='font_home_top']").val(font_home_top.id)
    $("select[name='font_home_top'] option:selected")
    $("select[name='font_home_top']").attr('disabled', 'disabled')
    $('#font-home-top-submit').attr('hidden')
    $('#font-home-top-remove').attr('hidden')
    $('#font-home-top-delete').removeAttr('hidden')
}

// Show validation button if font is selected
$("select[name='font_home_top']").change(function () {
    if ($("select[name='font_home_top'] option:selected").val().length) {
        $("select[name = 'font_home_top']").attr('disabled', 'disabled')
        $('#font-home-top-submit').removeAttr('hidden')
        $('#font-home-top-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForFontHomeTop() {
    $("select[name='font_home_top']").removeAttr('disabled')
    $("select[name='font_home_top']").val('')
    $('#font-home-top-submit').attr('hidden', 'hidden')
    $('#font-home-top-remove').attr('hidden', 'hidden')
}
function writeInLocalStorageFontHomeTop() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object font_home_top */
        if ($("select[name='font_home_top']").val().length) {
            var font_home_top = {
                id: $("select[name='font_home_top'] option:selected").val(),
                name: $("select[name='font_home_top'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("font_home_top", JSON.stringify(font_home_top));
            var data = JSON.parse(localStorage.getItem("font_home_top"));
            $("select[name='font_home_top']").attr('disabled', 'disabled')
        }
        $('#font-home-top-submit').attr('hidden', 'hidden')
        $('#font-home-top-remove').attr('hidden', 'hidden')
        $('#font-home-top-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la police : " + data.name + " pour le titre du deuxième bandeau");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFontHomeTop() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('font_home_top') != null) {
        localStorage.removeItem("font_home_top");
        $("select[name='font_home_top']").val('')
        $("select[name='font_home_top']").removeAttr('disabled')
        $('#font-home-top-delete').attr('hidden', 'hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE COLOR OF TITLE FOR TOP MOVIES
|--------------------------------------------------------------------------
|
|
*/

// Check if a color is saved locally for the title of top movies
if (localStorage.getItem('color_home_top') != null) {
    var color_home_top = JSON.parse(localStorage.getItem("color_home_top"));
    $("select[name='color_home_top']").val(color_home_top.id)
    $("select[name='color_home_top'] option:selected")
    $("select[name='color_home_top']").attr('disabled', 'disabled')
    $('#color-home-top-submit').attr('hidden')
    $('#color-home-top-remove').attr('hidden')
    $('#color-home-top-delete').removeAttr('hidden')
}

// Show validation button if color is selected
$("select[name='color_home_top']").change(function () {
    if ($("select[name='color_home_top'] option:selected").val().length) {
        $("select[name = 'color_home_top']").attr('disabled', 'disabled')
        $('#color-home-top-submit').removeAttr('hidden')
        $('#color-home-top-remove').removeAttr('hidden')
    }
});
function retrunSelectOptionForColorHomeTop() {
    $("select[name='color_home_top']").removeAttr('disabled')
    $("select[name='color_home_top']").val('')
    $('#color-home-top-submit').attr('hidden', 'hidden')
    $('#color-home-top-remove').attr('hidden', 'hidden')
}
function writeInLocalStorageColorHomeTop() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object color_home_top */
        if ($("select[name='color_home_top']").val().length) {
            var color_home_top = {
                id: $("select[name='color_home_top'] option:selected").val(),
                name: $("select[name='color_home_top'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("color_home_top", JSON.stringify(color_home_top));
            var data = JSON.parse(localStorage.getItem("color_home_top"));
            $("select[name='color_home_top']").attr('disabled', 'disabled')
        }
        $('#color-home-top-submit').attr('hidden', 'hidden')
        $('#color-home-top-remove').attr('hidden', 'hidden')
        $('#color-home-top-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la couleur : " + data.name + " pour le titre du deuxième bandeau");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForColorHomeTop() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('color_home_top') != null) {
        localStorage.removeItem("color_home_top");
        $("select[name='color_home_top']").val('')
        $("select[name='color_home_top']").removeAttr('disabled')
        $('#color-home-top-delete').attr('hidden', 'hidden')
    }
}

/*
|-------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FONT OF THE TITLE OF THE MOVIES IN CAPTION OF THE POSTER
|-------------------------------------------------------------------------------
|
|
*/

// Check if a font is saved locally for the title of movies
if (localStorage.getItem('font_movie_home_top') != null) {
    var font_movie_home_top = JSON.parse(localStorage.getItem("font_movie_home_top"));
    $("select[name='font_movie_home_top']").val(font_home_top.id)
    $("select[name='font_movie_home_top'] option:selected")
    $("select[name='font_movie_home_top']").attr('disabled', 'disabled')
    $('#font-movie-home-top-submit').attr('hidden')
    $('#font-movie-home-top-remove').attr('hidden')
    $('#font-movie-home-top-delete').removeAttr('hidden')
}

// Show validation button if font is selected
$("select[name='font_movie_home_top']").change(function () {
    if ($("select[name='font_movie_home_top'] option:selected").val().length) {
        $("select[name = 'font_movie_home_top']").attr('disabled', 'disabled')
        $('#font-movie-home-top-submit').removeAttr('hidden')
        $('#font-movie-home-top-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForFontMovieHomeTop() {
    $("select[name='font_movie_home_top']").removeAttr('disabled')
    $("select[name='font_movie_home_top']").val('')
    $('#font-movie-home-top-submit').attr('hidden','hidden')
    $('#font-movie-home-top-remove').attr('hidden','hidden')
}

function writeInLocalStorageFontMovieHomeTop() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object font_movie_home_top */
        if ($("select[name='font_movie_home_top']").val().length) {
            var font_movie_home_top = {
                id: $("select[name='font_movie_home_top'] option:selected").val(),
                name: $("select[name='font_movie_home_top'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("font_movie_home_top", JSON.stringify(font_movie_home_top));
            var data = JSON.parse(localStorage.getItem("font_movie_home_top"));
            $("select[name='font_movie_home_top']").attr('disabled','disabled')
        }
        $('#font-movie-home-top-submit').attr('hidden','hidden')
        $('#font-movie-home-top-remove').attr('hidden','hidden')
        $('#font-movie-home-top-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la police : " + data.name + " pour le titre des films sur le deuxième bandeau");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFontMovieHomeTop() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('font_movie_home_top') != null) {
        localStorage.removeItem("font_movie_home_top");
        $("select[name='font_movie_home_top']").val('')
        $("select[name='font_movie_home_top']").removeAttr('disabled')
        $('#font-movie-home-top-delete').attr('hidden','hidden')
    }
}

/*
|---------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE COLOR OF THE TITLE OF THE MOVIES IN CAPTION OF THE POSTER
|---------------------------------------------------------------------------------------
|
|
*/

// Check if a color is saved locally for the color of the title of movies
if (localStorage.getItem('color_movie_home_top') != null) {
    var color_movie_home_top = JSON.parse(localStorage.getItem("color_movie_home_top"));
    $("select[name='color_movie_home_top']").val(color_home_top.id)
    $("select[name='color_movie_home_top'] option:selected")
    $("select[name='color_movie_home_top']").attr('disabled','disabled')
    $('#color-movie-home-top-submit').attr('hidden')
    $('#color-movie-home-top-remove').attr('hidden')
    $('#color-movie-home-top-delete').removeAttr('hidden')
}

// Show validation button if color is selected
$("select[name='color_movie_home_top']").change(function () {
    if ($("select[name='color_movie_home_top'] option:selected").val().length) {
        $("select[name='color_movie_home_top']").attr('disabled','disabled')
        $('#color-movie-home-top-submit').removeAttr('hidden')
        $('#color-movie-home-top-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForColorMovieHomeTop() {
    $("select[name='color_movie_home_top']").removeAttr('disabled')
    $("select[name='color_movie_home_top']").val('')
    $('#color-movie-home-top-submit').attr('hidden','hidden')
    $('#color-movie-home-top-remove').attr('hidden','hidden')
}

function writeInLocalStorageColorMovieHomeTop() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object color_movie_home_top */
        if ($("select[name='color_movie_home_top']").val().length) {
            var color_home_top = {
                id: $("select[name='color_movie_home_top'] option:selected").val(),
                name: $("select[name='color_movie_home_top'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("color_movie_home_top", JSON.stringify(color_home_top));
            var data = JSON.parse(localStorage.getItem("color_movie_home_top"));
            $("select[name='color_movie_home_top']").attr('disabled','disabled')
        }
        $('#color-movie-home-top-submit').attr('hidden','hidden')
        $('#color-movie-home-top-remove').attr('hidden','hidden')
        $('#color-movie-home-top-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la couleur : " + data.name + " pour le titre des films sur le deuxième bandeau");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForColorMovieHomeTop() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('color_movie_home_top') != null) {
        localStorage.removeItem("color_movie_home_top");
        $("select[name='color_movie_home_top']").val('')
        $("select[name='color_movie_home_top']").removeAttr('disabled')
        $('#color-movie-home-top-delete').attr('hidden','hidden')
    }
}

/*
|---------------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE COLOR ON MOUSEOVER OF THE TITLE OF THE MOVIES IN CAPTION OF THE POSTER
|---------------------------------------------------------------------------------------------
|
|
*/

// Check if a color is saved locally for the color on mouseover of the title of movies
if (localStorage.getItem('color_movie_mouseover_home_top') != null) {
    var color_movie_home_top = JSON.parse(localStorage.getItem("color_movie_mouseover_home_top"));
    $("select[name='color_movie_mouseover_home_top']").val(color_home_top.id)
    $("select[name='color_movie_mouseover_home_top'] option:selected")
    $("select[name='color_movie_mouseover_home_top']").attr('disabled','disabled')
    $('#color-movie-mouseover-home-top-submit').attr('hidden')
    $('#color-movie-mouseover-home-top-remove').attr('hidden')
    $('#color-movie-mouseover-home-top-delete').removeAttr('hidden')
}

// Show validation button if color is selected
$("select[name='color_movie_mouseover_home_top']").change(function () {
    if ($("select[name='color_movie_mouseover_home_top'] option:selected").val().length) {
        $("select[name='color_movie_mouseover_home_top']").attr('disabled', 'disabled')
        $('#color-movie-mouseover-home-top-submit').removeAttr('hidden')
        $('#color-movie-mouseover-home-top-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForColorMovieMouseoverHomeTop() {
    $("select[name='color_movie_mouseover_home_top']").removeAttr('disabled')
    $("select[name='color_movie_mouseover_home_top']").val('')
    $('#color-movie-mouseover-home-top-submit').attr('hidden','hidden')
    $('#color-movie-mouseover-home-top-remove').attr('hidden','hidden')
}

function writeInLocalStorageColorMovieMouseoverHomeTop() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object color_movie_home_top */
        if ($("select[name='color_movie_mouseover_home_top']").val().length) {
            var color_home_top = {
                id: $("select[name='color_movie_mouseover_home_top'] option:selected").val(),
                name: $("select[name='color_movie_mouseover_home_top'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("color_movie_mouseover_home_top", JSON.stringify(color_home_top));
            var data = JSON.parse(localStorage.getItem("color_movie_mouseover_home_top"));
            $("select[name='color_movie_mouseover_home_top']").attr('disabled', 'disabled')
        }
        $('#color-movie-mouseover-home-top-submit').attr('hidden','hidden')
        $('#color-movie-mouseover-home-top-remove').attr('hidden','hidden')
        $('#color-movie-mouseover-home-top-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la couleur : " + data.name + " pour le titre des films sur le deuxième bandeau");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForColorMovieMouseoverHomeTop() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('color_movie_mouseover_home_top') != null) {
        localStorage.removeItem("color_movie_mouseover_home_top");
        $("select[name='color_movie_mouseover_home_top']").val('')
        $("select[name='color_movie_mouseover_home_top']").removeAttr('disabled')
        $('#color-movie-mouseover-home-top-delete').attr('hidden','hidden')
    }
}

/*
|---------------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FIRST MOVIE IN THE FIRST BAND OF MOVIES
|---------------------------------------------------------------------------------------------
|
|
*/
// Check if the first movie is saved locally for the first band of movies
if (localStorage.getItem('first_movie_top') != null) {
    var first_movie_top = JSON.parse(localStorage.getItem("first_movie_top"));
    $("input[name='first_movie_top']").val(first_movie_top.name)
    $("input[name='first_movie_top']").attr('disabled','disabled')
    $('#first-movie-top-delete').removeAttr('hidden')
}

// Show validation button if movie text is selected or entered
$("input[name='first_movie_top']").on("change keydown", function () {
    $('#first-movie-top-submit').removeAttr('hidden')
}); 

$("input[name='first_movie_top']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalFirstMovieTop();
    }
});

// Remove validation button if the field is empty
$("input[name='first_movie_top']").on("change blur", function () {
    if ($("input[name='first_movie_top']").val() == "") {
        $('#first-movie-top-submit').attr('hidden','hidden')
    }
});

function writeInLocalFirstMovieTop() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object first_movie_top */
        if ($("input[name='first_movie_top']").val().length) {
            var first_movie_top = {
                name: $("input[name='first_movie_top']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("first_movie_top", JSON.stringify(first_movie_top));
            var data = JSON.parse(localStorage.getItem("first_movie_top"));
            $("input[name='first_movie_top']").val(data.name)
            $("input[name='first_movie_top']").attr('disabled', 'disabled')
        }
        $('#first-movie-top-submit').attr('hidden', 'hidden')
        $('#first-movie-top-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du film en première position sur le deuxième bandeau : " + data.name);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFirstMovieTop() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('first_movie_top') != null) {
        localStorage.removeItem("first_movie_top");
        $("input[name='first_movie_top']").val('')
        $("input[name='first_movie_top']").removeAttr('disabled')
        $('#first-movie-top-delete').attr('hidden', 'hidden')
    }
}

/*
|---------------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE SECOND MOVIE IN THE FIRST BAND OF MOVIES
|---------------------------------------------------------------------------------------------
|
|
*/
// Check if the second movie is saved locally for the first band of movies
if (localStorage.getItem('second_movie_top') != null) {
    var second_movie_top = JSON.parse(localStorage.getItem("second_movie_top"));
    $("input[name='second_movie_top']").val(second_movie_top.name)
    $("input[name='second_movie_top']").attr('disabled','disabled')
    $('#second-movie-top-delete').removeAttr('hidden')
}

// Show validation button if movie text is selected or entered
$("input[name='second_movie_top']").on("change keydown", function () {
    $('#second-movie-top-submit').removeAttr('hidden')
});

$("input[name='second_movie_top']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalSecondMovieTop();
    }
});

// Show validation button if movie text is selected or entered
$("input[name='second_movie_top']").on("change blur", function () {
    if ($("input[name='second_movie_top']").val().length){
        $('#second-movie-top-submit').removeAttr('hidden')
    }
}); 

// Remove validation button if the field is empty
$("input[name='second_movie_top']").on("change blur", function () {
    if ($("input[name='second_movie_top']").val() == "") {
        $('#second-movie-top-submit').attr('hidden','hidden')
    }
});

function writeInLocalSecondMovieTop() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object second_movie_top */
        if ($("input[name='second_movie_top']").val().length) {
            var second_movie_top = {
                name: $("input[name='second_movie_top']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("second_movie_top", JSON.stringify(second_movie_top));
            var data = JSON.parse(localStorage.getItem("second_movie_top"));
            $("input[name='second_movie_top']").val(data.name)
            $("input[name='second_movie_top']").attr('disabled', 'disabled')
        }
        $('#second-movie-top-submit').attr('hidden', 'hidden')
        $('#second-movie-top-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du film en deuxième position sur le deuxième bandeau : " + data.name);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForSecondMovieTop() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('second_movie_top') != null) {
        localStorage.removeItem("second_movie_top");
        $("input[name='second_movie_top']").val('')
        $("input[name='second_movie_top']").removeAttr('disabled')
        $('#second-movie-top-delete').attr('hidden', 'hidden')
    }
}

/*
|---------------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE THIRD MOVIE IN THE FIRST BAND OF MOVIES
|---------------------------------------------------------------------------------------------
|
|
*/
// Check if the third movie is saved locally for the first band of movies
if (localStorage.getItem('third_movie_top') != null) {
    var third_movie_top = JSON.parse(localStorage.getItem("third_movie_top"));
    $("input[name='third_movie_top']").val(third_movie_top.name)
    $("input[name='third_movie_top']").attr('disabled','disabled')
    $('#third-movie-top-delete').removeAttr('hidden')
}

// Show validation button if movie text is selected or entered
$("input[name='third_movie_top']").on("change keydown", function () {
    $('#third-movie-top-submit').removeAttr('hidden')
}); 

$("input[name='third_movie_top']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalThirdMovieTop();
    }
});

// Show validation button if movie text is selected or entered
$("input[name='third_movie_top']").on("change blur", function () {
    if ($("input[name='third_movie_top']").val().length){
        $('#third-movie-top-submit').removeAttr('hidden')
    }
}); 

// Remove validation button if the field is empty
$("input[name='third_movie_top']").on("change blur", function () {
    if ($("input[name='third_movie_top']").val() == "") {
        $('#third-movie-top-submit').attr('hidden','hidden')
    }
});

function writeInLocalThirdMovieTop() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object third_movie_top */
        if ($("input[name='third_movie_top']").val().length) {
            var third_movie_top = {
                name: $("input[name='third_movie_top']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("third_movie_top", JSON.stringify(third_movie_top));
            var data = JSON.parse(localStorage.getItem("third_movie_top"));
            $("input[name='third_movie_top']").val(data.name)
            $("input[name='third_movie_top']").attr('disabled', 'disabled')
        }
        $('#third-movie-top-submit').attr('hidden', 'hidden')
        $('#third-movie-top-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du film en troisième position sur le deuxième bandeau : " + data.name);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForThirdMovieTop() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('third_movie_top') != null) {
        localStorage.removeItem("third_movie_top");
        $("input[name='third_movie_top']").val('')
        $("input[name='third_movie_top']").removeAttr('disabled')
        $('#third-movie-top-delete').attr('hidden', 'hidden')
    }
}
/*
|---------------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FOURTH MOVIE IN THE FIRST BAND OF MOVIES
|---------------------------------------------------------------------------------------------
|
|
*/
// Check if the fourth movie is saved locally for the first band of movies
if (localStorage.getItem('fourth_movie_top') != null) {
    var fourth_movie_top = JSON.parse(localStorage.getItem("fourth_movie_top"));
    $("input[name='fourth_movie_top']").val(fourth_movie_top.name)
    $("input[name='fourth_movie_top']").attr('disabled','disabled')
    $('#fourth-movie-top-delete').removeAttr('hidden')
}

// Show validation button if movie text is selected or entered
$("input[name='fourth_movie_top']").on("change keydown", function () {
    $('#fourth-movie-top-submit').removeAttr('hidden')
}); 

// Show validation button if movie text is selected or entered
$("input[name='fourth_movie_top']").on("change blur", function () {
    if ($("input[name='fourth_movie_top']").val().length){
        $('#fourth-movie-top-submit').removeAttr('hidden')
    }
}); 

$("input[name='fourth_movie_top']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalFourthMovieTop();
    }
});

// Remove validation button if the field is empty
$("input[name='fourth_movie_top']").on("change blur", function () {
    if ($("input[name='fourth_movie_top']").val() == "") {
        $('#fourth-movie-top-submit').attr('hidden','hidden')
    }
});

function writeInLocalFourthMovieTop() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object fourth_movie_top */
        if ($("input[name='fourth_movie_top']").val().length) {
            var fourth_movie_top = {
                name: $("input[name='fourth_movie_top']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("fourth_movie_top", JSON.stringify(fourth_movie_top));
            var data = JSON.parse(localStorage.getItem("fourth_movie_top"));
            $("input[name='fourth_movie_top']").val(data.name)
            $("input[name='fourth_movie_top']").attr('disabled', 'disabled')
        }
        $('#fourth-movie-top-submit').attr('hidden', 'hidden')
        $('#fourth-movie-top-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du film en quatrième position sur le deuxième bandeau : " + data.name);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFourthMovieTop() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('fourth_movie_top') != null) {
        localStorage.removeItem("fourth_movie_top");
        $("input[name='fourth_movie_top']").val('')
        $("input[name='fourth_movie_top']").removeAttr('disabled')
        $('#fourth-movie-top-delete').attr('hidden', 'hidden')
    }
}

/*
|---------------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FIFTH MOVIE IN THE FIRST BAND OF MOVIES
|---------------------------------------------------------------------------------------------
|
|
*/
// Check if the fifth movie is saved locally for the first band of movies
if (localStorage.getItem('fifth_movie_top') != null) {
    var fifth_movie_top = JSON.parse(localStorage.getItem("fifth_movie_top"));
    $("input[name='fifth_movie_top']").val(fifth_movie_top.name)
    $("input[name='fifth_movie_top']").attr('disabled','disabled')
    $('#fifth-movie-top-delete').removeAttr('hidden')
}

// Show validation button if movie text is selected or entered
$("input[name='fifth_movie_top']").on("change keydown", function () {
    $('#fifth-movie-top-submit').removeAttr('hidden')
}); 

// Show validation button if movie text is selected or entered
$("input[name='fifth_movie_top']").on("change blur", function () {
    if ($("input[name='fifth_movie_top']").val().length){
        $('#fifth-movie-top-submit').removeAttr('hidden')
    }
}); 

$("input[name='fifth_movie_top']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalFifthMovieTop();
    }
});

// Remove validation button if the field is empty
$("input[name='fifth_movie_top']").on("change blur", function () {
    if ($("input[name='fifth_movie_top']").val() == "") {
        $('#fifth-movie-top-submit').attr('hidden','hidden')
    }
});

// Validate field on key press enter
function writeInLocalFifthMovieTop() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object fifth_movie_top */
        if ($("input[name='fifth_movie_top']").val().length) {
            var fifth_movie_top = {
                name: $("input[name='fifth_movie_top']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("fifth_movie_top", JSON.stringify(fifth_movie_top));
            var data = JSON.parse(localStorage.getItem("fifth_movie_top"));
            $("input[name='fifth_movie_top']").val(data.name)
            $("input[name='fifth_movie_top']").attr('disabled', 'disabled')
        }
        $('#fifth-movie-top-submit').attr('hidden', 'hidden')
        $('#fifth-movie-top-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du film en cinquième position sur le deuxième bandeau : " + data.name);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFifthMovieTop() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('fifth_movie_top') != null) {
        localStorage.removeItem("fifth_movie_top");
        $("input[name='fifth_movie_top']").val('')
        $("input[name='fifth_movie_top']").removeAttr('disabled')
        $('#fifth-movie-top-delete').attr('hidden', 'hidden')
    }
}
///-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
///-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
/*
| --------------------------------------------------------------------------
| FONCTIONS TO EDIT THE BACKGROUND OF THE THIRD BAND OF TOP MOVIES
| --------------------------------------------------------------------------
|
|
*/

// Check if a color is saved locally for the background color
if (localStorage.getItem('backgroundColor_home_third_article') != null) {
    var backgroundColor_home_third_article = JSON.parse(localStorage.getItem("backgroundColor_home_third_article"));
    $("select[name='backgroundColor_home_third_article']").val(backgroundColor_home_third_article.id)
    $("select[name='backgroundColor_home_third_article'] option:selected")
    $("select[name='backgroundColor_home_third_article']").attr('disabled','disabled')
    $('#background-third-article-submit').attr('hidden')
    $('#background-third-article-remove').attr('hidden')
    $('#background-third-article-delete').removeAttr('hidden')
}

// Show validation button if color is selected
$("select[name='backgroundColor_home_third_article']").change(function () {
    if ($("select[name='backgroundColor_home_third_article'] option:selected").val().length) {
        $("select[name='backgroundColor_home_third_article']").attr('disabled','disabled')
        $('#background-third-article-submit').removeAttr('hidden')
        $('#background-third-article-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForBackgroundThirdArticle() {
    $("select[name='backgroundColor_home_third_article']").removeAttr('disabled')
    $("select[name='backgroundColor_home_third_article']").val('')
    $('#background-third-article-submit').attr('hidden','hidden')
    $('#background-third-article-remove').attr('hidden','hidden')
}

function writeInLocalStorageBackgroundThirdArticle() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object backgroundColor_home_third_article */
        if ($("select[name='backgroundColor_home_third_article']").val().length) {
            var backgroundColor_home_third_article = {
                id: $("select[name='backgroundColor_home_third_article'] option:selected").val(),
                name: $("select[name='backgroundColor_home_third_article'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("backgroundColor_home_third_article", JSON.stringify(backgroundColor_home_third_article));
            var data = JSON.parse(localStorage.getItem("backgroundColor_home_third_article"));
            $("select[name='backgroundColor_home_third_article']").attr('disabled','disabled')
        }
        $('#background-third-article-submit').attr('hidden','hidden')
        $('#background-third-article-remove').attr('hidden','hidden')
        $('#background-third-article-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la couleur : " + data.name + " pour l'arrière-plan du troisième bandeau");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForBackgroundThirdArticle() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('backgroundColor_home_third_article') != null) {
        localStorage.removeItem("backgroundColor_home_third_article");
        $("select[name='backgroundColor_home_third_article']").val('')
        $("select[name='backgroundColor_home_third_article']").removeAttr('disabled')
        $('#background-third-article-delete').attr('hidden', 'hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE TEXT OF TITLE FOR NEW MOVIES
|--------------------------------------------------------------------------
|
|
*/

// Check if a text is saved locally for the new movies
if (localStorage.getItem('text_home_new') != null) {
    var text_home_new = JSON.parse(localStorage.getItem("text_home_new"));
    $("input[name='text_home_new']").val(text_home_new.text)
    $("input[name='text_home_new']").attr('disabled', 'disabled')
    $('#text-home-new-delete').removeAttr('hidden')
}

// Show validation button if text is entered
$("input[name='text_home_new']").on("change keydown", function () {
    $('#text-home-new-submit').removeAttr('hidden')
});

$("input[name='text_home_new']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalTextNew();
    }
});

// Remove validation button if the field is empty
$("input[name='text_home_new']").on("change blur", function () {
    if ($("input[name='text_home_new']").val() == "") {
        $('#text-home-new-submit').attr('hidden', 'hidden')
    }
});

function writeInLocalTextNew() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object text_home_new */
        if ($("input[name='text_home_new']").val().length) {
            var text_home_new = {
                text: $("input[name='text_home_new']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("text_home_new", JSON.stringify(text_home_new));
            var data = JSON.parse(localStorage.getItem("text_home_new"));
            var display = data.text;
            $("input[name='text_home_new']").val(data.text)
            $("input[name='text_home_new']").attr('disabled', 'disabled')
        }
        $('#text-home-new-submit').attr('hidden', 'hidden')
        $('#text-home-new-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du texte pour le premier bandeau : " + display);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForTextNew() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('text_home_new') != null) {
        localStorage.removeItem("text_home_new");
        $("input[name='text_home_new']").val('')
        $("input[name='text_home_new']").removeAttr('disabled')
        $('#text-home-new-delete').attr('hidden', 'hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FONT OF TITLE FOR NEW MOVIES
|--------------------------------------------------------------------------
|
|
*/

// Check if a font is saved locally for the title
if (localStorage.getItem('font_home_new') != null) {
    var font_home_new = JSON.parse(localStorage.getItem("font_home_new"));
    $("select[name='font_home_new']").val(font_home_new.id)
    $("select[name='font_home_new'] option:selected")
    $("select[name='font_home_new']").attr('disabled','disabled')
    $('#font-home-new-submit').attr('hidden')
    $('#font-home-new-remove').attr('hidden')
    $('#font-home-new-delete').removeAttr('hidden')
}

// Show validation button if font is selected
$("select[name='font_home_new']").change(function () {
    if ($("select[name='font_home_new'] option:selected").val().length) {
        $("select[name='font_home_new']").attr('disabled','disabled')
        $('#font-home-new-submit').removeAttr('hidden')
        $('#font-home-new-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForFontHomeNew() {
    $("select[name='font_home_new']").removeAttr('disabled')
    $("select[name='font_home_new']").val('')
    $('#font-home-new-submit').attr('hidden','hidden')
    $('#font-home-new-remove').attr('hidden','hidden')
}
function writeInLocalStorageFontHomeNew() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object font_home_new */
        if ($("select[name='font_home_new']").val().length) {
            var font_home_new = {
                id: $("select[name='font_home_new'] option:selected").val(),
                name: $("select[name='font_home_new'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("font_home_new", JSON.stringify(font_home_new));
            var data = JSON.parse(localStorage.getItem("font_home_new"));
            $("select[name='font_home_new']").attr('disabled','disabled')
        }
        $('#font-home-new-submit').attr('hidden','hidden')
        $('#font-home-new-remove').attr('hidden','hidden')
        $('#font-home-new-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la police : " + data.name + " pour le titre du troisième bandeau");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFontHomeNew() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('font_home_new') != null) {
        localStorage.removeItem("font_home_new");
        $("select[name='font_home_new']").val('')
        $("select[name='font_home_new']").removeAttr('disabled')
        $('#font-home-new-delete').attr('hidden','hidden')
    }
}

/*
|--------------------------------------------------------------------------
| FONCTIONS TO EDIT THE COLOR OF TITLE FOR NEW MOVIES
|--------------------------------------------------------------------------
|
|
*/

// Check if a color is saved locally for the title of new movies
if (localStorage.getItem('color_home_new') != null) {
    var color_home_new = JSON.parse(localStorage.getItem("color_home_new"));
    $("select[name='color_home_new']").val(color_home_new.id)
    $("select[name='color_home_new'] option:selected")
    $("select[name='color_home_new']").attr('disabled', 'disabled')
    $('#color-home-new-submit').attr('hidden')
    $('#color-home-new-remove').attr('hidden')
    $('#color-home-new-delete').removeAttr('hidden')
}

// Show validation button if color is selected
$("select[name='color_home_new']").change(function () {
    if ($("select[name='color_home_new'] option:selected").val().length) {
        $("select[name = 'color_home_new']").attr('disabled', 'disabled')
        $('#color-home-new-submit').removeAttr('hidden')
        $('#color-home-new-remove').removeAttr('hidden')
    }
});
function retrunSelectOptionForColorHomeNew() {
    $("select[name='color_home_new']").removeAttr('disabled')
    $("select[name='color_home_new']").val('')
    $('#color-home-new-submit').attr('hidden', 'hidden')
    $('#color-home-new-remove').attr('hidden', 'hidden')
}
function writeInLocalStorageColorHomeNew() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object color_home_new */
        if ($("select[name='color_home_new']").val().length) {
            var color_home_new = {
                id: $("select[name='color_home_new'] option:selected").val(),
                name: $("select[name='color_home_new'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("color_home_new", JSON.stringify(color_home_new));
            var data = JSON.parse(localStorage.getItem("color_home_new"));
            $("select[name='color_home_new']").attr('disabled', 'disabled')
        }
        $('#color-home-new-submit').attr('hidden', 'hidden')
        $('#color-home-new-remove').attr('hidden', 'hidden')
        $('#color-home-new-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la couleur : " + data.name + " pour le titre du troisième bandeau");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForColorHomeNew() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('color_home_new') != null) {
        localStorage.removeItem("color_home_new");
        $("select[name='color_home_new']").val('')
        $("select[name='color_home_new']").removeAttr('disabled')
        $('#color-home-new-delete').attr('hidden', 'hidden')
    }
}

/*
|-------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FONT OF THE TITLE OF THE MOVIES IN CAPTION OF THE POSTER
|-------------------------------------------------------------------------------
|
|
*/

// Check if a font is saved locally for the title of movies
if (localStorage.getItem('font_movie_home_new') != null) {
    var font_movie_home_new = JSON.parse(localStorage.getItem("font_movie_home_new"));
    $("select[name='font_movie_home_new']").val(font_home_new.id)
    $("select[name='font_movie_home_new'] option:selected")
    $("select[name='font_movie_home_new']").attr('disabled', 'disabled')
    $('#font-movie-home-new-submit').attr('hidden')
    $('#font-movie-home-new-remove').attr('hidden')
    $('#font-movie-home-new-delete').removeAttr('hidden')
}

// Show validation button if font is selected
$("select[name='font_movie_home_new']").change(function () {
    if ($("select[name='font_movie_home_new'] option:selected").val().length) {
        $("select[name = 'font_movie_home_new']").attr('disabled', 'disabled')
        $('#font-movie-home-new-submit').removeAttr('hidden')
        $('#font-movie-home-new-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForFontMovieHomeNew() {
    $("select[name='font_movie_home_new']").removeAttr('disabled')
    $("select[name='font_movie_home_new']").val('')
    $('#font-movie-home-new-submit').attr('hidden', 'hidden')
    $('#font-movie-home-new-remove').attr('hidden', 'hidden')
}

function writeInLocalStorageFontMovieHomeNew() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object font_movie_home_new */
        if ($("select[name='font_movie_home_new']").val().length) {
            var font_movie_home_new = {
                id: $("select[name='font_movie_home_new'] option:selected").val(),
                name: $("select[name='font_movie_home_new'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("font_movie_home_new", JSON.stringify(font_movie_home_new));
            var data = JSON.parse(localStorage.getItem("font_movie_home_new"));
            $("select[name='font_movie_home_new']").attr('disabled', 'disabled')
        }
        $('#font-movie-home-new-submit').attr('hidden', 'hidden')
        $('#font-movie-home-new-remove').attr('hidden', 'hidden')
        $('#font-movie-home-new-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la police : " + data.name + " pour le titre des films sur le troisième bandeau");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFontMovieHomeNew() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('font_movie_home_new') != null) {
        localStorage.removeItem("font_movie_home_new");
        $("select[name='font_movie_home_new']").val('')
        $("select[name='font_movie_home_new']").removeAttr('disabled')
        $('#font-movie-home-new-delete').attr('hidden', 'hidden')
    }
}



/*
|---------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE COLOR OF THE TITLE OF THE MOVIES IN CAPTION OF THE POSTER
|---------------------------------------------------------------------------------------
|
|
*/

// Check if a color is saved locally for the color of the title of movies
if (localStorage.getItem('color_movie_home_new') != null) {
    var color_movie_home_new = JSON.parse(localStorage.getItem("color_movie_home_new"));
    $("select[name='color_movie_home_new']").val(color_home_new.id)
    $("select[name='color_movie_home_new'] option:selected")
    $("select[name='color_movie_home_new']").attr('disabled','disabled')
    $('#color-movie-home-new-submit').attr('hidden')
    $('#color-movie-home-new-remove').attr('hidden')
    $('#color-movie-home-new-delete').removeAttr('hidden')
}

// Show validation button if color is selected
$("select[name='color_movie_home_new']").change(function () {
    if ($("select[name='color_movie_home_new'] option:selected").val().length) {
        $("select[name='color_movie_home_new']").attr('disabled','disabled')
        $('#color-movie-home-new-submit').removeAttr('hidden')
        $('#color-movie-home-new-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForColorMovieHomeNew() {
    $("select[name='color_movie_home_new']").removeAttr('disabled')
    $("select[name='color_movie_home_new']").val('')
    $('#color-movie-home-new-submit').attr('hidden','hidden')
    $('#color-movie-home-new-remove').attr('hidden','hidden')
}

function writeInLocalStorageColorMovieHomeNew() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object color_movie_home_new */
        if ($("select[name='color_movie_home_new']").val().length) {
            var color_home_new = {
                id: $("select[name='color_movie_home_new'] option:selected").val(),
                name: $("select[name='color_movie_home_new'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("color_movie_home_new", JSON.stringify(color_home_new));
            var data = JSON.parse(localStorage.getItem("color_movie_home_new"));
            $("select[name='color_movie_home_new']").attr('disabled','disabled')
        }
        $('#color-movie-home-new-submit').attr('hidden','hidden')
        $('#color-movie-home-new-remove').attr('hidden','hidden')
        $('#color-movie-home-new-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la couleur : " + data.name + " pour le titre des films sur le troisième bandeau");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForColorMovieHomeNew() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('color_movie_home_new') != null) {
        localStorage.removeItem("color_movie_home_new");
        $("select[name='color_movie_home_new']").val('')
        $("select[name='color_movie_home_new']").removeAttr('disabled')
        $('#color-movie-home-new-delete').attr('hidden','hidden')
    }
}

/*
|---------------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE COLOR ON MOUSEOVER OF THE TITLE OF THE MOVIES IN CAPTION OF THE POSTER
|---------------------------------------------------------------------------------------------
|
|
*/

// Check if a color is saved locally for the color on mouseover of the title of movies
if (localStorage.getItem('color_movie_mouseover_home_new') != null) {
    var color_movie_home_new = JSON.parse(localStorage.getItem("color_movie_mouseover_home_new"));
    $("select[name='color_movie_mouseover_home_new']").val(color_home_new.id)
    $("select[name='color_movie_mouseover_home_new'] option:selected")
    $("select[name='color_movie_mouseover_home_new']").attr('disabled','disabled')
    $('#color-movie-mouseover-home-new-submit').attr('hidden')
    $('#color-movie-mouseover-home-new-remove').attr('hidden')
    $('#color-movie-mouseover-home-new-delete').removeAttr('hidden')
}

// Show validation button if color is selected
$("select[name='color_movie_mouseover_home_new']").change(function () {
    if ($("select[name='color_movie_mouseover_home_new'] option:selected").val().length) {
        $("select[name='color_movie_mouseover_home_new']").attr('disabled','disabled')
        $('#color-movie-mouseover-home-new-submit').removeAttr('hidden')
        $('#color-movie-mouseover-home-new-remove').removeAttr('hidden')
    }
});

function retrunSelectOptionForColorMovieMouseoverHomeNew() {
    $("select[name='color_movie_mouseover_home_new']").removeAttr('disabled')
    $("select[name='color_movie_mouseover_home_new']").val('')
    $('#color-movie-mouseover-home-new-submit').attr('hidden','hidden')
    $('#color-movie-mouseover-home-new-remove').attr('hidden','hidden')
}

function writeInLocalStorageColorMovieMouseoverHomeNew() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object color_movie_home_new */
        if ($("select[name='color_movie_mouseover_home_new']").val().length) {
            var color_home_new = {
                id: $("select[name='color_movie_mouseover_home_new'] option:selected").val(),
                name: $("select[name='color_movie_mouseover_home_new'] option:selected").text()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("color_movie_mouseover_home_new", JSON.stringify(color_home_new));
            var data = JSON.parse(localStorage.getItem("color_movie_mouseover_home_new"));
            $("select[name='color_movie_mouseover_home_new']").attr('disabled','disabled')
        }
        $('#color-movie-mouseover-home-new-submit').attr('hidden','hidden')
        $('#color-movie-mouseover-home-new-remove').attr('hidden','hidden')
        $('#color-movie-mouseover-home-new-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement de la couleur : " + data.name + " pour le titre des films sur le troisième bandeau");
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForColorMovieMouseoverHomeNew() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('color_movie_mouseover_home_new') != null) {
        localStorage.removeItem("color_movie_mouseover_home_new");
        $("select[name='color_movie_mouseover_home_new']").val('')
        $("select[name='color_movie_mouseover_home_new']").removeAttr('disabled')
        $('#color-movie-mouseover-home-new-delete').attr('hidden','hidden')
    }
}

/*
|---------------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FIRST MOVIE IN THE SECOND BAND OF MOVIES
|---------------------------------------------------------------------------------------------
|
|
*/
// Check if the first movie is saved locally for the second band of movies
if (localStorage.getItem('first_movie_new') != null) {
    var first_movie_new = JSON.parse(localStorage.getItem("first_movie_new"));
    $("input[name='first_movie_new']").val(first_movie_new.name)
    $("input[name='first_movie_new']").attr('disabled', 'disabled')
    $('#first-movie-new-delete').removeAttr('hidden')
}

// Show validation button if movie text is selected or entered
$("input[name='first_movie_new']").on("change keydown", function () {
    $('#first-movie-new-submit').removeAttr('hidden')    
});


$("input[name='first_movie_new']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalFirstMovieNew();
    }
});

// Remove validation button if the field is empty
$("input[name='first_movie_new']").on("change blur", function () {
    if ($("input[name='first_movie_new']").val() == "") {
        $('#first-movie-new-submit').attr('hidden', 'hidden')
    }
});

function writeInLocalFirstMovieNew() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object first_movie_new */
        if ($("input[name='first_movie_new']").val().length) {
            var first_movie_new = {
                name: $("input[name='first_movie_new']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("first_movie_new", JSON.stringify(first_movie_new));
            var data = JSON.parse(localStorage.getItem("first_movie_new"));
            $("input[name='first_movie_new']").val(data.name)
            $("input[name='first_movie_new']").attr('disabled', 'disabled')
        }
        $('#first-movie-new-submit').attr('hidden', 'hidden')
        $('#first-movie-new-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du film en première position sur le troisième bandeau : " + data.name);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFirstMovieNew() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('first_movie_new') != null) {
        localStorage.removeItem("first_movie_new");
        $("input[name='first_movie_new']").val('')
        $("input[name='first_movie_new']").removeAttr('disabled')
        $('#first-movie-new-delete').attr('hidden', 'hidden')
    }
}

/*
|---------------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE SECOND MOVIE IN THE SECOND BAND OF MOVIES
|---------------------------------------------------------------------------------------------
|
|
*/
// Check if the second movie is saved locally for the second band of movies
if (localStorage.getItem('second_movie_new') != null) {
    var second_movie_new = JSON.parse(localStorage.getItem("second_movie_new"));
    $("input[name='second_movie_new']").val(second_movie_new.name)
    $("input[name='second_movie_new']").attr('disabled', 'disabled')
    $('#second-movie-new-delete').removeAttr('hidden')
}

// Show validation button if movie text is selected or entered
$("input[name='second_movie_new']").on("change keydown", function () {
    $('#second-movie-new-submit').removeAttr('hidden')
});

$("input[name='second_movie_new']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalSecondMovieNew();
    }
});

// Show validation button if movie text is selected or entered
$("input[name='second_movie_new']").on("change blur", function () {
    if ($("input[name='second_movie_new']").val().length) {
        $('#second-movie-new-submit').removeAttr('hidden')
    }
});

// Remove validation button if the field is empty
$("input[name='second_movie_new']").on("change blur", function () {
    if ($("input[name='second_movie_new']").val() == "") {
        $('#second-movie-new-submit').attr('hidden', 'hidden')
    }
});

function writeInLocalSecondMovieNew() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object second_movie_new */
        if ($("input[name='second_movie_new']").val().length) {
            var second_movie_new = {
                name: $("input[name='second_movie_new']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("second_movie_new", JSON.stringify(second_movie_new));
            var data = JSON.parse(localStorage.getItem("second_movie_new"));
            $("input[name='second_movie_new']").val(data.name)
            $("input[name='second_movie_new']").attr('disabled', 'disabled')
        }
        $('#second-movie-new-submit').attr('hidden', 'hidden')
        $('#second-movie-new-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du film en deuxième position sur le troisième bandeau : " + data.name);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForSecondMovieNew() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('second_movie_new') != null) {
        localStorage.removeItem("second_movie_new");
        $("input[name='second_movie_new']").val('')
        $("input[name='second_movie_new']").removeAttr('disabled')
        $('#second-movie-new-delete').attr('hidden', 'hidden')
    }
}

/*
|---------------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE THIRD MOVIE IN THE SECOND BAND OF MOVIES
|---------------------------------------------------------------------------------------------
|
|
*/
// Check if the third movie is saved locally for the second band of movies
if (localStorage.getItem('third_movie_new') != null) {
    var third_movie_new = JSON.parse(localStorage.getItem("third_movie_new"));
    $("input[name='third_movie_new']").val(third_movie_new.name)
    $("input[name='third_movie_new']").attr('disabled','disabled')
    $('#third-movie-new-delete').removeAttr('hidden')
}

// Show validation button if movie text is selected or entered
$("input[name='third_movie_new']").on("change keydown", function () {
    $('#third-movie-new-submit').removeAttr('hidden')
});

$("input[name='third_movie_new']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalThirdMovieNew();
    }
});

// Show validation button if movie text is selected or entered
$("input[name='third_movie_new']").on("change blur", function () {
    if ($("input[name='third_movie_new']").val().length) {
        $('#third-movie-new-submit').removeAttr('hidden')
    }
});

// Remove validation button if the field is empty
$("input[name='third_movie_new']").on("change blur", function () {
    if ($("input[name='third_movie_new']").val() == "") {
        $('#third-movie-new-submit').attr('hidden','hidden')
    }
});

function writeInLocalThirdMovieNew() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object third_movie_new */
        if ($("input[name='third_movie_new']").val().length) {
            var third_movie_new = {
                name: $("input[name='third_movie_new']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("third_movie_new", JSON.stringify(third_movie_new));
            var data = JSON.parse(localStorage.getItem("third_movie_new"));
            $("input[name='third_movie_new']").val(data.name)
            $("input[name='third_movie_new']").attr('disabled','disabled')
        }
        $('#third-movie-new-submit').attr('hidden','hidden')
        $('#third-movie-new-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du film en troisième position sur le troisième bandeau : " + data.name);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForThirdMovieNew() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('third_movie_new') != null) {
        localStorage.removeItem("third_movie_new");
        $("input[name='third_movie_new']").val('')
        $("input[name='third_movie_new']").removeAttr('disabled')
        $('#third-movie-new-delete').attr('hidden','hidden')
    }
}
/*
|---------------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FOURTH MOVIE IN THE SECOND BAND OF MOVIES
|---------------------------------------------------------------------------------------------
|
|
*/
// Check if the fourth movie is saved locally for the second band of movies
if (localStorage.getItem('fourth_movie_new') != null) {
    var fourth_movie_new = JSON.parse(localStorage.getItem("fourth_movie_new"));
    $("input[name='fourth_movie_new']").val(fourth_movie_new.name)
    $("input[name='fourth_movie_new']").attr('disabled', 'disabled')
    $('#fourth-movie-new-delete').removeAttr('hidden')
}

// Show validation button if movie text is selected or entered
$("input[name='fourth_movie_new']").on("change keydown", function () {
    $('#fourth-movie-new-submit').removeAttr('hidden')
});

// Show validation button if movie text is selected or entered
$("input[name='fourth_movie_new']").on("change blur", function () {
    if ($("input[name='fourth_movie_new']").val().length) {
        $('#fourth-movie-new-submit').removeAttr('hidden')
    }
});

$("input[name='fourth_movie_new']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalFourthMovieNew();
    }
});

// Remove validation button if the field is empty
$("input[name='fourth_movie_new']").on("change blur", function () {
    if ($("input[name='fourth_movie_new']").val() == "") {
        $('#fourth-movie-new-submit').attr('hidden', 'hidden')
    }
});

function writeInLocalFourthMovieNew() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object fourth_movie_new */
        if ($("input[name='fourth_movie_new']").val().length) {
            var fourth_movie_new = {
                name: $("input[name='fourth_movie_new']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("fourth_movie_new", JSON.stringify(fourth_movie_new));
            var data = JSON.parse(localStorage.getItem("fourth_movie_new"));
            $("input[name='fourth_movie_new']").val(data.name)
            $("input[name='fourth_movie_new']").attr('disabled', 'disabled')
        }
        $('#fourth-movie-new-submit').attr('hidden', 'hidden')
        $('#fourth-movie-new-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du film en quatrième position sur le troisième bandeau : " + data.name);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFourthMovieNew() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('fourth_movie_new') != null) {
        localStorage.removeItem("fourth_movie_new");
        $("input[name='fourth_movie_new']").val('')
        $("input[name='fourth_movie_new']").removeAttr('disabled')
        $('#fourth-movie-new-delete').attr('hidden', 'hidden')
    }
}

/*
|---------------------------------------------------------------------------------------------
| FONCTIONS TO EDIT THE FIFTH MOVIE IN THE SECOND BAND OF MOVIES
|---------------------------------------------------------------------------------------------
|
|
*/
// Check if the fifth movie is saved locally for the second band of movies
if (localStorage.getItem('fifth_movie_new') != null) {
    var fifth_movie_new = JSON.parse(localStorage.getItem("fifth_movie_new"));
    $("input[name='fifth_movie_new']").val(fifth_movie_new.name)
    $("input[name='fifth_movie_new']").attr('disabled', 'disabled')
    $('#fifth-movie-new-delete').removeAttr('hidden')
}

// Show validation button if movie text is selected or entered
$("input[name='fifth_movie_new']").on("change keydown", function () {
    $('#fifth-movie-new-submit').removeAttr('hidden')
});

// Show validation button if movie text is selected or entered
$("input[name='fifth_movie_new']").on("change blur", function () {
    if ($("input[name='fifth_movie_new']").val().length) {
        $('#fifth-movie-new-submit').removeAttr('hidden')
    }
});

$("input[name='fifth_movie_new']").keypress(function (e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        writeInLocalFifthMovieNew();
    }
});

// Remove validation button if the field is empty
$("input[name='fifth_movie_new']").on("change blur", function () {
    if ($("input[name='fifth_movie_new']").val() == "") {
        $('#fifth-movie-new-submit').attr('hidden', 'hidden')
    }
});

// Validate field on key press enter
function writeInLocalFifthMovieNew() {
    /* Test possibility to use localStorage and JSON*/
    if (typeof localStorage != "undefined" && JSON) {
        /* Definition of a Javascript object fifth_movie_new */
        if ($("input[name='fifth_movie_new']").val().length) {
            var fifth_movie_new = {
                name: $("input[name='fifth_movie_new']").val()
            }
            /* Serialization to a JSON object */
            localStorage.setItem("fifth_movie_new", JSON.stringify(fifth_movie_new));
            var data = JSON.parse(localStorage.getItem("fifth_movie_new"));
            $("input[name='fifth_movie_new']").val(data.name)
            $("input[name='fifth_movie_new']").attr('disabled', 'disabled')
        }
        $('#fifth-movie-new-submit').attr('hidden', 'hidden')
        $('#fifth-movie-new-delete').removeAttr('hidden')
        /* Control display */
        alert("Enregistrement du film en cinquième position sur le troisième bandeau : " + data.name);
    } else {
        /* Error message (no possibility localStorage) */
        alert("localStorage n'est pas supporté");
    }
}

function deleteOptionSelectedForFifthMovieNew() {
    /* Deleting the identity entry in the localStorage */
    /* NB: sessionStorage.clear (); would also remove all localStorage entries */
    if (localStorage.getItem('fifth_movie_new') != null) {
        localStorage.removeItem("fifth_movie_new");
        $("input[name='fifth_movie_new']").val('')
        $("input[name='fifth_movie_new']").removeAttr('disabled')
        $('#fifth-movie-new-delete').attr('hidden', 'hidden')
    }
}