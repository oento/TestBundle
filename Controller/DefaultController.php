<?php

namespace Oento\Bundle\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OentoTestBundle:Default:index.html.twig', array('name' => $name));
    }
}
