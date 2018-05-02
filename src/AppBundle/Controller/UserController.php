<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Service\UserService;
use AppBundle\Form\UserForm;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function addAction(Request $request, UserService $userService)
    {
        $form = $this->createForm(UserForm::class);
        $form->handleRequest($request);

        if($form->isValid() && $form->isSubmitted()){
            $user = $form->getData();
            $userService->add($user);
            return $this->redirect($request->getUri());
        }

        return $this->render('default/create_user.html.twig', array('form' => $form->createView()));
    }

}