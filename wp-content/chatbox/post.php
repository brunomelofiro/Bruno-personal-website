<?php
include '../session.php';
session_start();
if(isset($firstname_session)){
    $text = $_POST['text'];
    $sent_text = str_replace(' ', '%20', $text);
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$firstname_session."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);

    $dataArray = $_POST;
    $api_baseurl = "http://api.program-o.com";
    $endpoint = "$api_baseurl/v2/chatbot/?bot_id=12&say=.$sent_text.&convo_id=exampleusage_1231232&format=json";

    $ch= curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($ch);


 $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
     curl_close($ch);
    if ($status != 200)
{
      $status = array(
        //  'captcha'=>null,'into'=>"#wpcf7-f6743-p6741-o1",'mailSent'=>false,'message'=> 'Error Satus : '.$status


      );
      echo json_encode($status);
      die();
      ///throw new Exception("Error: call to URL $endpoint failed with status $status, response $curl_response, curl_error " . curl_error($ch) . ", curl_errno " . curl_errno($ch) . "\n");


}
else
{
      $response = json_decode($curl_response, true);
      $data = array("response" =>
      array(
        'convo_id'=> $response["convo_id"],
        'usersay' => $response["usersay"],
        'botsay' => $response["botsay"]
      ));
      var_dump($data);
      $fp = fopen("log.html", 'a');
      fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>Bot</b>: ".stripslashes(htmlspecialchars($response['botsay']))."<br></div>");
      fclose($fp);
}
}

?>
