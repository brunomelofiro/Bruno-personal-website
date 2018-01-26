<?php
include '../wp-content/session.php';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>
    <script
      src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="/home/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/home/bootstrap/js/bootstrap.min.js"></script>

<nav class="navbar navbar-inverse" style="padding-left:10%; padding-right:10%">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbaar-brand" href="#"><img src="/home/images/chase_logo.png"></a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="#">Link <span class="sr-only"> (current) </span>
      </a></li>
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
        aria-haspopup="true" aria-expanded="false">dropdown<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Separated link</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">One more separated link</a></li>
      </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
        aria-haspopup="true" aria-expanded="false">Dropdown<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
</nav>
  <div class="jumbotron">
    <div class="container">
      <h1>
        Hello there
        <?php echo  $firstname_session . "!";  ?>
      </h1>
      <p><a href="/../wp-content/chatbox/index.php">Live Chat</a></p>
      <span id="logout"> <a>Log Out</a></span>
    </div>
</div>
<div class="main-area">
<div class="col-md-4">
  <div class="acct-info">
    <div class="top-banner">
    </div>
    <div class="acct-type">
      <div class="top-section">
      <h4>
        Checking Account
      </h4>
    </div>
    <div class="bottom-section">
    <h2>
      $00.00
    </h2>
  </div>
    </div>
  </div>
  <div class="ad-info">
    <img src="/home/images/chase_ad.jpg"/>
  </div>
</div>
<div class="col-md-8">
  <div class="detailed-info">
    <div class="top-banner">
    </div><div class="info-header">
    <span><h4>Checking Account</h4><span>
    <span class="select-menu right-fix">
    <select class="form-control">
    <option>Things you can do </options>
    </select>
</span>
  </div>
    <table class="acct-table" role="presentation">
    <tbody class="col-sm-4 col-xs-6 no-grid-padding-left-xs">
    <tr style="display:table;">
    <td class="table-title">Available balance</td>
    <td class="table-value">00.00</td>
    </tr>
    </tbody>
    <tbody class="col-sm-4 col-xs-6 no-grid-padding-left-xs">
      <tr style="display:table;">
      <td class="table-title">Present balance</td>
      <td class="table-value">00.00</td>
      </tr>
    </tbody>
    <tbody class="col-sm-4 col-xs-6 xs-tooltip no-grid-padding-left-xs">
      <tr style="display:table;">
      <td class="table-title">Debit card coverage</td>
      <td class="table-value">Off</td>
      </tr>    </tbody>
  </table>
  <div class="statement-container">
    <div class="col-sm-4 col-md-4 col-lg-4 but-pad">
      <button class="btn btn-default">Statement</button>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 but-pad">
    <button class="btn btn-default">Paperless</button>
  </div>
  <div class="col-sm-4 col-md-4 col-lg-4 but-pad">
    <button class="btn btn-default">Transfer money</button>
  </div>
  </div>
  </div>
  <div class="transaction-details">
    <div class="top-banner">
    </div>
    <div class="transaction-options">
    <span> SHOWING:</span>
    <span class="select-menu">
    <select class="form-control">
    <option>All transactions </options>
    </select>
</span>
    <span> Search ></span>
    </div>
    <div style="padding:2%;">
    <table style="width:100%;">
      <tr>
        <td class="col-md-2">Date</td>
        <td class="col-md-6">Description</td>
        <td class="col-md-2">Amount</td>
        <td class="col-md-2">Balance</td>
      </tr>
    <table>
    </div>
  </div>
</div>
</div>
<!-- shoutbox -->
<div class="shout_box">
<div class="header">Live Chat <div class="close_btn">X</div></div>
  <div class="toggle_chat">
  <div class="message_box" id="message_box">
    <?php
      if(file_exists("../wp-content/chatbox/log.html") && filesize("../wp-content/chatbox/log.html") > 0){
          $handle = fopen("../wp-content/chatbox/log.html", "r");
          $contents = fread($handle, filesize("../wp-content/chatbox/log.html"));
          fclose($handle);

          echo $contents;
      }
      ?>
    </div>
    <div class="user_info">
      <form name="message" class="msgbox" action="">
    <input name="shout_message" id="shout_message" type="text" size="63"/>
<input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
</form>
    </div>
    </div>
</div>
<!-- shoutbox end -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
//toggle hide/show shout box
$(".close_btn").click(function (e) {
    //get CSS display state of .toggle_chat element
    var toggleState = $('.toggle_chat').css('display');

    //toggle show/hide chat box
    $('.toggle_chat').slideToggle();

    //use toggleState var to change close/open icon image
    if(toggleState == 'block')
    {
        $(".header div").attr('class', 'open_btn');
    }else{
        $(".header div").attr('class', 'close_btn');
    }
});
$(document).ready(function(){

  $("#logout").click(function(){
    var exit = confirm("Are you sure you want to Log out?");
    if(exit==true){
      window.location = '../wp-content/logout.php';
    }
  });

  $("#submitmsg").click(function(){
    var clientmsg = $("#shout_message").val();
    if (clientmsg != ""){
    $.post("../wp-content/chatbox/post.php", {text: clientmsg});
  }
    $("#shout_message").attr("value", "");
    return false;
  });
  function loadLog(){
    var oldscrollHeight = $("#message_box").attr("scrollHeight") - 20; //Scroll height before the request
    $.ajax({
      url: "../wp-content/chatbox/log.html",
      cache: false,
      success: function(html){
        $("#message_box").html(html); //Insert chat log into the #message_box div

        //Auto-scroll
        var newscrollHeight = $("#message_box").attr("scrollHeight") - 20; //Scroll height after the request
        if(newscrollHeight > oldscrollHeight){
          $("#message_box").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
        }
        },
    });
  }
  setInterval (loadLog, 50);

});

</script>
</body>
<?php
