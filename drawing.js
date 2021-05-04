// server.js

var canvas, context, flag = false,
    x0 = 0,
    x1 = 0,
    y0 = 0,
    y1 = 0,
    dot_flag = false;

var x = "black",
    y = 5;

function init() {
    canvas = document.getElementById('can');
    window.onload = countDown(60);
    document.getElementById("messages").focus();
    context = canvas.getContext("2d");
    w = canvas.width;
    h = canvas.height;

    canvas.addEventListener("mouseup", function (e) {
        findxy('up', e)
    }, false);
    canvas.addEventListener("mousemove", function (e) {
        findxy('move', e)
    }, false);
    canvas.addEventListener("mouseout", function (e) {
        findxy('up', e)
    }, false);
    canvas.addEventListener("mousedown", function (e) {
        findxy('down', e)
    }, false);
    
    
}

countDown = (count) =>  {
    if (count >= 0) {
    var d = document.getElementById("countDiv");
    d.innerHTML = "Time: " + count ;
    setTimeout (function() { countDown(count-1); }, 1000);
    }
    else 
    window.alert("Time is up!");
}

function color(obj) {
    x = obj.id
    if (x == "white") y = 20;
    else y = 5;

}

function draw() {
    context.beginPath();
    context.moveTo(x0, y0);
    context.lineTo(x1, y1);
    context.strokeStyle = x;
    context.lineWidth = y;
    context.stroke();
    context.closePath();
}

function findxy(res, e) {
    if (res == 'down') {
        x0 = x1;
        y0 = y1;
        x1 = e.clientX - canvas.offsetLeft;
        y1 = e.clientY - canvas.offsetTop;

        flag = true;
        dot_flag = true;
        if (dot_flag) {
            context.beginPath();
            context.fillStyle = x;
            context.fillRect(x1, y1, 2, 2);
            context.closePath();
            dot_flag = false;
        }
    }
    if (res == 'up') {
        flag = false;
    }
    if (res == 'move') {
        if (flag) {
            x0 = x1;
            y0 = y1;
            x1 = e.clientX - canvas.offsetLeft;
            y1 = e.clientY - canvas.offsetTop;
            draw();
        }
    }
}


function makeAjaxCall(str)
{
   if (str.length == 0)
   {
      document.getElementById("list").innerHTML = "";
      return;
   }
   xhr = GetXmlHttpObject();
   if (xhr == null)
   {
      alert ("Your browser does not support XMLHTTP!");
      return;
   }
   var url="guess.php";
   url = url + "?Guess="+str;
   xhr.onreadystatechange= showGuess;
   xhr.open("GET", url, true); // true -- asynch (default), false-- synch
   xhr.send(null) // null-- avoid old firefox
}

document.getElementById("guess").addEventListener("click", function()    {
    var str_solar = document.getElementById("messages").value;
    makeAjaxCall(str_solar);
});

function showGuess()
{
   if(xhr.readyState == 4 && xhr.status == 200)
   {
    if (xhr.responseText == "correct") {
        alert("Player guessed correctly!");
        location.reload();
    }
    var node = document.createElement("LI");
        var textnode = document.createTextNode(xhr.responseText);
        node.appendChild(textnode);    
        document.getElementById("list").appendChild(node);
   }
}

function GetXmlHttpObject()
{
   if (window.XMLHttpRequest)
   {  // code for IE7+, Firefox, Chrome, Opera, Safari
      return new XMLHttpRequest();
   }
   if (window.ActiveXObject)
   { // code for IE6, IE5
     return new ActiveXObject ("Microsoft.XMLHTTP");
   }
   return null;
}

