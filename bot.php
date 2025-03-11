<?php
$token = "YOUR_BOT_TOKEN";  
$group_chat_id = "YOUR_GROUP/CHANNEL TOKEN";  
$log_file = "user.txt";

$update = json_decode(file_get_contents("php://input"), true);

if (isset($update['message'])) {
    $chat_id = $update['message']['chat']['id'];
    $username = $update['message']['from']['username'] ?? "Unknown";
    $text = $update['message']['text'] ?? "";

    $referral_link = "https://t.me/yourbotusername?start=" . urlencode($username);


    $existing_users = file_exists($log_file) ? file_get_contents($log_file) : "";

    if (strpos($text, "/start") === 0) {
    
        $referrer = trim(str_replace("/start", "", $text));
        
        if (strpos($existing_users, "$username referred by") !== false) {

            $message = "⚠️ @$username, you have already joined!\n";
            $message .= "💡 Share your referral link to invite others:\n";
            $message .= "🔗 *$referral_link*";
        } else {
            // Log referral only if the user is new
            if (!empty($referrer)) {
                file_put_contents($log_file, "$username referred by $referrer\n", FILE_APPEND | LOCK_EX);
            }


            $message = "👋 Welcome, @$username!\n\n";
            $message .= "🎉 Start inviting your friends & earn rewards!\n";
            $message .= "🔗 *Your Referral Link:* $referral_link\n\n";
            $message .= "💡 The more you invite, the more rewards you earn!\n";
            $message .= "🌟 Powered by [DomDev](github.com/domdevofficial) 🧑‍💻";
            $message .= "\n🙇 Thanks For The Bot Idea @SokolovDmitry0 🤗";
            
            

            $total_referrals = substr_count(file_get_contents($log_file), "referred by $username");
            $group_message = "🚀 *New User Joined!*\n";
            $group_message .= "👤 @$username\n";
            $group_message .= "🔗 Referral: " . ($referrer ? "@$referrer" : "None") . "\n";
            $group_message .= "📊 Total Referrals: $total_referrals\n";
            $group_message .= "💡 The more you invite, the more rewards you earn!\n🌟Powered By : DomDev🧑‍💻\n\n🌟Thank you for suggesting @SokolovDmitry0🌟";
             
            file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$group_chat_id&text=" . urlencode($group_message) . "&parse_mode=Markdown");
        }


        file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($message) . "&parse_mode=Markdown");
    }
}
?>
