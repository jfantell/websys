Roshni Vachhani
Homework 2 Read Me

1. What are the advantages to writing a jQuery plugin over regular JavaScript that uses jQuery?
	jQuery is more lightweight than traditional JavaScript and comes with a lot of different pre-built plug-ins. It's also easy to extend its capabilities using the .extend function. Using a plugin as opposed to just jQuery or plain JavaScript allows you to make the code/functions more portable. Using a plugin allows you to easily incorporate the code into multiple different projects. Additionally, plugins enable you to focus less on the technical details of a particular example and more on the functionality so that it can be reused in multiple different situations.

2. Explain how your jQuery plugin adheres to best practices in JavaScript and jQuery development.
	The way in which we implemented the plugin is consistent with the general practices that have been established by the community. Primarily, we used the .fn.extend function to add our hexed function to the jQuery plugin. We then built upon the function's capabilities by including various functions/methods within the plugin that handled different events based on which button the user clicked. We also used the jQuery Color Picker UI in order to incorporate elements that had already been coded by others in the community.  

3. Does anything prevent you from POSTing high scores to a server on a different domain? If so, what? If not, how would we go about it?
	I don't think there is anything that would prevent us from POSTing high scores to a server; we would simply have to incorporate an AJAX post request that would write to a json file to store the data. Depending on how we want to implement this storing feature, we may also have to use a GET request to compare the data from the file and see if the new score is higher before adding it to the file. 