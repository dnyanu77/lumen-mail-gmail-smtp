<?php
use Illuminate\Support\Facades\Mail;

class_alias('Illuminate\Support\Facades\Config', 'Config');

$app->get('/', function () use ($app) {
    
$config = array(
                'driver' => 'smtp',
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'from' => array('address' => 'from_email_id', 'name' => 'From_name'),
                'encryption' => 'tls',
                'username' => 'Your_email_ID',
                'password' => 'Your_password',
                'sendmail' => '/usr/sbin/sendmail -bs',
                'pretend' => false
            );
    Config::set('mail',$config);
    
   try{
        Mail::raw('This is Email Body', function($msg) { $msg->to(['harerdnyaneshwar@gmail.com']); $msg->from(['From_email']); });
    
    echo "Mail Sent Successfully";

   }catch(Exception $e){
       echo "error Sending Mail <pre>";
      // print_r($e);
       echo "</pre>";

   }
    
});
    


