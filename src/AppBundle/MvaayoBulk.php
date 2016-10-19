<?php
/**
 * Created by PhpStorm.
 * User: Demi
 * Date: 20-Sep-16
 * Time: 10:14 AM
 */
namespace AppBundle;
use AppBundle\Entity\Register;
use AppBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MvaayoBulk extends Controller
{
    public function BulkSmsAction($phone, $tasks)
    {
//                dump($phone,$tasks );die;
//        $phone_list = "";
//        foreach ($response as $rowRestore)
//        {
//            if(is_array($rowRestore)){
//            $phone_list .= $rowRestore['phone'].",";
//              echo $rowRestore['phone'].",";
//            }
//        }

//        foreach ($response as $val) {
//            if (is_array($val)){
//                echo $val['phone'];
//            }
//        }
//        $ch = curl_init();
//        foreach($response as $key => $value){
//            if(is_array($value)){
//                foreach($value as $key1 => $value1){
//                    echo $key1." ".$value1."<br>";
//            $user = "ezycreation@live.com:Misfit?321";
//            $senderID = "TEST SMS";
//            curl_setopt($ch, CURLOPT_URL, "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($ch, CURLOPT_POST, 1);
//
//                $receipientno = $value1.",";
//                $msgtxt = $key1;
//                curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
//                }
//            }
//        }
//        $buffer = curl_exec($ch);
//
//        if (empty ($buffer)) {
//            echo " buffer is empty ";
//        } else {
//            echo $buffer;
//        }
//
//        curl_close($ch);
//        return $buffer;


//
        $ch = curl_init();
        $user = "ezycreation@live.com:Misfit?321";
        $senderID = "TEST SMS";
        curl_setopt($ch, CURLOPT_URL, "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $receipientno = $phone;

        if($tasks instanceof Task)
        {
            $message = $tasks->getTask();
            $msgtxt = $message;
            curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
        }
        $buffer = curl_exec($ch);

        if (empty ($buffer)) {
            echo " buffer is empty ";
        } else {
//            echo $buffer;
        }
        curl_close($ch);
        return $buffer;

    }
}