var fonts = varJS.fonts;
var colors = varJS.colors;
var pictures = varJS.pictures;
var movies = varJS.movies;
var top_movies = varJS.top_movies;
var new_movies = varJS.new_movies;



console.dir(fonts);
console.dir(colors);
console.dir(pictures);
console.dir(movies);
console.dir(top_movies);
console.dir(new_movies);
console.dir(localStorage);


// background color for the first article
if (localStorage.backgroundColor_home_jumbotron !== undefined) {
    var backgroundColor_home_jumbotron = JSON.parse(localStorage.getItem("backgroundColor_home_jumbotron"));
    for (var obj in colors) {
        if (colors[obj].name == backgroundColor_home_jumbotron.name) {
            document.getElementById("first-article").style.backgroundColor = backgroundColor_home_jumbotron.name;
        }
    } 
}
// background image for the first article
if (localStorage.backgroundImage_home_jumbotron !== undefined) {
    var backgroundImage_home_jumbotron = JSON.parse(localStorage.getItem("backgroundImage_home_jumbotron"));
    for (var obj in pictures) {
        if (pictures[obj].name == backgroundImage_home_jumbotron.name) {
            document.getElementById("first-article").style.backgroundColor = backgroundImage_home_jumbotron.name;
        }
    }
}
// text,font and color for the title of jumbotron
var text_home_title = JSON.parse(localStorage.getItem("text_home_title"));
if (text_home_title) {
    
}
$("#home-title").append(text_home_title.text);

var font_home_title = JSON.parse(localStorage.getItem("font_home_title"));
for (var obj in fonts) {
    if (fonts[obj].name == font_home_title.name) {
        document.getElementById("home-title").style.fontFamily = '"' + fonts[obj].style + '"';
    }
}

var color_home_title = JSON.parse(localStorage.getItem("color_home_title"));
for (var obj in colors) {
    if (colors[obj].name == color_home_title.name) {
        document.getElementById("home-title").style.color = colors[obj].rgb;
        document.getElementById("home-title").style.opacity = colors[obj].opacity;
    }
}

// text,font and color for the catch phrase of jumbotron
var text_home_catch = JSON.parse(localStorage.getItem("text_home_catch"));
$("#home-catch").append(text_home_catch.text);

var font_home_catch = JSON.parse(localStorage.getItem("font_home_catch"));
for (var obj in fonts) {
    if (fonts[obj].name == font_home_catch.name) {
        document.getElementById("home-catch").style.fontFamily = '"' + fonts[obj].style + '"';
    }
}
 
var color_home_catch = JSON.parse(localStorage.getItem("color_home_catch"));
for (var obj in colors) {
    if (colors[obj].name == color_home_catch.name) {
        document.getElementById("home-catch").style.color = colors[obj].rgb;
        document.getElementById("home-catch").style.opacity = colors[obj].opacity;
    }
}

// text,font and color for the description of jumbotron
var text_home_desc = JSON.parse(localStorage.getItem("text_home_desc"));
$("#home-desc").append(text_home_desc.text);

var font_home_desc = JSON.parse(localStorage.getItem("font_home_desc"));
for (var obj in fonts) {
    if (fonts[obj].name == font_home_desc.name) {
        document.getElementById("home-desc").style.fontFamily = '"' + fonts[obj].style + '"';
    }
}

var color_home_desc = JSON.parse(localStorage.getItem("color_home_desc"));
for (var obj in colors) {
    if (colors[obj].name == color_home_desc.name) {
        document.getElementById("home-desc").style.color = colors[obj].rgb;
        document.getElementById("home-desc").style.opacity = colors[obj].opacity;
    }
}

// background color for the second article
var backgroundColor_home_second_article = JSON.parse(localStorage.getItem("backgroundColor_home_second_article"));
for (var obj in colors) {
    if (colors[obj].name == backgroundColor_home_second_article.name) {
        document.getElementById("second-article").style.backgroundColor = backgroundColor_home_second_article.name;
    }
}

// text,font and color for the title of top movies
var text_home_top = JSON.parse(localStorage.getItem("text_home_top"));
$("#home-top").append(text_home_top.text);

var font_home_top = JSON.parse(localStorage.getItem("font_home_top"));
for (var obj in fonts) {
    if (fonts[obj].name == font_home_top.name) {
        document.getElementById("home-top").style.fontFamily = '"' + fonts[obj].style + '"';
    }
}

var color_home_top = JSON.parse(localStorage.getItem("color_home_top"));
for (var obj in colors) {
    if (colors[obj].name == color_home_top.name) {
        document.getElementById("home-top").style.color = colors[obj].rgb;
        document.getElementById("home-top").style.opacity = colors[obj].opacity;
    }
}


// font and colors for the title of the movies in caption of the poster
var font_movie_home_top = JSON.parse(localStorage.getItem("font_movie_home_top"));
for (var obj in fonts) {
    if (fonts[obj].name == font_movie_home_top.name) {
        let top_movie = document.getElementsByClassName("top-movie");
        for (const key in top_movie) {
            if (top_movie.hasOwnProperty(key)) {
                const element = top_movie[key];
                element.style.fontFamily = '"' + fonts[obj].style + '"';
            }
        }
    }
}

var color_movie_home_top = JSON.parse(localStorage.getItem("color_movie_home_top"));
var color_movie_mouseover_home_top = JSON.parse(localStorage.getItem("color_movie_mouseover_home_top"));
var links = document.getElementsByClassName("top-movie");
for (var obj in colors) {
    for (const key in links) {
        if (links.hasOwnProperty(key)) {
            const element = links[key];  
            if (colors[obj].name == color_movie_home_top.name) {
            element.style.color = colors[obj].rgb;
            element.addEventListener('mouseout', function (event) {
                    element.style.color = colors[obj].rgb;     
                }); 
            }   
            if (colors[obj].name == color_movie_mouseover_home_top.name) {
                let mouseover = colors[obj];
                element.addEventListener('mouseover', function (event) {
                    element.style.color = mouseover.rgb;     
                }); 
            }    
        }
    }
}

// edit first movie in the top movies

var first_movie_top = JSON.parse(localStorage.getItem("first_movie_top"));
console.log(first_movie_top);
for (var obj in movies) {   
    if (movies[obj].title == first_movie_top.name) {
        let link = document.getElementsByTagName("a")[7];
        let title = encodeURI(movies[obj].title);
        let url = window.location.protocol + '/LeFilm/' + title;
        link.setAttribute('href',url);
        
        
    }
}


// background color for the third article
var backgroundColor_home_third_article = JSON.parse(localStorage.getItem("backgroundColor_home_third_article"));
for (var obj in colors) {
    if (colors[obj].name == backgroundColor_home_third_article.name) {
        document.getElementById("third-article").style.backgroundColor = backgroundColor_home_third_article.name;
    }
}

// text,font and color for the title of new movies
var text_home_new = JSON.parse(localStorage.getItem("text_home_new"));
$("#home-new").append(text_home_new.text);

var font_home_new = JSON.parse(localStorage.getItem("font_home_new"));
for (var obj in fonts) {
    if (fonts[obj].name == font_home_new.name) {
        document.getElementById("home-new").style.fontFamily = '"' + fonts[obj].style + '"';
    }
}

var color_home_new = JSON.parse(localStorage.getItem("color_home_new"));
for (var obj in colors) {
    if (colors[obj].name == color_home_new.name) {
        document.getElementById("home-new").style.color = colors[obj].rgb;
        document.getElementById("home-new").style.opacity = colors[obj].opacity;
    }
}


// font and colors for the title of the movies in caption of the poster
var font_movie_home_new = JSON.parse(localStorage.getItem("font_movie_home_new"));
for (var obj in fonts) {
    if (fonts[obj].name == font_movie_home_new.name) {
        let new_movie = document.getElementsByClassName("new-movie");
        for (const key in new_movie) {
            if (new_movie.hasOwnProperty(key)) {
                const element = new_movie[key];
                element.style.fontFamily = '"' + fonts[obj].style + '"';
            }
        }
    }
}

var color_movie_home_new = JSON.parse(localStorage.getItem("color_movie_home_new"));
var color_movie_mouseover_home_new = JSON.parse(localStorage.getItem("color_movie_mouseover_home_new"));
var links = document.getElementsByClassName("new-movie");
for (var obj in colors) {
    for (const key in links) {
        if (links.hasOwnProperty(key)) {
            const element = links[key];
            if (colors[obj].name == color_movie_home_new.name) {
                element.style.color = colors[obj].rgb;
                element.addEventListener('mouseout', function (event) {
                    element.style.color = colors[obj].rgb;
                });
            }
            if (colors[obj].name == color_movie_mouseover_home_new.name) {
                let mouseover = colors[obj];
                element.addEventListener('mouseover', function (event) {
                    element.style.color = mouseover.rgb;
                });
            }
        }
    }
}