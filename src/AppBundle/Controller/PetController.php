<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 02/05/18
 * Time: 09:57
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Pet;
use AppBundle\Entity\Picture;
use AppBundle\Form\PetForm;
use AppBundle\Services\FileUploaderService;
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

    public function addPetAction(Request $request, FileUploaderService $fileUploader){

        $form = $this->createForm(PetForm::class);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()) {
                $pet = new Pet();
                foreach($form->get('pictures') as $picture){
                    $p = new Picture();
                    $p->setDescription($picture->get('description'));
                    $p->setUrl($picture->get('url'));
                    $pet->addPicture($p);
                }
                foreach($pet->getPictures() as $picture){
                    $fileUploader->upload($picture);
                }
                $pet->setLabel($form->get('label'));
                $pet->setQuantity($form->get('quantity'));
                $pet->setParent($form->get('parent'));
                $pet->setPrice($form->get('price'));
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