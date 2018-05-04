<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 03/05/18
 * Time: 09:16
 */

namespace AppBundle\Form;


use AppBundle\Entity\Object;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjectForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('label', TextType::class)
            ->add('price', MoneyType::class)
            ->add('quantity', NumberType::class)
            ->add('picture', TextType::class)
            ->add('type', ObjectTypeForm::class)
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Object::class);
    }

    public function getName()
    {
        return 'app_bundle_object_form';
    }
}