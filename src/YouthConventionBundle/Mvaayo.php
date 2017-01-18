<?php
/**
 * Created by PhpStorm.
 * User: Demi
 * Date: 20-Sep-16
 * Time: 10:14 AM
 */
namespace YouthConventionBundle;
use YouthConventionBundle\Entity\Delegates;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Mvaayo extends Controller
{
    public function SmsAction($register)
    {
        $ch = curl_init();
        $receipientno='';
        $msgtxt='';
        $user="ezycreation@live.com:Misfit?321";
        if($register instanceof Delegates) {
            $receipientno = $register->getPhone();
//            $id = $register->getId();
            $detail = array(
                'id' => $register->getId(),
                'name' => $register->getName(),
                'church' => $register->getChurch(),
                'district' => $register->getDistrict()
            );
            $district = $detail['district'];
            $d = $district[0];
            $thanks =", thank you for registering with 23rd Annual Youth Convention. Your registration id is AYC";
            $queries = " For any queries please call Milan 9563344569, Issachar 9563344569, Robin 9563344569, Kessang 9563344569";
//          $query = "For any queries please call Milan 9563344569, Issachar 9563344569, Robin 9563344569, Kessang 9563344569";
//          $msgtxt = "Dear ".$detail['name']." from ".$detail['church']. ", thanks for registering with 23rd Annual Youth Convention".$d."".$detail['id'];
            $msgtxt = "Dear ".$detail['name'].$thanks.$d.$detail['id'].$queries;
        }
        $senderID = "TEST SMS";
        curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose?state=1");
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