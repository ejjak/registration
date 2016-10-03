<?php
/**
 * Created by PhpStorm.
 * User: Demi
 * Date: 22-Sep-16
 * Time: 3:28 PM
 */
namespace AppBundle\Controller;
use AppBundle\Entity\Register;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FilterGenderController extends Controller
{
    public function FilterAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('AppBundle:Register')->findAll();

            foreach($data as $val)
            {
                if($val instanceof Register){
                    $id = $val->getId();
                    $name = $val->getName();
                    $email = $val->getEmail();
                    $phone = $val->getPhn();
                    $gender = $val->getGender();
                    $address = $val->getAddress();
                    $church = $val->getChurch();
                    $response[] = array('id'=> $id, 'name'=>$name, 'email'=>$email, 'phone'=>$phone,'gender'=>$gender, 'address'=>$address, 'church'=>$church);
                    $res = array();
                    if($_POST['val'] == 'value1') {
                        foreach ($response as $person) {
                            if (strcasecmp($person['gender'], 'Male') == 0)
                                $res[] = $person;
                        }
                    }
                    else{
                        foreach ($response as $person1) {
                            if (strcasecmp($person1['gender'], 'Female') == 0)
                                $res[] = $person1;
                        }
                    }
                }
            }

        if($request->isXmlHttpRequest()) {
            return $this->render('register/filter.html.twig', array(
                'response' => $res,
                ));
        }
    }

}