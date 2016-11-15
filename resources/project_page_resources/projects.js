//Get navigation menu
$.get("./resources/index_resources/navigation.html", function(data){
    $("#nav-placeholder").replaceWith(data);
});

//JQuery Accordion Widget Code
$( function() {
 $( "#accordion" ).accordion({
    heightStyle: "content"
  });
});

//AJAX call
//Dynamically add lab and homework information to the DOM
$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "./resources/quiz_1/quiz1.xml",
        dataType: "xml",
        success: function(xml){
            $(xml).find('Homework').each(function(){
                var Folder_Name = $(this).find('Folder_Name').text();
                var Description = $(this).find('Description').text();
                var Solution_Link = $(this).find('Solution_Link').text();
                $('#accordion').append("<h3>"+Folder_Name+"</h3><div class='center'>"+Description+"<br><a class='btn btn-default' href='" + Solution_Link + "'>Click Here To View </a></div>").accordion("refresh");  
            });
    
            $(xml).find('Lab').each(function(){
                var Folder_Name = $(this).find('Folder_Name').text();
                var Description = $(this).find('Description').text();
                var Solution_Link = $(this).find('Solution_Link').text();
                $('#accordion').append("<h3>"+Folder_Name+"</h3><div class='center'>"+Description+"<br><a class='btn btn-default' href='" + Solution_Link + "'>Click Here To View </a></div>").accordion("refresh");  
            });
        }
    });
});