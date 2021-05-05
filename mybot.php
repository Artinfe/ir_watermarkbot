<?php
    
    $bot_url = "https://api.telegram.org/bot1732693214:AAHDQGOPmcBUwBoDbudQD3zYYIv-8GiK3yg";
    
    //-------------------------------------
    
    $update = file_get_contents("php://input");
    
    $update_array = json_decode($update, true);
    
    if( isset($update_array["callback_query"]) ) {
        
        $data              = $update_array["callback_query"]["data"];
        $callback_query_id = $update_array["callback_query"]["id"];
        $chat_id           = $update_array["callback_query"]["message"]["chat"]["id"];
        
        detect_callback_received_and_reply();
    }
    else if( isset($update_array["message"]) ) {
        
        $text    = $update_array["message"]["text"];
        $chat_id = $update_array["message"]["chat"]["id"];
    }

///-------------------
	
    if( isset($update_array["callback_query1"]) ) {
        
        $data               = $update_array["callback_query1"]["data"];
        $callback_query_id1 = $update_array["callback_query1"]["id"];
        $chat_id            = $update_array["callback_query1"]["message"]["chat"]["id"];
        
        detect_callback_received_and_reply1();
    }
    else if( isset($update_array["message"]) ) {
        
        $text    = $update_array["message"]["text"];
        $chat_id = $update_array["message"]["chat"]["id"];
    }
//---------------------
    if( isset($update_array["callback_query2"]) ) {
        
        $data               = $update_array["callback_query2"]["data"];
        $callback_query_id1 = $update_array["callback_query2"]["id"];
        $chat_id            = $update_array["callback_query2"]["message"]["chat"]["id"];
        
        detect_callback_received_and_reply2();
    }
    else if( isset($update_array["message"]) ) {
        
        $text    = $update_array["message"]["text"];
        $chat_id = $update_array["message"]["chat"]["id"];
    }
//------------------------
    if( isset($update_array["callback_query3"]) ) {
        
        $data               = $update_array["callback_query3"]["data"];
        $callback_query_id1 = $update_array["callback_query3"]["id"];
        $chat_id            = $update_array["callback_query3"]["message"]["chat"]["id"];
        
        detect_callback_received_and_reply3();
    }
    else if( isset($update_array["message"]) ) {
        
        $text    = $update_array["message"]["text"];
        $chat_id = $update_array["message"]["chat"]["id"];
    }

    //-------------------------------------
    
    $inline_keyboard = [
                            // 1
                            [
                                [ 'text' => "👤 Admin" , 'url' => "t.me/farshidband" ] ,
                                [ 'text' => "👥 Group"   , 'url' => "www.google.com" ]
                            ] ,

           // 2
                            [
                                [ 'text' => "🎯My Channel" , 'url' => "t.me/Seriesplus1" ]
                            ] ,

                            
                            // 3
                            [
                                [ 'text' => "I Agree" , 'callback_data' => "agree" ]
                            ] ,
                            
                            // 4
                            [
                                [ 'text' => "send link to friends" , 'switch_inline_query' => "پیام آزمایشی ۱" ]
                            ] ,
                            
                            // 5
                            [
                                [ 'text' => "Copy Link in Input Area" , 'switch_inline_query_current_chat' => "پیام آزمایشی ۲" ]
                            ] ,
                            
                       ];
    
    $inline_kb_options = [
                            'inline_keyboard' => $inline_keyboard
                         ];
///----------------------------------
    $inline_keyboard = [
                            [
                                [ 'text' => "🎯SeriesPlus1" , 'url' => "t.me/seriesplus2" ]
                            ] ,

                            [
                                [ 'text' => "♻جایگاه واترمارک" , 'callback_data' => "tanzim" ]
                            ] ,
                            [
                                [ 'text' => "بالا راست↖" , 'callback_data' => "tanzim1" ] ,
                                [ 'text' => "بالا چپ↗" , 'callback_data' => "tanzim2" ]
  
                            ] ,
 
                            [
                                [ 'text' => "پایین چپ↙" , 'callback_data' => "tanzim4" ] ,
                                [ 'text' => "پایین راست↘" , 'callback_data' => "tanzim3" ]
  
                            ] ,
 
                       ];

    $inline_kb_options1 = [
                            'inline_keyboard' => $inline_keyboard
                         ];
    //-------------------------------------//

    switch($text) {
        
        case "/start" : show_menu();                 break;
        case "/setwatermark" : show_watermark();     break;
        case "/help" : show_help();                  break;
        case "/setting" : show_setting();            break;

 }

  //----------------------------------------
    // نمایش منو
    function show_menu() {
        
        $json_kb = json_encode($GLOBALS['inline_kb_options']);
        $reply = "select an option from the menu";
        $url = $GLOBALS['bot_url'] . "/sendMessage";
        $post_params = [ 'chat_id' =>  $GLOBALS['chat_id'] , 'text' => $reply , 'reply_markup' => $json_kb ];
        send_reply($url, $post_params);
    }
    
    //-------------------------------------

    
    // نمایش پیام برای دستور help
    function show_help() {
        
        $reply  = "برای دریافت راهنمایی بیشتر کلیک کنید";
        $url = $GLOBALS['bot_url'] . "/sendMessage";
        $post_params = [ 'chat_id' => $GLOBALS['chat_id'] , 'text' => $reply ];
        send_reply($url, $post_params);
    }
    
    //-------------------------------------


// نمایش پیام برای دستور setting
function show_setting() {
        
        $json_kb = json_encode($GLOBALS['inline_kb_options1']);
        $reply = "تنظیمات را به دلخواه تغییر دهید";
        $url = $GLOBALS['bot_url'] . "/sendMessage";
        $post_params = [ 'chat_id' =>  $GLOBALS['chat_id'] , 'text' => $reply , 'reply_markup' => $json_kb ];
        send_reply($url, $post_params);
    }
    //-------------------------------------

// نمایش پیام برای دستور set watermark
    function show_watermark() {
        
        $reply = "واترمارکی که میخواهید برای درج در ویدیو استفاده کنید بفرستید";
        $url = $GLOBALS['bot_url'] . "/sendMessage";
        $post_params = [ 'chat_id' =>  $GLOBALS['chat_id'] , 'text' => $reply ];
        send_reply($url, $post_params);
    }
    
    //-------------------------------------

    function detect_callback_received_and_reply() {
        
        $callback_data = $GLOBALS['data'];
        
        if($callback_data == "agree") {
            
            // ثبت نظر در دیتابیس
            
            $reply = "با تشکر - نظر شما ثبت شد";
            $url = $GLOBALS['bot_url'] . "/sendMessage";
            $post_params = [ 'chat_id' =>  $GLOBALS['chat_id'] , 'text' => $reply ];
            send_reply($url, $post_params);
            
            //------------------------------
            
            $reply = "با تشکر - نظر شما ثبت شد";
            $url = $GLOBALS['bot_url'] . "/answerCallbackQuery";
            $post_params = [ 
                            'callback_query_id' => $GLOBALS['callback_query_id'] , 
                            'text'              => $reply ,
                            'show_alert'        => true
                            ];
            send_reply($url, $post_params);
        }
    }
    
//------------------------------------------------------

    function detect_callback_received_and_reply1() {
        
        $callback_data = $GLOBALS['data'];
        
        if($callback_data == "tanzim") {
            
            // ثبت نظر در دیتابیس
            
            $reply = "با تشکر - نظر شما ثبت شد";
            $url = $GLOBALS['bot_url'] . "/sendMessage";
            $post_params = [ 'chat_id' =>  $GLOBALS['chat_id'] , 'text' => $reply ];
            send_reply($url, $post_params);
            
            //------------------------------
            
            $reply = "با تشکر - نظر شما ثبت شد";
            $url = $GLOBALS['bot_url'] . "/answerCallbackQuery";
            $post_params = [ 
                            'callback_query_id' => $GLOBALS['callback_query_id'] , 
                            'text'              => $reply ,
                            'show_alert'        => true
                            ];
            send_reply($url, $post_params);
        }
    }
    
//------------------------------------------------------

    function detect_callback_received_and_reply2() {
        
        $callback_data = $GLOBALS['data'];
        
        if($callback_data == "tanzim1") {
            
            // ثبت نظر در دیتابیس
            
            $reply = "با تشکر - نظر شما ثبت شد";
            $url = $GLOBALS['bot_url'] . "/sendMessage";
            $post_params = [ 'chat_id' =>  $GLOBALS['chat_id'] , 'text' => $reply ];
            send_reply($url, $post_params);
            
            //------------------------------
            
            $reply = "با تشکر - نظر شما ثبت شد";
            $url = $GLOBALS['bot_url'] . "/answerCallbackQuery";
            $post_params = [ 
                            'callback_query_id' => $GLOBALS['callback_query_id'] , 
                            'text'              => $reply ,
                            'show_alert'        => true
                            ];
            send_reply($url, $post_params);
        }
    }

//------------------------------------------------------

    function detect_callback_received_and_reply3() {
        
        $callback_data = $GLOBALS['data'];
        
        if($callback_data == "tanzim2") {
            
            // ثبت نظر در دیتابیس
            
            $reply = "با تشکر - نظر شما ثبت شد";
            $url = $GLOBALS['bot_url'] . "/sendMessage";
            $post_params = [ 'chat_id' =>  $GLOBALS['chat_id'] , 'text' => $reply ];
            send_reply($url, $post_params);
            
            //------------------------------
            
            $reply = "با تشکر - نظر شما ثبت شد";
            $url = $GLOBALS['bot_url'] . "/answerCallbackQuery";
            $post_params = [ 
                            'callback_query_id' => $GLOBALS['callback_query_id'] , 
                            'text'              => $reply ,
                            'show_alert'        => true
                            ];
            send_reply($url, $post_params);
        }
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
    
    //-------------------------------------
?>