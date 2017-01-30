<?php
/**
 * Created by PhpStorm.
 * User: Demi
 * Date: 30-Jan-17
 * Time: 2:35 PM
 */
namespace YouthConventionBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YouthConventionBundle\Entity\Delegates;

class FilterDistrictController extends Controller
{
    public function FilterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('YouthConventionBundle:Delegates')->findAll();

        foreach($data as $val)
        {
            if($val instanceof Delegates)
            {
                $id = $val->getId();
                $name = $val->getName();
                $lastname = $val->getLastname();
                $gender = $val->getGender();
                $phone = $val->getPhone();
                $church= $val->getChurch();
                $district = $val->getDistrict();
                $response[]= array('id'=>$id, 'name'=>$name, 'lastname'=>$lastname, 'gender'=>$gender, 'phone'=>$phone, 'church'=>$church,'district'=>$district);
                $res=array();
                if($_POST['val'] == 'value1') {
                    foreach ($response as $zone) {
                        if (strcasecmp($zone['district'], 'East') == 0)
                            $res[] = $zone;
                        $count= count( array_keys( $res ));
                    }
                }
                elseif($_POST['val'] == 'value2'){
                    foreach($response as $zone){
                        if (strcasecmp($zone['district'], 'West') == 0)
                            $res[] = $zone;
                        $count= count( array_keys( $res ));
                    }
                }
                elseif($_POST['val'] == 'value3'){
                    foreach($response as $zone){
                        if (strcasecmp($zone['district'], 'North') == 0)
                            $res[] = $zone;
                        $count= count( array_keys( $res ));
                    }
                }
                elseif($_POST['val'] == 'value4'){
                    foreach($response as $zone){
                        if (strcasecmp($zone['district'], 'South') == 0)
                            $res[] = $zone;
                        $count= count( array_keys( $res ));
                    }
                }
                else{
                    foreach ($response as $zone) {
//                            if (strcasecmp($person1['gender'], 'Female') == 0)
                        $res[] = $zone;
                        $count= count( array_keys( $res ));
                    }
                }

            }
        }
        if($request->isXmlHttpRequest()) {
            return $this->render('delegates/filter.html.twig', array(
                'response' => $res,
                'count' => $count
            ));
        }
    }


}