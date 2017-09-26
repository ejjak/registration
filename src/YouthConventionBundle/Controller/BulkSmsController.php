<?php
/**
 * Created by PhpStorm.
 * User: ejjak
 * Date: 15/10/16
 * Time: 1:47 PM
 */

namespace YouthConventionBundle\Controller;


use YouthConventionBundle\Entity\Task2;
use YouthConventionBundle\MvaayoBulk;
use YouthConventionBundle\Entity\Delegates;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BulkSmsController extends Controller
{
//    public function BulkAction()
//    {
//        $response=array('');
//        $em = $this->getDoctrine()->getManager();
//        $registers = $em->getRepository('AppBundle:Register')->findAll();
////        dump($registers);die;
//        foreach ($registers as $val)
//        {
//            if($val instanceof Register)
//                {
//                    $name = $val->getName();
//                    $phone = $val->getPhn();
//
//                     $response[] =array('name'=>$name, 'phone'=>$phone);
//                }
//        }
//        return $this->render('register/bulksms.html.twig', array(
//            'response' => $response
//            )
//        );
//    }

    /**
     * Creates a new Register entity.
     *
     */
    public function BulkAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $registers = $em->getRepository('YouthConventionBundle:Delegates')->findAll();
        $value = array();
//        $registers = $em->getRepository('AppBundle:Register')->findBy(array(),array('name'=>'ASC'));
//        dump($registers);die;
        foreach ($registers as $val)
        {
            if($val instanceof Delegates)
                {
                    $phone = $val->getPhone();
                    array_push($value,$phone);
//                     $response[] =array('name'=>$name, 'phone'=>$phone);
//                $response[] =array($name=>$phone);
//                $flattenArray = array();
//                foreach(new \RecursiveIteratorIterator(new \RecursiveArrayIterator($response)) as $value) {
//                    $flattenArray[] = $value;
//                    $phn = implode(",",$flattenArray);
//                                                          }
//                foreach($response as $key => $value){
//                    if(is_array($value)){
//                        foreach($value as $key1 => $value1){
//                            $res[]=array($key1 => $value1);
//
//                            $flattenArray = array();
//                            foreach(new \RecursiveIteratorIterator(new \RecursiveArrayIterator($res)) as $value) {
//                                $flattenArray[] = $value;
//
//                                $phn = implode(",", $flattenArray);
//                                                          }
//                        }
//                    }
//                }
                }
        }
        $phone = implode(',',$value);
        $tasks = new Task2();
        $form = $this->createForm('YouthConventionBundle\Form\TaskType', $tasks);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Message sent successfully!')
            ;
            // perform some action...
            $mvaayo = new MvaayoBulk();
            $mvaayo->BulkSmsAction($phone, $tasks);
           return $this->redirect($request->getUri());
        }

        return $this->render('delegates/bulksms.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}