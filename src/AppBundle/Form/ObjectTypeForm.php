<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 03/05/18
 * Time: 09:59
 */

namespace AppBundle\Form;


use AppBundle\Entity\ObjectType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjectTypeForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('label', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', ObjectType::class);
    }

    public function getName()
    {
        return 'app_bundle_object_type_form';
    }

}