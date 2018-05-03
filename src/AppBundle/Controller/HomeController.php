<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\MenuItem;
/**
 * Description of HomeController
 *
 * @author ronanlaplaud
 */
class HomeController extends Controller{
    public function homeAction() {
        
        $repositoryMenu = $this->getDoctrine()->getManager()->getrepository('AppBundle\Entity\MenuItem');
        $menuItems = $repositoryMenu->findAll();
        
        return $this->render('home.html.twig', array(
            'items' => $menuItems
        ));
    }
}
