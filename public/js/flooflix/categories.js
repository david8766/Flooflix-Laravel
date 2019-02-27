// FLOOFLIX 

/*
|--------------------------------------------------------------------------
| FLOOFLIX - CATEGORIES
|--------------------------------------------------------------------------
|
| script used for the categories page:
|
*/

// collect variables from HomeController
var fonts = varJS.fonts;
var colors = varJS.colors;
var pictures = varJS.pictures;
var texts = varJS.texts;


console.dir(fonts);
console.dir(colors);
console.dir(pictures);
console.dir(texts);

// background color for article
colors.forEach(element => {
    if (element.name == 'black') {
        color_backgroundColor_categories = element;
    }
});
for (var obj in colors) {
    if (colors[obj].name == color_backgroundColor_categories.name) {
        document.getElementById("bg-categories").style.backgroundColor = colors[obj].rgb;
        document.getElementById("bg-categories").style.opacity = colors[obj].opacity;
    }
}

// font and color for title

var title = '';
texts.forEach(element => {
    if (element.title == 'categories') {
        title = element;
    }
});

document.getElementById('categories-title').textContent = title.text;
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_title = element;
    }
});
colors.forEach(element => {
    if (element.name == 'azure') {
        color_title = element;
    }
});

for (var obj in fonts) {
    if (fonts[obj].name == font_title.name) {
        document.getElementById("categories-title").style.fontFamily = '"' + font_title.style + '"';
    }
}
for (var obj in colors) {
    if (colors[obj].name == color_title.name) {
        document.getElementById("categories-title").style.color = colors[obj].rgb;
        document.getElementById("categories-title").style.opacity = colors[obj].opacity;
    }
}
for (var obj in colors) {
    if (colors[obj].name == color_title.name) {
        let separator = document.getElementsByClassName("separator");
        for (const key in separator) {
            if (separator.hasOwnProperty(key)) {
                const element = separator[key];
                element.style.color = color_title.name;
            }
        }
    }
}

// font and color for all categories

fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_category_title = element;
    }
});
colors.forEach(element => {
    if (element.name == 'azure') {
        color_category_title = element;
    }
});
colors.forEach(element => {
    if (element.name == 'coral') {
        color_mouseover_category_title = element;
    }
});

var figcaptions = document.getElementsByTagName("figcaption");
for (var obj in fonts) {
    if (fonts[obj].name == font_category_title.name) {
        for (const key in figcaptions) {
            if (figcaptions.hasOwnProperty(key)) {
                const element = figcaptions[key];
                element.style.fontFamily = '"' + font_category_title.style + '"';
            }
        }
    }
}

for (var obj in colors) {
    for (const key in figcaptions) {
        if (figcaptions.hasOwnProperty(key)) {
            const element = figcaptions[key];
            if (colors[obj].name == color_category_title.name) {
                element.style.color = colors[obj].rgb;
                element.style.opacity = colors[obj].opacity;
                let mouseout = colors[obj];
                console.log(mouseout);
                element.addEventListener('mouseout', function (event) {
                    element.style.color = mouseout.rgb;
                    element.style.opacity = mouseout.opacity;
                });
            }
            if (colors[obj].name == color_mouseover_category_title.name) {
                console.log(colors[obj]);
                let mouseover = colors[obj];
                console.log(mouseover);
                
                element.addEventListener('mouseover', function (event) {
                    element.style.color = mouseover.rgb;
                    element.style.opacity = mouseover.opacity;
                });
            }
        }
    }
}