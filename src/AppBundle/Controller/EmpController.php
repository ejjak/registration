<?php
/**
 * Created by PhpStorm.
 * User: Demi
 * Date: 13-Oct-16
 * Time: 2:22 PM
 */
namespace AppBundle\Controller;
use AppBundle\Entity\Register;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EmpController extends Controller
{
    public function emp_angularAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $val = $em->getRepository('AppBundle:Register')->findAll();
//        createQueryBuilder('c')
//            ->orderBy('c.name', 'ASC')
//            ->getQuery()
//            ->getResult();

        foreach ($val as $entity)
        {
            $names[] = $entity->getName();
            if($entity instanceof Register)
            {
                $id = $entity->getId();
                $name = $entity->getName();
                $email = $entity->getEmail();
                $phone = $entity->getPhn();
                $gender = $entity->getGender();
                $address = $entity->getAddress();
                $church = $entity->getChurch();

            $data[] = array('id'=> $id, 'name'=>$name, 'email'=>$email, 'phone'=>$phone,'gender'=>$gender, 'address'=>$address, 'church'=>$church);
            }
        }

        $response = new JsonResponse();
        $response->setData($data);
        return $response;

    }
    public function angularAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $registers = $em->getRepository('AppBundle:Register')->findAll();
        return $this->render('register/data.html.twig', array(
            'registers' => $registers,

        ));
    }
}