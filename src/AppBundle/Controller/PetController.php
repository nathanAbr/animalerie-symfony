<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 02/05/18
 * Time: 09:57
 */

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use AppBundle\Entity\Pet;
use AppBundle\Form\PetForm;
use AppBundle\Services\PetService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PetController extends Controller
{
    private $petService;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }

    public function addPetAction(Request $request){
        $form = $this->createForm(PetForm::class);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()) {
                $pet = $form->getData();
                $this->petService->addPet($pet);
                return $this->redirect($request->getUri());
            }
        }

        return $this->render('pet/pet_creation.html.twig', array('form' => $form->createView(),));

    }

    public function showPetsByKindAction($id = null, Request $request){
        $pets = $this->petService->getPetsByKindParent($id);
        $parent = $this->petService->getPetDetails($id);
        return $this->render('pet/pets_view.html.twig', array('pets' => $pets, 'parent' => $parent));
    }

    public function showPetDetailsAction($id, Request $request){
        $pet = $this->petService->getPetDetails($id);
        return $this->render('pet/pet_details.html.twig', array('pet' => $pet));
    }

}