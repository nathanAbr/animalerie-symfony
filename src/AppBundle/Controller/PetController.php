<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 02/05/18
 * Time: 09:57
 */

namespace AppBundle\Controller;


use AppBundle\Form\PetForm;
use AppBundle\Services\PetService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PetController extends Controller
{

    public function addPetAction(Request $request, PetService $petService){
        $form = $this->createForm(PetForm::class);
        $form->handleRequest($request);

        if($form->isValid() && $form->isSubmitted()){
            $pet = $form->getData();
            $petService->addPet($pet);
            return $this->redirect($request->getUri());
        }

        return $this->render('pet/pet_creation.html.twig', array('form' => $form->createView(),));

    }

    public function showPetsByKindAction(Request $request){

    }

    public function showPetDatails(Request $request){

    }

}