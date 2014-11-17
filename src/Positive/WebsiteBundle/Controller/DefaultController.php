<?php

namespace Positive\WebsiteBundle\Controller;

use Positive\WebsiteBundle\Form\ContactType ;
use Positive\WebsiteBundle\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PositiveWebsiteBundle:Default:index.html.twig');
    }
    public function aboutAction()
    {
        return $this->render('PositiveWebsiteBundle:Default:about.html.twig');
    }
    public function videoAction()
    {
        return $this->render('PositiveWebsiteBundle:Default:index.html.twig');
    }
    public function audioAction()
    {
        return $this->render('PositiveWebsiteBundle:Default:index.html.twig');
    }
    public function gigsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $future = $em->getRepository('PositiveWebsiteBundle:Concert')->getFutureConcerts();
        $past = $em->getRepository('PositiveWebsiteBundle:Concert')->getPastConcerts();
        return $this->render('PositiveWebsiteBundle:Concert:gigs.html.twig', array(
            'future' => $future,
            'past' => $past,
        ));
    }
    public function goodiesAction()
    {
        return $this->render('PositiveWebsiteBundle:Default:index.html.twig');
    }
    public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);

        $form->bind($request);

        if ($form->isValid()) {
            var_dump("Aaaaaaaa");
            die();
        }

        return $this->render('PositiveWebsiteBundle:Default:contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function subscribeAction()
    {

    }

    public function concertPageAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $concert = $em->getRepository('PositiveWebsiteBundle:Concert')->findOneBySlug($slug);

        if (!$concert) {
            throw $this->createNotFoundException('Concert not found in this universe');
        }

        return $this->render('PositiveWebsiteBundle:Concert:event.html.twig', array(
            'concert' => $concert,
        ));
    }
}
