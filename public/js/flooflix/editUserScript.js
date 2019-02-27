// FLOOFLIX - SCRIPT

/*
|--------------------------------------------------------------------------
| FLOOFLIX - USER EDIT
|--------------------------------------------------------------------------
|
| script used for the user edit page:
|
*/

// collect variables from UserController
var fonts = varJS.fonts;
var colors = varJS.colors;
var pictures = varJS.pictures;

console.dir(fonts);
console.log(colors);


// background color for article
var black = colors.black;
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
var white = colors.white;
for (var obj in colors) {
    if (colors[obj].name == white.name) {
        document.getElementById("bg").style.backgroundColor = white.name;
    }
}

// font and color for title
var alfa = fonts.alfaSlabOne;
var black = colors.black;
for (var obj in fonts) {
    if (fonts[obj].name == alfa.name) {
        document.getElementById("title").style.fontFamily = '"' + alfa.style + '"';
    }
}
for (var obj in colors) {
    if (colors[obj].name == black.name) {
        document.getElementById("title").style.color = black.name;
    }
}

// font and color for paragrah
for (var obj in fonts) {
    if (fonts[obj].name == alfa.name) {
        let labels = document.getElementsByTagName("label");
        for (const key in labels) {
            if (labels.hasOwnProperty(key)) {
                const element = labels[key];
                element.style.fontFamily = '"' + alfa.style + '"';
            }
        }
    }
}
var black = colors.black;
for (var obj in colors) {
    if (colors[obj].name == black.name) {
        let labels = document.getElementsByTagName("label");
        for (const key in labels) {
            if (labels.hasOwnProperty(key)) {
                const element = labels[key];
                element.style.fcolor = black.name;
            }
        }
    }
}

// font and color for button
var coral = colors.coral
for (var obj in fonts) {
    if (fonts[obj].name == alfa.name) {
        let links = document.getElementsByClassName("btn-color");
        for (const key in links) {
            if (links.hasOwnProperty(key)) {
                const element = links[key];
                element.style.fontFamily = '"' + alfa.style + '"';
            }
        }
    }
}
for (var obj in colors) {
    if (colors[obj].name == coral.name) {
        let links = document.getElementsByClassName("btn-color");
        for (const key in links) {
            if (links.hasOwnProperty(key)) {
                const element = links[key];
                element.style.backgroundColor = coral.name;
                element.style.color = black.name;
                element.onmouseout = function () {
                    mouseOut()
                };

                function mouseOut() {
                    element.style.color = black.name;
                }
            }

        }
    }
    if (colors[obj].name == coral.name) {
        let links = document.getElementsByClassName("btn-color");
        for (const key in links) {
            if (links.hasOwnProperty(key)) {
                const element = links[key];
                element.onmouseover = function () {
                    mouseOver()
                };

                function mouseOver() {
                    element.style.color = white.name;
                }
            }
        }
    }
}
// font and color for delete link
var alfa = fonts.alfaSlabOne;
var black = colors.black;
var coral = colors.coral;
for (var obj in fonts) {
    if (fonts[obj].name == alfa.name) {
        document.getElementById("link").style.fontFamily = '"' + alfa.style + '"';
    }
}
for (var obj in colors) {
    if (colors[obj].name == black.name) {
        document.getElementById("link").style.color = black.name;
    }
}
for (var obj in colors) {
    if (colors[obj].name == black.name) {
        let link = document.getElementById("link")
        link.onmouseout = function () {
            mouseOut()
        };
        
        function mouseOut() {
            link.style.color = black.name;
        }
    }
    if (colors[obj].name == coral.name) {
        let link = document.getElementById("link")
        link.onmouseover = function () {
            mouseOver()
        };
        
        function mouseOver() {
            link.style.color = coral.name;
        }
    }
}