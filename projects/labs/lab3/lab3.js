	//Part 1 (Iteration/Tree function)
	//Function that recusively iterates through all HTML elements starting with the "currentNodeNode" variable
	function Iterate(currentNode, depth){
		//If depth argument has not been initialized, initialize it
		if (!depth){
			depth = 0;
		}

		//Element nodes represented by nodeType 1
		if (currentNode.nodeType == 1){
			
			//Create text variable
			var text = " ";

			//For each level of depth add one "-"
			for (var i = 0; i < depth; i++) { 
				text += "-";
			}
			//Add the name/text of the element
			text += currentNode.tagName + "\n"; 
			
			//Part 2
			//When an element is clicked, an alert will be displayed with the element's name
			currentNode.addEventListener("click", function(){ 
				alert(currentNode.tagName); 
			}, false); 

			//Part 3
			if(currentNode.tagName == "DIV") {
				//On mouseover shift div blocks 10px right (using padding left 10px) and background blue
				currentNode.addEventListener("mouseover", function(){
					currentNode.style.background="blue";
					currentNode.style.paddingLeft="10px";
				});
				//On mouseout shift div blocks back to original position (padding left 0px) and background white
				currentNode.addEventListener("mouseout", function(){
					currentNode.style.background="white";
					currentNode.style.paddingLeft="0px";
				});
			}

			//"childnodes" is a collection of the root node's child nodes
			for (var j = 0; j < currentNode.childNodes.length; j++){ 

				 //Recusively call Iterate for child nodes to get each child node's name/text
				var childText = Iterate(currentNode.childNodes[j], depth+1);

 				//If there is a valid child node add it to the parent element (currentNodeNode)
				if (childText != null && childText != " "){
					text += childText;
				}
			}

			//Return the name of the currentNodeNode and all of its child nodes
			return text;
		}

		//Do not do anything
		else {

			return null;
		}
	}

	//Part 1 (Calling the iteration function/modifying the <pre> tag with id "info")
	//The root element/node will be the "html" element
	var root = document.getElementsByTagName("html")[0];
	//Tree will store the tree
	var tree = Iterate(root);

	//In this case puts the tree data inside the <pre> element with id "info"
	document.getElementById("info").innerHTML = tree;

	//Extra
	document.addEventListener('DOMContentLoaded', function() {
		alert("Hello Corey"); 
	}, false);

	//Part 3
	document.addEventListener('DOMContentLoaded', function() {
		//Clone the element with id "favorite-quote"
		var clone = document.getElementById('favorite-quote').cloneNode(true);
		//On mouseover shift div blocks 10px right (using padding left 10px) and background blue
		clone.addEventListener("mouseover", function(){
					clone.style.background="orange";
					clone.style.paddingLeft="10px";
				});
		//On mouseout shift div blocks back to original position (padding left 0px) and background white
		clone.addEventListener("mouseout", function(){
					clone.style.background="white";
					clone.style.paddingLeft="0px";
				});
		//Add cloned node to end of body
		document.body.appendChild(clone);
    });
