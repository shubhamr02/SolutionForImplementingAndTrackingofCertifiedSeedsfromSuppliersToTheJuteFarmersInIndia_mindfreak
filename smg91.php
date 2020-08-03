<?php
if (isset($_POST['msgBtn'])) {
    $authKey = "337753ArNLvUMCXts5f26ebcfP1";
    $mobileNumber = $row1['fphone'];
    //Sender ID, 6 characters long.
    $senderId = "Okijhu";
    $msg = "To track your package click on the link"."$rfv";
    echo '<script>alert("Message sent")</script>';
    $message = urlencode($_POST['msg']);
    $route = "default";
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );

    //API URL
    $url = "http://api.msg91.com/api/sendhttp.php";

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
    ));

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'error:' . curl_error($ch);
    }
    curl_close($ch);

    if ($output != NULL) {
        echo '<script>alert("Message sent")</script>';
    }
}
}
?>