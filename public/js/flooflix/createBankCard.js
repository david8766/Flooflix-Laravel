// FLOOFLIX - SCRIPT

/*
|--------------------------------------------------------------------------
| FLOOFLIX - CREATE BANK CARD
|--------------------------------------------------------------------------
|
| script used for the create bank card page:
|
*/

// collect variables from UserController
var fonts = varJS.fonts;
var colors = varJS.colors;
var pictures = varJS.pictures;
var texts = varJS.texts;

console.dir(fonts);
console.log(colors);
console.log(pictures);
console.log(texts);

// background color for article
colors.forEach(element => {
    if (element.name == 'black') {
        background_color_article = element;
    }
});
for (var obj in colors) {
    if (colors[obj].name == background_color_article.name) {
        let article = document.getElementsByTagName("article");
        console.log(article);

        for (const key in article) {
            if (article.hasOwnProperty(key)) {
                const element = article[key];
                element.style.backgroundColor = colors[obj].rgb;
                element.style.opacity = colors[obj].opacity;
            }
        }
    }
}

// background color for block
colors.forEach(element => {
    if (element.name == 'white') {
        background_color_block = element;
    }
});
var block = document.getElementById("bg");
for (var obj in colors) {
    if (colors[obj].name == background_color_block.name) {
        block.style.backgroundColor = colors[obj].rgb;
        block.style.opacity = colors[obj].opacity;
    }
}

// font and color for title
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_title = element;
    }
});
colors.forEach(element => {
    if (element.name == 'black') {
        color_title = element;
    }
});
for (var obj in fonts) {
    if (fonts[obj].name == font_title.name) {
        document.getElementById("title").style.fontFamily = '"' + font_title.style + '"';
    }
}
for (var obj in colors) {
    if (colors[obj].name == color_title.name) {
        document.getElementById("title").style.color = color_title.rgb;
        document.getElementById("title").style.opacity = color_title.opacity;
    }
}

// font and color for labels
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_labels = element;
    }
});
colors.forEach(element => {
    if (element.name == 'black') {
        color_labels = element;
    }
});
for (var obj in fonts) {
    if (fonts[obj].name == font_labels.name) {
        let labels = document.getElementsByTagName("label");
        for (const key in labels) {
            if (labels.hasOwnProperty(key)) {
                const element = labels[key];
                element.style.fontFamily = '"' + font_labels.style + '"';
            }
        }
    }
}

for (var obj in colors) {
    if (colors[obj].name == color_labels.name) {
        let labels = document.getElementsByTagName("label");
        for (const key in labels) {
            if (labels.hasOwnProperty(key)) {
                const element = labels[key];
                element.style.fcolor = color_labels.name;
            }
        }
    }
}

// font and color for button
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_buttons = element;
    }
});
colors.forEach(element => {
    if (element.name == 'black') {
        color_buttons = element;
    }
});
colors.forEach(element => {
    if (element.name == 'coral') {
        color_mouseover_buttons = element;
    }
});
var buttons = document.getElementsByClassName("btn-color");
for (var obj in fonts) {
    if (fonts[obj].name == font_buttons.name) {
        let buttons = document.getElementsByClassName("btn-color");
        for (const key in buttons) {
            if (buttons.hasOwnProperty(key)) {
                const element = buttons[key];
                element.style.fontFamily = '"' + font_buttons.style + '"';
            }
        }
    }
}
for (var obj in colors) {
    for (const key in buttons) {
        if (buttons.hasOwnProperty(key)) {
            const element = buttons[key];
            element.style.backgroundColor = "yellow";
            
            if (colors[obj].name == color_buttons.name) {
                element.style.color = colors[obj].rgb;
                element.style.opacity = colors[obj].opacity;
                let mouseout = colors[obj];
                element.addEventListener('mouseout', function (event) {
                    element.style.color = mouseout.rgb;
                    element.style.opacity = mouseout.opacity;
                });
            }
            if (colors[obj].name == color_mouseover_buttons.name) {
                let mouseover = colors[obj];
                element.addEventListener('mouseover', function (event) {
                    element.style.color = mouseover.rgb;
                    element.style.opacity = mouseover.opacity;
                });
            }
        }

    }
}

// font and color for cancellation link
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_link = element;
    }
});
colors.forEach(element => {
    if (element.name == 'black') {
        color_link = element;
    }
});
colors.forEach(element => {
    if (element.name == 'coral') {
        color_mouseover_link = element;
    }
});
link = document.getElementById("link");

for (var obj in fonts) {
    if (fonts[obj].name == font_link.name) {
        link.style.fontFamily = '"' + font_link.style + '"';
    }
}
for (var obj in colors) {
    if (colors[obj].name == color_link.name) {
        link.style.color = colors[obj].rgb;
        link.style.opacity = colors[obj].opacity;
        let mouseout = colors[obj];
        link.addEventListener('mouseout', function (event) {
            link.style.color = mouseout.rgb;
            link.style.opacity = mouseout.opacity;
        });
    }
    if (colors[obj].name == color_mouseover_link.name) {
        let mouseover = colors[obj];
        link.addEventListener('mouseover', function (event) {
            link.style.color = mouseover.rgb;
            link.style.opacity = mouseover.opacity;
        });
    }
}

function verif_nombre(champ) {
    var chiffres = new RegExp("[0-9]");
    var verif;
    var points = 0;

    for (x = 0; x < champ.value.length; x++) {
        verif = chiffres.test(champ.value.charAt(x));
        if (champ.value.charAt(x) == ".") {
            points++;
        }
        if (points > 1) {
            verif = false;
            points = 1;
        }
        if (verif == false) {
            champ.value = champ.value.substr(0, x) + champ.value.substr(x + 1, champ.value.length - x + 1);
            x--;
        }
    }
}