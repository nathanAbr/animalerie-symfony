<?php
/**
 * Created by PhpStorm.
 * User: colin
 * Date: 03/05/2018
 * Time: 16:01
 */

namespace AppBundle\Form;

use AppBundle\Entity\IndentDetails;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndentDetailsForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('quantity', NumberType::class)
        ->add('valider', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', IndentDetails::class);
    }

    public function getName()
    {
        return 'app_bundle_indentDetails_form';
    }
}