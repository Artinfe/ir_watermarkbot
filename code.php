<?php
    
    $bot_url = "https://api.telegram.org/bot1732693214:AAEMpH9iBOmBA-WFC8Pc63mpo739S6vAoqU";
    
    $update = file_get_contents("php://input");
    
    $update_array = json_decode($update, true);
    
    if( isset($update_array["message"]) ) {
        
        $text    = $update_array["message"]["text"];
        $chat_id = $update_array["message"]["chat"]["id"];
    }
    
    //-------------------------------------

$inline_keyboard = [
                            
                            [
                                [ 'text' => "📢Channel 1" , 'url' => "t.me/seriesplus1" ] ,
                                [ 'text' => "📢Channel 2" , 'url' => "t.me/dlchin" ]
                            ] ,

                            [
                                [ 'text' => "🎯 instagram" , 'url' => "instagram.com/Series.plus1" ]
                            ]  
                            
                       ];
    
    $inline_kb_options = [
                            'inline_keyboard' => $inline_keyboard
                         ];
//--------

switch($text) {
        
        case "/start" : show_menu();      break;
        case "/payam" : show_message();   break;
        case $text : message();           break;
}

///--------

function show_menu() {
        
        $json_kb = json_encode($GLOBALS['inline_kb_options']);
        $reply = "😇 سلام ، خوش آمدید...❤️

✅@SeriesPlus1

📌 نظرات را تایپ و ارسال کنید.";
        $url = $GLOBALS['bot_url'] . "/sendMessage";
        $post_params = [ 'chat_id' =>  $GLOBALS['chat_id'] , 'text' => $reply , 'reply_markup' => $json_kb ];
        send_reply($url, $post_params);
    }

//-------

function show_message() {
        
        $reply = "پیام خود را بفرستید.";
        $url = $GLOBALS['bot_url'] . "/sendMessage";
        $post_params = [ 'chat_id' =>  $GLOBALS['chat_id'] , 'text' => $reply ];
        send_reply($url, $post_params);

}

function message() {

        $reply = "✅ در حال ارسال ....  

⭕️ 0%  -  [▢▢▢▢▢▢▢▢▢▢]";
        $url = $GLOBALS['bot_url'] . "/sendMessage";
        $post_params = [ 'chat_id' =>  $GLOBALS['chat_id'] , 'text' => $reply ];
        $result = send_reply($url, $post_params);
        $result_array = json_decode($result, true);
        $msg_id  = $result_array["result"]["message_id"];
    
       sleep(1);
    
    $reply = "✅ در حال ارسال ....  

⭕️ 10%  -  [▣▢▢▢▢▢▢▢▢▢]";
    $url = $GLOBALS['bot_url'] . "/editMessageText";
    $post_params = [ 'chat_id' => $GLOBALS['chat_id'] , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);

   sleep(1);
    
    $reply = "✅ در حال ارسال ....  

⭕️ 20%  -  [▣▣▢▢▢▢▢▢▢▢]";
    $url = $GLOBALS['bot_url'] . "/editMessageText";
    $post_params = [ 'chat_id' => $GLOBALS['chat_id'] , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);

   sleep(1);
    
    $reply = "✅ در حال ارسال ....  

⭕️ 30%  -  [▣▣▣▢▢▢▢▢▢▢]";
    $url = $GLOBALS['bot_url'] . "/editMessageText";
    $post_params = [ 'chat_id' => $GLOBALS['chat_id'] , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);

   sleep(1);
    
    $reply = "✅ در حال ارسال ....  

⭕️ 40%  -  [▣▣▣▣▢▢▢▢▢▢]";
    $url = $GLOBALS['bot_url'] . "/editMessageText";
    $post_params = [ 'chat_id' => $GLOBALS['chat_id'] , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);

   sleep(1);
    
    $reply = "✅ در حال ارسال ....  

⭕️ 50%  -  [▣▣▣▣▣▢▢▢▢▢]";
    $url = $GLOBALS['bot_url'] . "/editMessageText";
    $post_params = [ 'chat_id' => $GLOBALS['chat_id'] , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);

   sleep(1);
    
    $reply = "✅ در حال ارسال ....  

⭕️ 60%  -  [▣▣▣▣▣▣▢▢▢▢]";
    $url = $GLOBALS['bot_url'] . "/editMessageText";
    $post_params = [ 'chat_id' => $GLOBALS['chat_id'] , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);

   sleep(1);
    
    $reply = "✅ در حال ارسال ....  

⭕️ 70%  -  [▣▣▣▣▣▣▣▢▢▢]";
    $url = $GLOBALS['bot_url'] . "/editMessageText";
    $post_params = [ 'chat_id' => $GLOBALS['chat_id'] , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);

   sleep(1);
    
    $reply = "✅ در حال ارسال ....  

⭕️ 80%  -  [▣▣▣▣▣▣▣▣▢▢]";
    $url = $GLOBALS['bot_url'] . "/editMessageText";
    $post_params = [ 'chat_id' => $GLOBALS['chat_id'] , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);

   sleep(1);
    
    $reply = "✅ در حال ارسال ....  

⭕️ 90%  -  [▣▣▣▣▣▣▣▣▣▢]";
    $url = $GLOBALS['bot_url'] . "/editMessageText";
    $post_params = [ 'chat_id' => $GLOBALS['chat_id'] , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);

     sleep(1);
    
    $reply = "✅ پیام ارسال شد. .... 😍 

⭕️ 100%  -  [▣▣▣▣▣▣▣▣▣▣]";
    $url = $GLOBALS['bot_url'] . "/editMessageText";
    $post_params = [ 'chat_id' => $GLOBALS['chat_id'] , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);
    
     sleep(3);
    
    $reply = "☑️پیام شما با موفقیت ارسال شد.😊

⭕️بزودی نتیجه آن برایتان فرستاده خواهد شد.🙏🌹

🌀@SeriesPlus1
🌀@DLCHIN
🌐 instagram.com/SeriesPlus1";
    $url = $GLOBALS['bot_url'] . "/editMessageText";
    $post_params = [ 'chat_id' => $GLOBALS['chat_id'] , 'text' => $reply , 'message_id' => $msg_id ];
    send_reply($url, $post_params);
    
    }

    //------------------------------------- 

    function send_reply($url, $post_params) {
        
        $cu = curl_init();
        curl_setopt($cu, CURLOPT_URL, $url);
        curl_setopt($cu, CURLOPT_POSTFIELDS, $post_params);
        curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);  // get result
        $result = curl_exec($cu);
        curl_close($cu);
        return $result;
    }
    
?>
