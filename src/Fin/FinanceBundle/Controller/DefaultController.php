<?php

namespace Fin\FinanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FinFinanceBundle:Default:index.html.twig', array('name' => $name));
    }
}
