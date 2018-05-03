<?php
/**
 * Created by PhpStorm.
 * User: colin
 * Date: 02/05/2018
 * Time: 13:19
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Indent;
use AppBundle\Entity\User;
use AppBundle\Service\IndentService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndentController extends Controller
{

    public function createIndentAction(IndentService $indentService)

    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(['id'=>6]);
        $indent = $indentService->getIndent($user);
        return $this->render('indent/indent.html.twig', ['indent'=>$indent,'user'=>$user]);
    }


}