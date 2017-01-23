<?php
$access_token = "129283340911236|qyHw9SrGwbV3Z2qK0GiNY3yy2YM";
$verify_token = "thanhnv";
$hub_verify_token = null;
if(isset($_REQUEST['hub_challenge'])) {
    $challenge = $_REQUEST['hub_challenge'];
    $hub_verify_token = $_REQUEST['hub_verify_token'];
}
if ($hub_verify_token === $verify_token) {
    echo $challenge;
}
if(isset($_POST['page'])) {
    $entry = $_POST['entry'];
    $pageID = $entry[0]['id'];
    $timeOfEvent = $entry[0]['time'];

    $recipientId    =    $entry[0]->messaging[0]->message->recipient->id;
    $messageData = array(
        'recipient'=> array(
            'id'=> $recipientId),
        array('message'=> array(
            'text'=> 'messageText')
        )
    );
    $result =  json_encode($messageData);
    echo $result;
}
