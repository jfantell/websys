$("#sub").click( function() {
 $.post( $("#myForm").attr("action"), 
         $("#myForm :input").serializeArray(), 
         function(info){ $("#result").html(info);
         $( '#myForm' ).each(function(){
    		this.reset();
		});

    });
});

$("#myForm").submit( function() {
  return false;	
});

function onBlur(el) {
    el.style.color = "white";
    el.style.backgroundColor = "transparent";
}
function onFocus(el) {
    el.style.color = "black";
    el.style.backgroundColor = "white";
}