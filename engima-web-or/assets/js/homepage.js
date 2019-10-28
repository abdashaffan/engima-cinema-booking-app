function createImage(imgID, Movie_name, rating){
    var _section = document.getElementById("sec2");

    //Now playing movie image
    var _div = document.createElement("div");
    _div.setAttribute("class", "gallery");
    _div.setAttribute("id", "NP-".concat(imgID));

    var x = document.createElement("img");
    x.setAttribute("src", "Movie Pict\\".concat(imgID,".jpg"));
    x.setAttribute("alt", "test func");
    x.setAttribute("id",imgID);
    _div.appendChild(x);

    //Movie name setting
    var desc_div = document.createElement("div");
    desc_div.setAttribute("class", "desc");
    desc_div.setAttribute("id", "NP-desc-".concat(imgID));

    var desc_text = document.createTextNode(Movie_name);
    desc_div.appendChild(desc_text);
    _div.appendChild(desc_div);

    //Rating icon setting
    var rating_div = document.createElement("div");

    var rating_icon = document.createElement("i");
    rating_icon.setAttribute("class", "material-icons");

    var icon_shape = document.createTextNode("star");
    rating_icon.appendChild(icon_shape);
    rating_div.appendChild(rating_icon);

    //var rate_tag = document.createElement("h5");
    var rate = document.createTextNode(rating);
    //rate_tag.appendChild(rate);
    rating_div.appendChild(rate);
    _div.appendChild(rating_div);

    _section.appendChild(_div);
}
