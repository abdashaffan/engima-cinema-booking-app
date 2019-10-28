function searchResult(imgID, movie_name, movie_synopsis, rating){
    var _section = document.getElementById("img_container");
    //_section.appendChild(document.createTextNode("imgID: ".concat(imgID,".jpg")));
    //Create container div
    var container_div = document.createElement("div");
    container_div.setAttribute("class", "grid-container");
    container_div.setAttribute("id", "grid-".concat(imgID));

    //Generate images
    var img_div = document.createElement("div");
    img_div.setAttribute("class", "image");
    img_div.setAttribute("id", "img-".concat(imgID));

    var img_obj = document.createElement("img");
    img_obj.setAttribute("src", "Movie Pict\\".concat(imgID,".jpg"));
    img_obj.setAttribute("alt", movie_name);
    img_obj.setAttribute("id",imgID);
    img_div.appendChild(img_obj);
    container_div.appendChild(img_div);
    
    //Generate movie title
    var title_div = document.createElement("div");
    title_div.setAttribute("class", "mov-title");
    title_div.setAttribute("id", "title-".concat(imgID));

    var title_text = document.createTextNode(movie_name);
    title_div.appendChild(title_text);
    container_div.appendChild(title_div);

    //Generate synopsis
    var synopsis_div = document.createElement("div");
    synopsis_div.setAttribute("class", "synopsis");
    synopsis_div.setAttribute("id", "syn-".concat(imgID));

    var synopsis_text = document.createTextNode(movie_synopsis);
    synopsis_div.appendChild(synopsis_text);
    container_div.appendChild(synopsis_div);

    //Generate rating
    var rating_div = document.createElement("div");
    rating_div.setAttribute("class", "rating")
    rating_div.setAttribute("id", "rating-".concat(imgID));

    var rating_icon = document.createElement("i");
    rating_icon.setAttribute("class", "material-icons");

    var icon_shape = document.createTextNode("star");
    rating_icon.appendChild(icon_shape);
    rating_div.appendChild(rating_icon);

    var rating_num = document.createTextNode(rating);
    rating_div.appendChild(rating_num);
    container_div.appendChild(rating_div);

    //Generate detail button
    var detail_div = document.createElement("div");
    detail_div.setAttribute("class", "detail_button");

    var link = document.createElement("a");
    link.setAttribute("href", "detailpage?id=".concat(imgID));

    var text = document.createTextNode("View details  ");
    link.appendChild(text);

    var detail_icon = document.createElement("i");
    detail_icon.setAttribute("class", "fas fa-chevron-circle-right");

    // var icon_type = document.createTextNode("arrow_right");
    // detail_icon.appendChild(icon_type);
    link.appendChild(detail_icon);
    detail_div.appendChild(link);
    container_div.appendChild(detail_div);

    _section.appendChild(container_div);
}

function counter(word,count){
    var text_container = document.getElementById("text");
    var word_search = document.createElement("h2");
    word_search.appendChild(document.createTextNode("Showing search result for keyword \"".concat(word,"\"")));

    var count_num = document.createElement("h6");
    if(count == 0){
        count_num.appendChild(document.createTextNode("No result found."));
    }
    else if(count == 1){
        count_num.appendChild(document.createTextNode("1 result found."));
    }
    else{
        count_num.appendChild(document.createTextNode(count.concat(" results found.")));
    }

    text_container.appendChild(word_search);
    text_container.appendChild(count_num);

}