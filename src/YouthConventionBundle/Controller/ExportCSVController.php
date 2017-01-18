<?php
/**
 * Created by PhpStorm.
 * User: Demi
 * Date: 17-Jan-17
 * Time: 10:31 AM
 */
namespace YouthConventionBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExportCSVController extends Controller
{

 public function ExportCSVAction()
 {
     $em=$this->getDoctrine()->getRepository('YouthConventionBundle:Delegates');
     $query = $em->createQueryBuilder('s');
     $query->orderBy('s.id','DESC');

     $data = $query->getQuery()->getResult(); $filename = "export_".date("Y_m_d_His").".csv";

     $response = $this->render('delegates/exportcsv.html.twig', array('data' => $data));

     $response->setStatusCode(200);
     $response->headers->set('Content-Type', 'text/csv');
     $response->headers->set('Content-Description', 'Submissions Export');
     $response->headers->set('Content-Disposition', 'attachment; filename='.$filename);
     $response->headers->set('Content-Transfer-Encoding', 'binary');
     $response->headers->set('Pragma', 'no-cache');
     $response->headers->set('Expires', '0');

     return $response;

 }

}