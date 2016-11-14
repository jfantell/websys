$(document).ready(function(){
  $("#coverart").click(function(){
    //Remove the cd image
    var x = document.getElementById("site");
    x.remove(x.selectedIndex);

    //Apply CSS
    //Add a background image
    $("body").css({
      'background':'url("./resources/background.jpeg")',
    });

    //Chnage the background color of the song class
    $('.song').css({
      'border': 'black solid 2px',
      'background':'rgba(255, 255, 255, 0.8)',
    });

    //AJAX resuqest to get song data from JSON file
    $.ajax({
    type: "GET",
    url: "./resources/lab4.json",
    dataType: "json",
    success: function(responseData, status){
    var base = $(".song");
      $.each(responseData.song, function(i, item) {
        //Clone variable "base" to get every song from the JSON file
        var clone = base.clone();
        var output = "";
        //Output is a string of all of the relevant song data
        //New classes created for each data item to add semantic meaning
        output += '<div class="title">' + item.title + '</div>' ;
        output += '<div class="artist">' + '<a href=" '+ item.link  + ' ">' + item.artist + '</a> </div>';
        output += '<div class="album">' + item.album + '</div>';
        output += '<div class="date">' + item.date + '</div>';
        output += '<div class="genres">' + item.genres + '</div>';
        output += '<div class="album_cover">' + '<a href=" '+ item.link  + ' ">' + '<img src=" ' + item.album_cover + ' " height="90px" width="90px"> '+ '</a> </div>';
        clone.html(output);
        //Add the data to the JSON file
         $("#playlist").append(clone);
      });
    }, error: function(msg) {
      alert("There was a problem: " + msg.status + " " + msg.statusText); }
    });
  });
});