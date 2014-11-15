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
        return $this->render('PositiveWebsiteBundle:Default:index.html.twig');
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
}
