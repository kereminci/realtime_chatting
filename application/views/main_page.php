<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/chat.css")?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<h1>Real Time Messaging</h1>



<pre id="messages" style="height: 400px; overflow: scroll">

</pre>
<input type="text" id="messageBox" placeholder="Type your message here" style="display: block; width: 100%; margin-bottom: 10px; padding: 10px;" />
<button id="send" title="Send Message!" style="width: 100%; height: 30px;">Send Message</button>



<script>


  (function() {
    const sendBtn = document.querySelector('#send');
    const messages = document.querySelector('#messages');
    const messageBox = document.querySelector('#messageBox');


    let ws;

    function showMessage(message) {
        
      message = JSON.parse(message);

      $('#messages').append(
        `<div class="container">
        <img src="${message['img']}" alt="Avatar">
        <p><span>${message['fname']} ${message['lname']}</p>
        <p>${message['message']}</p>
        <span class="time-right">${message['time']}</span>
        </div>`
    );
  
      messages.scrollTop = messages.scrollHeight;
      messageBox.value = '';
    }

    function init() {
      if (ws) {
        ws.onerror = ws.onopen = ws.onclose = null;
        ws.close();
      }

      ws = new WebSocket('ws://localhost:6969');
      ws.onopen = () => {
        console.log('Connection opened!');
      }
      ws.onmessage = ({ data }) => showMessage(data);
      ws.onclose = function() {
        ws = null;
      }
    }

    sendBtn.onclick = function() {
      if (!ws) {
        showMessage("No WebSocket connection :(");
        return ;
      }

      var d = new Date();
      var time = `${d.getDate()}/${d.getMonth() + 1}/${d.getFullYear()}  ${d.getHours()}:${d.getMinutes()} `;

     // ws.send(messageBox.value);
     var message = JSON.stringify({
        message : messageBox.value,
        img : "<?php echo base_url("uploads/profile/". $_SESSION['img']) ?>",
        fname : "<?php echo $_SESSION['fname'] ?>",
        lname : "<?php echo $_SESSION['lname'] ?>",
        phone: "<?php echo $_SESSION['phone'] ?>",
        time : time
      });

      ws.send(message);
      showMessage(message);
    }
    messageBox.addEventListener("keyup", function (event)
    {
        if (event.keyCode === 13)
        {
          event.preventDefault();
          sendBtn.click();
        }
    })



    init();
  })();
</script>
</body>
</html>

