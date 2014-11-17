<?php

namespace Positive\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
    public function contactAction()
    {
        return $this->render('PositiveWebsiteBundle:Default:index.html.twig');
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
