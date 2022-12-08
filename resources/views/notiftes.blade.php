<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once '../vendor/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "AC8daa3ff3ee3d2e1b7df5d6ead469a5af"; 
$token  = "6dd3fefef0e705f5644ddb48c48d24c2"; 
$twilio = new Client($sid, $token); 

$now = new DateTime();
$count = DB::table('perjanjians')->where('berakhir', "<=", $now)->count();

$to = "whatsapp:+6281241273578";
$from = "whatsapp:+14155238886";
$body = "KONTOL";

 
$message = $twilio->messages 
                  ->create($to, // to 
                           array( 
                               "from" => $from,       
                               "body" => $body
                           ) 
                  ); 
 
print($message->sid);