<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 02/05/18
 * Time: 09:41
 */

namespace AppBundle\Form;


use AppBundle\Entity\Pet;
use AppBundle\Services\PetService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PetForm extends AbstractType
{
    private $petService;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('label', TextType::class)
            ->add('price', MoneyType::class, array(
                'required' => false
            ))
            ->add('quantity', NumberType::class,array(
                'required' => false
            ))
            ->add('parent', ChoiceType::class, array(
                'choices' => $this->petService->getPetsByKind(),
                'choice_label' => 'label',
                'required' => false,
            ))
            ->add('pictures', PictureForm::class, array(
                'required' => false
            ))
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Pet::class);
    }

    public function getName()
    {
        return 'app_bundle_pet_form';
    }
}