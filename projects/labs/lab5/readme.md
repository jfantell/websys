Optimizations:

Optimization #1: Moved the JavaScript to the bottom of the page. This is a very good practice, because if the JS files is at the top of the page, when the document is loading the JS prevents other downloads (styling and images) from taking place. (Source: http://stackoverflow.com/questions/11786915/javascript-on-the-bottom-of-the-page)

Optimization #2: Changed how the list items are added to the DOM. Instead of appending a new list to "ul#foo" 5,000 times, I created an empty string, concatenated the 5,000 list entries to the string, and then appended the string to the "ul#foo" one time. (Appending text to an HTML element is slower than string concatenation).
Optimization #3: Removed second css style tag in the body, moved all of the css to the top of the page. Better execution time.
Optimizaton #4: Removed the background image and changed the background to a shorthand hexideimal color. Better execution time.
Optimizayion #5: Removed the "bar" class from the unordered list, and made "bar" an id in the "div" tag.This made sense to since "bar" is only referring to one element (ids refer to one specific element, whereas classes refer to multiple elements). Additionally, ids are more efficient (speed wise). 


I added Boostrap JS/CSS to create the boostrap-style alerts seen on the page
Additionally, I added "Oswald", a google font


Notes: Everything loads within 400ms with the exception of the google font stylsheet. But on the plus side, I really like the "Oswald" font

Collaborators:

Sam Katcher
Adeel Minhas