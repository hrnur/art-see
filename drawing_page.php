<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- required to handle IE -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!--BOOTSTRAP SETUP-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
        <!--CUSTOM CSS-->
        <link rel="stylesheet" href="CSS/index-page.css">
    
    </head>
    


<script type="text/javascript">
    var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;

    var x = "black",
        y = 5;

    function init() {
        canvas = document.getElementById('can');
        window.onload = countDown(60);
        document.getElementById("messages").focus();
        ctx = canvas.getContext("2d");
        w = canvas.width;
        h = canvas.height;

        canvas.addEventListener("mousemove", function (e) {
            findxy('move', e)
        }, false);
        canvas.addEventListener("mousedown", function (e) {
            findxy('down', e)
        }, false);
        canvas.addEventListener("mouseup", function (e) {
            findxy('up', e)
        }, false);
        canvas.addEventListener("mouseout", function (e) {
            findxy('out', e)
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

    // chats = () => {
    //     var text = document.getElementById("messages").value;
    //     var li = "<li>" + text + "</li>";
    //     document.getElementById("list").appendChild(li);
    // }
    //TODO: display chat inputs


    function color(obj) {
        x = obj.id
        if (x == "white") y = 20;
        else y = 5;

    }

    function draw() {
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(currX, currY);
        ctx.strokeStyle = x;
        ctx.lineWidth = y;
        ctx.stroke();
        ctx.closePath();
    }



    function erase() {
        var m = confirm("Want to clear");
        if (m) {
            ctx.clearRect(0, 0, w, h);
            document.getElementById("canvasimg").style.display = "none";
        }
    }

    /*
    function save() {
        document.getElementById("canvasimg").style.border = "2px solid";
        var dataURL = canvas.toDataURL();
        document.getElementById("canvasimg").src = dataURL;
        document.getElementById("canvasimg").style.display = "inline";
    }
    */

    function findxy(res, e) {
        if (res == 'down') {
            prevX = currX;
            prevY = currY;
            currX = e.clientX - canvas.offsetLeft;
            currY = e.clientY - canvas.offsetTop;

            flag = true;
            dot_flag = true;
            if (dot_flag) {
                ctx.beginPath();
                ctx.fillStyle = x;
                ctx.fillRect(currX, currY, 2, 2);
                ctx.closePath();
                dot_flag = false;
            }
        }
        if (res == 'up' || res == "out") {
            flag = false;
        }
        if (res == 'move') {
            if (flag) {
                prevX = currX;
                prevY = currY;
                currX = e.clientX - canvas.offsetLeft;
                currY = e.clientY - canvas.offsetTop;
                draw();
            }
        }
    }
</script>

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- required to handle IE -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="custom.css">

    <title>art, see!</title>

</head>

<body onload="init()">
    <header>
        <?php
        include('navbar.html');
        ?>
    </header>

    <div class="container">

        <div class="party">
            <div class="info">
                <h3>Party Name</h3>
                <p style="font-size: 12px;">Category: Animals <br/> <!---TODO: get category info from data in groups page-->
                    Round 1/3
                </p>
            </div>
            <hr>
            10/10
            <ul>
                <li>Player 1</li> <!--TODO: iterate through list of party members-->
                <li>Player 2</li>
                <li>Player 3</li>
                <li>Player 4</li>
                <li>Player 5</li>
                <li>Player 6</li>
                <li>Player 7</li>
                <li>Player 8</li>
                <li>Player 9</li>
                <li>Player 10</li>
            </ul>
            
        </div>

        <div class="canvas .col-md-6">
            <div style="text-align: center;"><strong>Player 1</strong> is drawing <strong>__ E __ O</strong></div> <!--TODO: use php to update player drawing and word with letter hints-->
            
            <div class="chat">
                 <ul id='list' style="top: 2px; position: absolute;">hi</ul>
                 <input type="text" id="messages" style="bottom: 2px; position:absolute;" > 
                </div>
            <canvas id="can" width="400" height="350"
                style="position:relative; border:2px solid;left:30%;">
            
            </canvas>

            
                <div id="countDiv" style="position:relative; left:20%;"></div>
            <div class="colors" style="position:relative;top:15%;left:45%;width:10px;height:10px;background:green;" id="green"
                onclick="color(this)"></div>
            <div class="colors" style="position:relative;top:15%;left:46%;width:10px;height:10px;background:blue;" id="blue"
                onclick="color(this)"></div>
            <div class="colors" style="position:relative;top:15%;left:47%;width:10px;height:10px;background:red;" id="red"
                onclick="color(this)"></div>
            <div class="colors" style="position:relative;top:17%;left:45%;width:10px;height:10px;background:yellow;" id="yellow"
                onclick="color(this)"></div>
            <div class="colors" style="position:relative;top:17%;left:46%;width:10px;height:10px;background:orange;" id="orange"
                onclick="color(this)"></div>
            <div class="colors" style="position:relative;top:17%;left:47%;width:10px;height:10px;background:black;" id="black"
                onclick="color(this)"></div>
            <div style="position:relative;top:20%;left:43%;">Eraser</div>
            <div style="position:relative;top:23%;left:45%;width:15px;height:15px;background:white;border:2px solid;"
                id="white" onclick="color(this)"></div>
            <img id="canvasimg" style="position:absolute;top:10%;left:52%;" style="display:none;">
            <!-- <input type="button" value="clear" id="clr" size="23" onclick="clear()"
                style="position:relative;top:55%;left:55%;"> -->
        </div>
<!-- 
        <div class="messages .col-md-3" style="background-color: grey;"> -->

        </div>
        
        
        
        <?php 
        include('footer.html');
        ?>

</body>

</html>