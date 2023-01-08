<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function sendMessage($chatID, $message) {
    $token = '1803841691:AAGBj79NUD_xZ2F4kFxG7LcIFiU7g7dSVr0';
    // echo "sending message to " . $chatID . "\n";

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}





