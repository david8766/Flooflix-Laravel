// FLOOFLIX 

/*
|--------------------------------------------------------------------------
| FLOOFLIX - LOGIN
|--------------------------------------------------------------------------
|
| script used for the login page:
|
*/

// collect variables from LoginController
var fonts = varJS.fonts;
var colors = varJS.colors;
var pictures = varJS.pictures;
var texts = varJS.texts;


console.dir(fonts);
console.dir(colors);
console.dir(pictures);
console.dir(texts);

fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_global = element;
    }
});

// background color for body
colors.forEach(element => {
    if (element.name == 'black') {
        color_body = element;
    }
});

for (var obj in colors) {
    if (colors[obj].name == color_body.name) {
        document.body.style.backgroundColor = color_body.rgb;
        document.body.style.backgroundColor = color_body.opacity;
    }
}

// background color for login bloc
colors.forEach(element => {
    if (element.name == 'white') {
        color_login = element;
    }
});
for (var obj in colors) {
    if (colors[obj].name == color_login.name) {
        console.log(document.getElementById("bg"));  
        document.getElementById("bg").style.backgroundColor = color_login.rgb;
        document.getElementById("bg").style.backgroundColor = color_login.opacity;
    }
}

// fonts and colors for global text
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_global = element;
    }
});
colors.forEach(element => {
    if (element.name == 'black') {
        color_global = element;
    }
});
colors.forEach(element => {
    if (element.name == 'coral') {
        color_mouseover_global = element;
    }
});

var links = document.getElementsByClassName("links");

for (var obj in fonts) {
    if (fonts[obj].name == font_global.name) {
        let texts = document.getElementsByClassName("global");
        for (const key in texts) {
            if (texts.hasOwnProperty(key)) {
                const element = texts[key];
                element.style.fontFamily = '"' + font_global.style + '"';
            }
        }
    }
}

for (var obj in fonts) {
    if (fonts[obj].name == font_global.name) {
        for (const key in links) {
            if (links.hasOwnProperty(key)) {
                const element = links[key];
                element.style.fontFamily = '"' + font_global.style + '"';
            }
        }
    }
}

for (var obj in colors) {
    for (const key in links) {
        if (links.hasOwnProperty(key)) {
            const element = links[key];
            if (colors[obj].name == color_global.name) {
                element.style.color = colors[obj].rgb;
                element.style.opacity = colors[obj].opacity;
                let mouseout = colors[obj];
                element.addEventListener('mouseout', function (event) {
                    element.style.color = mouseout.rgb;
                    element.style.opacity = mouseout.opacity;
                });
            }
            if (colors[obj].name == color_mouseover_global.name) {
                let mouseover = colors[obj];
                element.addEventListener('mouseover', function (event) {
                    element.style.color = mouseover.rgb;
                    element.style.opacity = mouseover.opacity;
                });
            }
        }
    }
}
