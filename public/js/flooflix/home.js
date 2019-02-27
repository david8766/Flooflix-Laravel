// FLOOFLIX - SCRIPT

/*
|--------------------------------------------------------------------------
| FLOOFLIX - HOME
|--------------------------------------------------------------------------
|
| script used for the home page:
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


// text, font and color for title
var title  = '';
texts.forEach(element => {
    if (element.title == 'titre') {
        title = element;
    }
});

document.getElementById('home-title').textContent = title.text;
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
        document.getElementById("home-title").style.fontFamily = '"' + font_title.style + '"';
    }
}
for (var obj in colors) {
    if (colors[obj].name == color_title.name) {
        document.getElementById("home-title").style.color = colors[obj].rgb;
        document.getElementById("home-title").style.opacity = colors[obj].opacity;
    }
}

// text, font and color for descriptive paragraph
var desc = '';
texts.forEach(element => {
    if (element.title == 'descriptif') {
        desc = element;
    }
});
document.getElementById('home-desc').textContent = desc.text;
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_desc = element;
    }
});
colors.forEach(element => {
    if (element.name == 'azure') {
        color_desc = element;
    }
});

for (var obj in fonts) {
    if (fonts[obj].name == font_desc.name) {
        document.getElementById("home-desc").style.fontFamily = '"' + font_desc.style + '"';
    }
}
for (var obj in colors) {
    if (colors[obj].name == color_desc.name) {        
        document.getElementById("home-desc").style.color = colors[obj].rgb;
        document.getElementById("home-desc").style.opacity = colors[obj].opacity;
    }
}

// text, font and color for catch phrase
var catch_phrase = '';
texts.forEach(element => {
    if (element.title == 'accroche') {
        catch_phrase = element;
    }
});
document.getElementById('home-catch').textContent = catch_phrase.text;
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_catch_phrase = element;
    }
});
colors.forEach(element => {
    if (element.name == 'azure') {
        color_catch_phrase = element;
    }
});
for (var obj in fonts) {
    if (fonts[obj].name == font_catch_phrase.name) {
        document.getElementById("home-catch").style.fontFamily = '"' + font_catch_phrase.style + '"';
    }
}
for (var obj in colors) {
    if (colors[obj].name == color_catch_phrase.name) {        
        document.getElementById("home-catch").style.color = colors[obj].rgb;
        document.getElementById("home-catch").style.opacity = colors[obj].opacity;
    }
}

// background color for the second article
colors.forEach(element => {
    if (element.name == 'black') {
        color_second_article = element;
    }
});
for (var obj in colors) {
    if (colors[obj].name == color_second_article.name) {
        document.getElementById("second-article").style.backgroundColor = colors[obj].rgb;
        document.getElementById("second-article").style.opacity = colors[obj].opacity;
    }
}

// text, font and color for the top movies title
var home_top = '';
texts.forEach(element => {
    if (element.title == 'top') {
        home_top = element;
    }
});
document.getElementById('home-top').textContent = home_top.text;
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_home_top = element;
    }
});
colors.forEach(element => {
    if (element.name == 'azure') {
        color_home_top = element;
    }
});
for (var obj in fonts) {
    if (fonts[obj].name == font_home_top.name) {
        document.getElementById("home-top").style.fontFamily = '"' + font_home_top.style + '"';
    }
}
for (var obj in colors) {
    if (colors[obj].name == color_home_top.name) {
        document.getElementById("home-top").style.color = colors[obj].rgb;
        document.getElementById("home-top").style.opacity = colors[obj].opacity;
    }
}

// font and color for title of top movies poster
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_movie_home_top = element;
    }
});
var top_movies = document.getElementsByClassName("top-movie");
for (var obj in fonts) {
    if (fonts[obj].name == font_movie_home_top.name) {
        for (const key in top_movies) {
            if (top_movies.hasOwnProperty(key)) {
                const element = top_movies[key];
                element.style.fontFamily = '"' + fonts[obj].style + '"';
            }
        }
    }
}

colors.forEach(element => {
    if (element.name == 'azure') {
        color_movie_home_top = element;
    }
});
colors.forEach(element => {
    if (element.name == 'coral') {
        color_movie_mouseover_home_top = element;
    }
});

for (var obj in colors) {
    for (const key in top_movies) {
        if (top_movies.hasOwnProperty(key)) {
            const element = top_movies[key];
            if (colors[obj].name == color_movie_home_top.name) {
                element.style.color = colors[obj].rgb;
                element.style.opacity = colors[obj].opacity;
                let mouseout = colors[obj];
                element.addEventListener('mouseout', function (event) {
                    element.style.color = mouseout.rgb;
                    element.style.opacity = mouseout.opacity;
                });
            }
            if (colors[obj].name == color_movie_mouseover_home_top.name) {
                let mouseover = colors[obj];
                element.addEventListener('mouseover', function (event) {
                    element.style.color = mouseover.rgb;
                    element.style.opacity = mouseover.opacity;
                });
            }
        }
    }
}

// background color for the third article
colors.forEach(element => {
    if (element.name == 'black') {
        color_third_article = element;
    }
});
for (var obj in colors) {
    if (colors[obj].name == color_third_article.name) {
        document.getElementById("third-article").style.backgroundColor = colors[obj].rgb;
        document.getElementById("third-article").style.opacity = colors[obj].opacity;
    }
}


// text, font and color for the news movies title
var home_new = '';
texts.forEach(element => {
    if (element.title == 'nouveautes') {
        home_new = element;
    }
});
document.getElementById('home-new').textContent = home_new.text;
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_home_new = element;
    }
});
colors.forEach(element => {
    if (element.name == 'azure') {
        color_home_new = element;
    }
});
for (var obj in fonts) {
    if (fonts[obj].name == font_home_new.name) {
        document.getElementById("home-new").style.fontFamily = '"' + font_home_new.style + '"';
    }
}
for (var obj in colors) {
    if (colors[obj].name == color_home_new.name) {
        document.getElementById("home-new").style.color = colors[obj].rgb;
        document.getElementById("home-new").style.opacity = colors[obj].opacity;
    }
}

// font and color for title of new movies poster
fonts.forEach(element => {
    if (element.name == 'Alfa Slab One') {
        font_movie_home_new = element;
    }
});
var new_movies = document.getElementsByClassName("new-movie");
for (var obj in fonts) {
    if (fonts[obj].name == font_movie_home_new.name) {
        for (const key in new_movies) {
            if (new_movies.hasOwnProperty(key)) {
                const element = new_movies[key];
                element.style.fontFamily = '"' + fonts[obj].style + '"';
            }
        }
    }
}

colors.forEach(element => {
    if (element.name == 'azure') {
        color_movie_home_new = element;
    }
});
colors.forEach(element => {
    if (element.name == 'coral') {
        color_movie_mouseover_home_new = element;
    }
});

for (var obj in colors) {
    for (const key in new_movies) {
        if (new_movies.hasOwnProperty(key)) {
            const element = new_movies[key];
            if (colors[obj].name == color_movie_home_new.name) {
                element.style.color = colors[obj].rgb;
                element.style.opacity = colors[obj].opacity;
                let mouseout = colors[obj];
                element.addEventListener('mouseout', function (event) {
                    element.style.color = mouseout.rgb;
                    element.style.opacity = mouseout.opacity;
                });
            }
            if (colors[obj].name == color_movie_mouseover_home_new.name) {
                let mouseover = colors[obj];
                element.addEventListener('mouseover', function (event) {
                    element.style.color = mouseover.rgb;
                    element.style.opacity = mouseover.opacity;
                });
            }
        }
    }
}

$(function () {
    $('a').tooltip()
}) 
