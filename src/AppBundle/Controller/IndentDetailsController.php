<?php
/**
 * Created by PhpStorm.
 * User: colin
 * Date: 03/05/2018
 * Time: 14:35
 */

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\IndentDetailsForm;
use AppBundle\Service\IndentDetailsService;
use Symfony\Component\HttpFoundation\Request;

class IndentDetailsController extends Controller
{

    public function addDetailsAction(Request $request, IndentDetailsService $indentDetailsService)
    {
        $form = $this->createForm(IndentDetailsForm::class);
        $form->handleRequest($request);


        if($form->isValid() && $form->isSubmitted()){
            $indentDetails = $form->getData();
            $indentDetailsService->add($indentDetails);
            return $this->redirect($request->getUri());
        }

        return $this->render('indent/indentDetails.html.twig', array('form' => $form->createView()));
    }

}