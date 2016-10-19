<?php
/**
 * Created by PhpStorm.
 * User: ejjak
 * Date: 15/10/16
 * Time: 1:47 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Register;
use AppBundle\Entity\Task;
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
        $em = $this->getDoctrine()->getManager();
        $registers = $em->getRepository('AppBundle:Register')->findAll();
        $value = array();
//        $registers = $em->getRepository('AppBundle:Register')->findBy(array(),array('name'=>'ASC'));
//        dump($registers);die;
        foreach ($registers as $val)
        {
            if($val instanceof Register)
                {
                    $phone = $val->getPhn();
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
        $tasks = new Task();
        $form = $this->createForm('AppBundle\Form\TaskType', $tasks);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Message set successfully!')
            ;
            // perform some action...
            $mvaayo = new MvaayoBulk();
            $mvaayo->BulkSmsAction($phone, $tasks);
//            return $this->redirectToRoute('task_success');
        }

        return $this->render('register/bulksms.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}