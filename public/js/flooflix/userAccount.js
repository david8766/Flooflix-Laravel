// FLOOFLIX - SCRIPT

/*
|--------------------------------------------------------------------------
| FLOOFLIX - USER ACCOUNT 
|--------------------------------------------------------------------------
|
| script used for the user account page:
|
*/

// collect variables from UserController
var fonts = varJS.fonts;
var colors = varJS.colors;
var pictures = varJS.pictures;
var texts = varJS.texts;

console.dir(fonts);
console.log(colors);
console.dir(pictures);
console.dir(texts);

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
                element.style.backgroundColor = background_color_article.rgb;
                element.style.backgroundColor = background_color_article.opacity;
            }
        }
    }
}

// background color for the cards
colors.forEach(element => {
    if (element.name == 'white') {
        background_color_cards = element;
    }
});
for (var obj in colors) {
    if (colors[obj].name == background_color_cards.name) {
        let paragraphs = document.getElementsByClassName("card");
        for (const key in paragraphs) {
            if (paragraphs.hasOwnProperty(key)) {
                const element = paragraphs[key];
                element.style.backgroundColor = background_color_cards.rgb;
                element.style.backgroundColor = background_color_cards.opacity;
            }
        }
    }
}

// font and color for the cards title
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_cards_title = element;
    }
});
colors.forEach(element => {
    if (element.name == 'black') {
        color_cards_title = element;
    }
});
for (var obj in fonts) {
    if (fonts[obj].name == font_cards_title.name) {
        let paragraphs = document.getElementsByClassName("card-title");
        for (const key in paragraphs) {
            if (paragraphs.hasOwnProperty(key)) {
                const element = paragraphs[key];
                element.style.fontFamily = '"' + font_cards_title.style + '"';
            }
        }
    }
}
for (var obj in colors) {
    if (colors[obj].name == color_cards_title.name) {
        let paragraphs = document.getElementsByClassName("card-title");
        for (const key in paragraphs) {
            if (paragraphs.hasOwnProperty(key)) {
                const element = paragraphs[key];
                element.style.color = color_cards_title.rgb;
                element.style.color = color_cards_title.opacity;
            }
        }
    }
}

// font and color for the first card paragraph
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_first_card_paragraph = element;
    }
});
colors.forEach(element => {
    if (element.name == 'black') {
        color_first_card_paragraph = element;
    }
});
for (var obj in fonts) {
    if (fonts[obj].name == font_first_card_paragraph.name) {
        let paragraphs = document.getElementsByClassName("card-text");
        for (const key in paragraphs) {
            if (paragraphs.hasOwnProperty(key)) {
                const element = paragraphs[key];
                element.style.fontFamily = '"' + font_first_card_paragraph.style + '"';
            }
        }
    }
}
for (var obj in colors) {
    if (colors[obj].name == color_first_card_paragraph.name) {
        let paragraphs = document.getElementsByClassName("card-text");
        for (const key in paragraphs) {
            if (paragraphs.hasOwnProperty(key)) {
                const element = paragraphs[key];
                element.style.color = color_first_card_paragraph.rgb;
                element.style.color = color_first_card_paragraph.opacity;
            }
        }
    }
}

// font and color for hictoric link
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_historic_link = element;
    }
});
colors.forEach(element => {
    if (element.name == 'black') {
        color_historic_link = element;
    }
});
colors.forEach(element => {
    if (element.name == 'coral') {
        color_mousehover_historic_link = element;
    }
});
var historic = document.getElementById("historic");
for (var obj in fonts) {
    if (fonts[obj].name == font_historic_link.name) {
        historic.style.fontFamily = '"' + font_historic_link.style + '"';
    }
}
for (var obj in colors) {  
    if (colors[obj].name == color_historic_link.name) {
        historic.style.color = colors[obj].rgb;
        historic.style.opacity = colors[obj].opacity;
        let mouseout = colors[obj];
        historic.addEventListener('mouseout', function (event) {
            historic.style.color = mouseout.rgb;
            historic.style.opacity = mouseout.opacity;
        });
    }
    if (colors[obj].name == color_mousehover_historic_link.name) { 
        let mouseover = colors[obj];
        historic.addEventListener('mouseover', function (event) {
            historic.style.color = mouseover.rgb;
            historic.style.opacity = mouseover.opacity;
        });
    }
}

// font and color for all delete links
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_delete_link = element;
    }
});
colors.forEach(element => {
    if (element.name == 'black') {
        color_delete_link = element;
    }
});
colors.forEach(element => {
    if (element.name == 'coral') {
        color_mouseover_delete_link = element;
    }
});
var delete_links = document.getElementsByClassName("delete-link");
for (var obj in fonts) {
    if (fonts[obj].name == font_delete_link.name) {
        for (const key in delete_links) {
            if (delete_links.hasOwnProperty(key)) {
                const element = delete_links[key];
                element.style.fontFamily = '"' + font_delete_link.style + '"';
            }
        }
    }
}
for (var obj in colors) {   
    for (const key in delete_links) {
        if (delete_links.hasOwnProperty(key)) {
            const element = delete_links[key];
            console.log(element)
            if (colors[obj].name == color_delete_link.name) {
                element.style.color = colors[obj].rgb;
                element.style.opacity = colors[obj].opacity;
                let mouseout = colors[obj];
                element.addEventListener('mouseout', function (event) {
                    element.style.color = mouseout.rgb;
                    element.style.opacity = mouseout.opacity;
                });
            }
            if (colors[obj].name == color_mouseover_delete_link.name) {
                let mouseover = colors[obj];
                element.addEventListener('mouseover', function (event) {
                    element.style.color = mouseover.rgb;
                    element.style.opacity = mouseover.opacity;
                });
            }
        }

    }
}

// font and colors for buttons
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
            console.log(element)
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
