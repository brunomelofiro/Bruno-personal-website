<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="../../home/bootstrap/css/bootstrap.css" />
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
</head>
<body>

<?php
include '../session.php';
?>

<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $firstname_session; ?></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
    <div id="chatbox"><?php
      if(file_exists("log.html") && filesize("log.html") > 0){
          $handle = fopen("log.html", "r");
          $contents = fread($handle, filesize("log.html"));
          fclose($handle);

          echo $contents;
      }
      ?>
    </div>

    <form name="message"  class="msgbox" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
	//If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Are you sure you want to end the session?");
		if(exit==true){
      window.location = '../../home/index.php';
      <?php
      file_put_contents("log.html", "");
      ?>
    }
	});
  $("#submitmsg").click(function(){
		var clientmsg = $("#usermsg").val();
    if  (clientmsg != ""){
		$.post("post.php", {text: clientmsg});
  }
  $("#usermsg").attr("value", "");
  return false;
	});
  function loadLog(){
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){
				$("#chatbox").html(html); //Insert chat log into the #chatbox div

				//Auto-scroll
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}
		  	},
		});
	}
  setInterval (loadLog, 50);
});

</script>

</body>
</html>
