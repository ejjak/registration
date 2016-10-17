<?php
/**
 * Created by PhpStorm.
 * User: ejjak
 * Date: 15/10/16
 * Time: 1:47 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Register;
use AppBundle\MvaayoBulk;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BulkController extends Controller
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
        $response=array('');
        $em = $this->getDoctrine()->getManager();
        $registers = $em->getRepository('AppBundle:Register')->findAll();
//        $registers = $em->getRepository('AppBundle:Register')->findBy(array(),array('name'=>'ASC'));
//        dump($registers);die;
        foreach ($registers as $val)
        {
            if($val instanceof Register)
                {
                    $name = $val->getName();
                    $phone = $val->getPhn();

//                     $response[] =array('name'=>$name, 'phone'=>$phone);
                $response[] =array($name=>$phone);
                foreach($response as $key => $value){
                    if(is_array($value)){
                        foreach($value as $key1 => $value1){
                            $res[]=array($key1 => $value1);

                            $flattenArray = array();
                            foreach(new \RecursiveIteratorIterator(new \RecursiveArrayIterator($res)) as $value) {
                                $flattenArray[] = $value;
                            }
                        }
                    }
                }
                }
        }
        $form = $this->createForm('AppBundle\Form\SendSmsType', $flattenArray);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action...
            $mvaayo = new MvaayoBulk();
            $mvaayo->BulkSmsAction($flattenArray);
            return $this->redirectToRoute('task_success');
        }

        return $this->render('register/bulksms.html.twig', array(
            'register' => $flattenArray,
            'form' => $form->createView(),
        ));
    }

}