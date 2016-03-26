Javascript notes, *open with IDE, not browser*

--Intro:  use  getElementById() to "find" an HTML element (with id="demo"), -
         and changes the element content (innerHTML) to "Hello JavaScript":
         document.getElementById("demo").innerHTML = "Hello JavaScript";

        Changing the style of an HTML element:
         <p id="demo"> sth </p> /
         <button type="button" onclick="
         document.getElementById("demo").style.fontSize = "25px";
         document.getElementById("demo").innerHTML = "Hello World";"


Where to: tag; <script>  </script> ;/

          function can be executed when an event occurs;
           <script>
             function myFunction() {
             document.getElementById("demo").innerHTML = "Paragraph changed.";
             }
           </script>/ \\ define function 
           <button type="button" onclick="myFunction()">Try it</button> call/triger event
           <p id="demo">A Paragraph.</p> /* event's target */

--          It is a good idea to place scripts at the bottom of the <body> element. 

--          External scripts are practical when the same code is used in many different web pages.


Output: alert box: window.alert();
          <p id="demo"></p>
          <script>
            window.alert(5 + 6);
          </script> 

        for testing purposes:  document.write();
                       
--        access an HTML element: document.getElementById(id);

        use the console.log() method to display data;


Syntax: JavaScript statements are composed of: -
        <Values, Operators, Expressions, Keywords, and Comments;>

        values: literals (fixed, ie 10.5, "John") -
        and variables (variables are used to store data values, ie var x; x=6;);

        operators: = is to assign values to var;
                   +-*/ to compute values;
        /
        expression: literal+var+operators;

        keywords: used to identify actions to be performed: var y = x * 10

        comment: // and  /*  */

--        identifier: first character must be a letter, an underscore (_), or a dollar sign ($), not number;

        case sensitive;

--        camel case: ie innerCity, lastName;

        
Statements: statements are "instructions" to be "executed" by the web browser;

            programs: 
              var x = 5;
              var y = 6;
              var z = x + y;
              document.getElementById("demo").innerHTML =
              z;

            code block: 
              function myFunction() {
                document.getElementById("demo").innerHTML = "Hello Dolly.";
                document.getElementById("myDIV").innerHTML = "How are you?";
              }

            keywords:
              break:	Terminates a switch or a loop
              continue:	Jumps out of a loop and starts at the top
              debugger:	Stops the execution of JavaScript, and calls (if available) the debugging function
              do ... while:	Executes a block of statements, and repeats the block, while a condition is true
              for:	Marks a block of statements to be executed, as long as a condition is true
              function:	Declares a function
              if ... else:	Marks a block of statements to be executed, depending on a condition
              return:	Exits a function
              switch:	Marks a block of statements to be executed, depending on different cases
              try ... catch:	Implements error handling to a block of statements
              var:	Declares a variable


Variables: general format: var identifier operator data: var x = 5;

           declaring: var identifier; then assign value: identifier operator -
            data; or without assignnig value and used later


Operaters: arithmetic: + - * ? %(division remainder) ++ --;

           assignment: = += -=*= /= %=; ie x += y means x = x+y;

           string: txt3 = txt1 + " " + txt2;
            add string and number: "5"+5 = 55; "Hello" + 5 = "Hello5";

           comparison and logical: more at "Comparison" later;
             ==	equal to
             ===	equal value and equal type
             !=	not equal
             !==	not equal value or not equal type
             > < >= <=
             ?	ternary operator


Data type: 
--           typical types of variables: number, string, boolean,array and object;

           when adding a number and a string, JavaScript will treat the number as a string; 
           can use single or double quotes;

           booleans;

           array: var cars = ["Saab", "Volvo", "BMW"]; cars[0] is "saab";
           
           objects:  name:value pairs;

           typeof: display the type of variable;

           undefined type: var person, value is undefined, so is tyoe;

           null: var person = null, value is undefined, type is object;

           empty value: var car = " ", value is " ", type is string;


Function: a block of code designed to perform a particular task;

--          general format: function name(parameter1, parameter2, parameter3) { code to be executed }
          
--          return statement: return value to caller id="demo"
           <p id="demo"></p>/
           <script>
             function myFunction(a, b) {
             return a * b;
             }
           document.getElementById("demo").innerHTML = myFunction(4, 3);
           </script>/

           function can also be used as variable:
             var text = "The temperature is " + toCelsius(77) + " Celsius";

           more about functions later in this learning note;  


Object: object is variable too ,but has many values

        general format: {objectPropertyName1:objectPropertyValue1;...};

        avoid String, Number, and Boolean objects;

--        more object topic covered later in this learning note;


Scope: set of variables, objects, and functions you have access to;

--       local and global variables: 
        local declarition is done inside a function;
        global variables is either declared outside or no declaration;

       a variable's life starts at declarition and ends when its deleted or page is closed;
       in html, all variables belong to the same window: 
         function myFunction() {carName = "Volvo";}
         window.carName = "Volvo";


--Event: "things" that happen to HTML elements, JavaScript can "react" on these events;

       HTML event can be something the browser does, or something a user does, JavaScript lets you execute code when events are detected.
       
       event handler attributes: <some-HTML-element some-event="some JavaScript">;
         <button onclick='getElementById("demo").innerHTML=Date()'>The time is?< button>

--       common html event: 
         onchange   An HTML element has been changed
         onclick   The user clicks an HTML element
--         onmouseover   The user moves the mouse over an HTML element
         onmouseout  The user moves the mouse away from an HTML element
         onkeydown   The user pushes a keyboard key
         onload  The browser has finished loading the page

--       more in html learning note DOM


Property and methods: property relates to the values of data; 
                      methods relates the actions can be performed on data;


String: string property: ie txt.length; <property can only process one data>;

        special character that clash with JS syntax;

        breaking long code: use \; break after a operater; use string addition;

        string is not a array, string is still one 
        set string as object: var y = new String("John");


String method: str.search;

               extract: str.slice(startLocation ,endLocation) or str.slice(startLocation) returns everything after or str.substr(startLocation, length);
               
               replce: str.replace("toBeReplaced","replacing");

               find single character in string: str.charCodeAt(0);

               convert string to array for future processing:
                 str.split(","), str.split(" "); str.split("|");


Number: decimal: ie 34.00, 34, 12e5; 64-bit floating point; -
          use multiplyand divide for high deciaml;

        hex: ie 0XFA; 


Number methods: return number as string: number.tostring();

                return number as exponential: number.toExponential();

                return number with specific length: nember.toPrecision();


Global methods: return variables as number: Number(); true-1, false-0, 12st-NaN;

                return string as a whole number: parseInt();

                return number object as actual number: valueof();


Math: objects:
        Math.random(), Math.max(); Math.min(); Math.round(); 
        Math.ceil(round-up-to-closest-integer); Math.floor(round-down-to-closest-integer);
        constant: Math.PI; Math.SQRT1_2 = sqrt(1/2); Math.LN2; 

      methods:
        Math.abs(), Math.sin(), Math.exp() and more at W3SCHOOLS.COM


Date: format: can be string or number;

      display: document.getElementById("demo").innerHTML = Date();

      Date(99,5,24,11,33,30,0): Date in terms of  year, month, day, hour, minute, second, and millisecond;
      more at w3schools.com


Array: used to store multiple values in a single variable;

       general format: var array-name = [item1, item2, ...];   

       arrays use numbers to access its "elements", <object> use names:
         var person = ["John", "Doe", 46]; person[0] = "John";
         var person = {firstName:"John", lastName:"Doe", age:46}; person["firstname"];
       

       property: array.length(); array[add-to-xth-element-of-array];

                 loop array: 
                   var index; \\ decalre indexing
                   var array-name = [item1, item2, ...];
                   for (index = 0; index < array-name.length; index++) {do-sth;}

                 associative array: var array=[]; array[1]=item1; ...
       
Array vs object: <array is based on numberecd index, and object is based on named index>;

                 use objects when you want the element names to be strings(text);

                 use arrays when you want the element names to be numbers.
                 BUT typeof(array) returns object;


Array methods: \\ single array manipulation
               array.tostring(); array.join(); \\ string-array conversion
               array.pop(remove-last-element); array.shift(remove-first-element);
               array.push(add-new-element-to-after-last-element);
               array.unshift(add-new-element-to-before-first-element); 
               arrayname[n]=newValue; \\ replace/add new value to nth of element
               delelte arrayname[n]; \\ change first element to undefined
               arrayname.splice(a,b,item1,item2); \\ insert items after location a, and delete item at location b;

               \\ indexing, ordering
               arrayname.sort(accending); arrayname.reverse(decending) \\ array ordering for strings
               arrayname.sort(function(a, b){return a-b}); \\ ordering in accending order;
               arrayname.sort(function(a, b){return b-a}); \\ ordering in descending order;
               Math.max(array), Math.min(array);

               \\ multiple array manipulation
               var array = array1.concat(array2, array3); \\ joint two arrays;
               array2 = array1.slice(n); \\slice out all element after nth element into new array
               array2 = array1.slice(a,b); \\slice out all element after ath element up to -
                (excluding) bth element into new array


Boolean: for single data: number without real component is false;
                          empty string is false;
                          undefined value, null, false and NaN is false; \\"false" is true;


Comparison: equal to: ==; equal value and type: ===; 
            not equal: !=; not equal value OR type: !==;
            <, >, <=, >=;

            logic: and: &&; or: ||; not: !;

            conditional: age < 18, voteable equals "Too young", otherwise is "Old enough":
              var voteable = (age < 18) ? "Too young":"Old enough";


Condition: if (condition1) {
              block of code to be executed if condition1 is true
           } else if (condition2) {
              block of code to be executed if the condition1 is false and condition2 is true
           } else {
              block of code to be executed if the condition1 is false and condition2 is false
           }
        

Switch: switch(expression) {
          case n:
            code block
            break;
          case n:
            code block
            break;
          default:
            default code block  \\always end switch loop with default
        } 


For loop: for (statement 1; statement 2; statement 3) {
            code block to be executed
          }
          Statement 1 is executed before the loop starts, can be omited if its declared before
          Statement 2 defines the condition for running, can be omited if "break" is used i nthe loop.
          Statement 3 is executed each time after each loop, optional.


Break/continuous: within a loop, if (condition) { continue/break; }
                  break means jump out loop;
                  continuous means jump to next loop;


Data type conversion: see W3SCHOOL.COM


Regular expressions: search and replace;


Catch error: try {
               Block of code to try throw " text/number/anything "
                 \\ these text/number is 'err'
             }
               catch(err) {
                 document.getElementById("demo").innerHTML = err.message;
             finally {
               Block of code to be executed regardless of the try / catch result
             }


Declaration: ALWAYS declare variables upfront;
             use strcit mode to prevent bad syntax;


Style guide: variable name: camel style;
             operator: use space around them;
             use four spaces for code indentation;
             always end a simple statement with semicolon;
             complex statement use {}, such as function and loop;


Tips: always use local variable;
      declare variable at top of statement;
      never use number, string, boolean object;
      don't use new object;
      beaware of automatic type conversion;
      use === instead of == whenever possible;


More tips on mistakes and performance at W3SCHOOL.COM


Reserved words: see W3SCHOOL.COM

//////////////////////////////////////////////////////////////////////////////

Form validation:
<head>
<script>
function validateForm() {
    var x = document.forms["myForm"]["fname"].value; /* more document see DOM learning note*/
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>
</head>
<body>
<form name="myForm" action="demo_form.asp"
onsubmit="return validateForm()" method="post"> /* onsubmit is type of event*/
/* in this case, onsubmit return submited text to validateForm function */
Name: <input type="text" name="fname">
<input type="submit" value="Submit">
</form>
</body>



Form API:
<input id="id1" type="number" min="100" max="300"> /* send input to getElementById*/
<button onclick="myFunction()">OK</button>
<p id="demo"></p>
<script>
function myFunction() {
    var inpObj = document.getElementById("id1");
    if (inpObj.checkValidity() == false) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
    } else {
        document.getElementById("demo").innerHTML = "Input OK"; /*return message to demo*/
    } 
} 
</script>

///////////////////////////////////////////////////////////////////////////

Create object:

using literals:
var person = {firstName:"John", lastName:"Doe", age:50, eyeColor:"blue"}; 

using keyword 'new':
var person = new Object();
person.firstName = "John";
person.lastName = "Doe";
person.age = 50;
person.eyeColor = "blue";                

using object constructor: /* function is type of constructor */
function person(first, last, age, eye) {
    this.firstName = first;
    this.lastName = last;
    this.age = age;
    this.eyeColor = eye;
}
var myFather = new person("John", "Doe", 50, "blue");
var myMother = new person("Sally", "Rally", 48, "green");

build in js constructor:
var x1 = {};    // A new Object object
var x2 = new String();    // A new String object
var x3 = new Number();    // A new Number object
var x4 = new Boolean()    // A new Boolean object
var x5 = [];     // A new Array object
var x6 = /()/;    // A new RegExp object
var x7 = function(){};  // A new Function object
var x8 = new Date();      // A new Date object 

/////////////////////////////////////////////////////////////////////////////////
Function:
function functionName(parameters) {
  code to be executed
} /* {} is a preperty of object, so function is object aswell */

function constructor: see above;


Function parameters: parameters are the names listed in the function definition:

Function arguments:  arguments are the real values passed to (and received by) the function;
x = findMax(1, 123, 500, 115, 44, 88); /* this invoke functuion*/

function findMax() {
    var i;
    var max = -Infinity;
    for (i = 0; i < arguments.length; i++) { 
        if (arguments[i] > max) {
            max = arguments[i];
        }
    }
    return max;
} 


Invoke funsction

/////////////////////////////////////////////////////////////////////////////////

DOM: Document Object Model; 
     syntax: document.METHODPROPERTY


Intro: The HTML DOM is a standard for how to get, change, add, or delete HTML elements


Methods: methods are actions you can perform; 
         properties are values (of HTML Elements) that you can set or change;
         all HTML elements are defined as objects;

         most common method: getElementById
         easiest way to change content of element: innerHTML
         

Document: 
find elements:
--document.getElementById(id)   Find an element by element id, return in form of content
document.getElementsByTagName(name)   Find elements by tag name, return is in form of array
document.getElementsByClassName(name)   Find elements by class name, return is in form of array

change element: 
--element.innerHTML =  new html content   Change the inner HTML of an element
element.attribute = new value   Change the attribute value of an HTML element
element.setAttribute(attribute, value)  Change the attribute value of an HTML element
element.style.property = new style  Change the style of an HTML element

add/deelet element:
document.createElement(element)   Create an HTML element
document.removeChild(element)   Remove an HTML element
document.appendChild(element)   Add an HTML element
document.replaceChild(element)  Replace an HTML element
document.write(text)  Write into the HTML output stream

event handler: 
document.getElementById(id).onclick = function(){code}  Adding event handler code to an onclick event


--Changing HTML content:
<p id="p1">Hello World!</p>
<script>
document.getElementById("p1").innerHTML = "New text!";
</script>/


--Change value of attribute:
<img id="myImage" src="smiley.gif">
<script>
document.getElementById("myImage").src = "landscape.jpg";
</script>/


--Use event:
<h1 id="id1">My Heading 1</h1>
<button type="button"
onclick="document.getElementById('id1').style.color = 'red'">
Click Me!</button>


Event listener;
syntax:  element.addEventListener(event, function, useCapture);


Nodes:
everything inside html is a node;
node tree, child and parent;


BOM: Browser Object Model
















