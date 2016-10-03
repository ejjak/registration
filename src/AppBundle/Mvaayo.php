<?php
/**
 * Created by PhpStorm.
 * User: Demi
 * Date: 20-Sep-16
 * Time: 10:14 AM
 */
namespace AppBundle;
use AppBundle\Entity\Register;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Mvaayo extends Controller
{
    public function SmsAction($register)
    {
        $ch = curl_init();
        $receipientno='';
        $msgtxt='';
        $user="ezycreation@live.com:Misfit?321";
        if($register instanceof Register) {
            $receipientno = $register->getPhn();
            $detail = array(
                'name' => $register->getName(),
                'address' => $register->getAddress()
            );

            $msgtxt = "Hello ".$detail['name']. " You have been successfully Registered";
        }
        $senderID = "TEST SMS";
        curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
        $buffer = curl_exec($ch);
        if(empty ($buffer))
        { echo " buffer is empty "; }
        else
        { echo $buffer;}
        curl_close($ch);
        return $buffer;
    }


}