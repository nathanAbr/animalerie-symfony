<?php

namespace AppBundle\Form;
use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class UserForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('userName', TextType::class)
            ->add('password', TextType::class)
            ->add('adress', TextType::class)
            ->add('valider', SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', User::class);
    }

    public function getName()
    {
        return 'app_bundle_user_form';
    }
}