<?php
/**
 * Created by PhpStorm.
 * User: Demi
 * Date: 16-Jan-17
 * Time: 11:12 AM
 */
namespace YouthConventionBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use YouthConventionBundle\Entity\Delegates;

class SearchListController extends Controller
{
    public function angular_searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $val = $em->getRepository('YouthConventionBundle:Delegates')->findAll();

        foreach( $val as $entity)
        {
            $names[] = $entity->getName();
            if($entity instanceof Delegates)
            {
                $id = $entity->getId();
                $name = $entity->getName();
                $lastname = $entity->getLastname();
                $gender = $entity->getGender();
                $phone = $entity->getPhone();
                $church = $entity->getChurch();
                $district = $entity->getDistrict();

                $data[]=array(
                    'id'=> $id,
                    'name'=>$name,
                    'lastname'=>$lastname,
                    'gender'=>$gender,
                    'phone'=>$phone,
                    'church'=>$church,
                    'district'=>$district
                );

            }
        }

        $response = new JsonResponse();
        $response->setData($data);
        return $response;
    }

    public function searchAction (Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $delegates = $em->getRepository('YouthConventionBundle:Delegates')->findAll();
        return $this->render('delegates/data.html.twig', array(
            'delegates' => $delegates,

        ));

    }

}