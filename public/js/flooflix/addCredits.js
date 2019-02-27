// FLOOFLIX 

/*
|--------------------------------------------------------------------------
| FLOOFLIX - ADD CREDITS
|--------------------------------------------------------------------------
|
| script used for the credit addition form page:
|
*/

// collect variables from HomeController
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
        black = element;
    }
});
for (var obj in colors) {
    if (colors[obj].name == black.name) {
        let article = document.getElementsByTagName("article");
        console.log(article);

        for (const key in article) {
            if (article.hasOwnProperty(key)) {
                const element = article[key];
                element.style.backgroundColor = black.name;
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

// font and color for paragrah
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_paragraphs = element;
    }
});
colors.forEach(element => {
    if (element.name == 'black') {
        color_paragraphs = element;
    }
});
var paragraphs = document.getElementsByTagName("p");
for (var obj in fonts) {
    if (fonts[obj].name == font_paragraphs.name) {
        for (const key in paragraphs) {
            if (paragraphs.hasOwnProperty(key)) {
                const element = paragraphs[key];
                element.style.fontFamily = '"' + font_paragraphs.style + '"';
            }
        }
    }
}

for (var obj in colors) {
    if (colors[obj].name == color_paragraphs.name) {
        for (const key in paragraphs) {
            if (paragraphs.hasOwnProperty(key)) {
                const element = paragraphs[key];
                element.style.color = color_paragraphs.name;
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
