<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Subject;
use AppBundle\Form\SubjectType;

class SubjectController extends Controller
{

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $subjects = $em->getRepository('AppBundle:Subject')->findAll();
        
        return $this->render('AppBundle:Admin/Subject:index.html.twig', array(
            'subjects' =>$subjects
        ));
    }

    public function newAction(Request $request)
    {
        // replace this example code with whatever you need
        $subject = new Subject();

        $form = $this->createForm(new SubjectType(), $subject);

        $form->handleRequest($request);

        if ($form->isValid())
        {   //dump($subject);die;
            $em = $this->getDoctrine()->getManager();
            $em->persist($subject);
            $em->flush();
        }

        return $this->render('AppBundle:Admin/Subject:new.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}
