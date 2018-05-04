<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $repositoryMenu = $this->getDoctrine()->getManager()->getrepository('AppBundle\Entity\MenuItem');
        $menuItems = $repositoryMenu->findAll();
        
        return $this->render('home.html.twig', array(
            'items' => $menuItems
        ));
    }
}
