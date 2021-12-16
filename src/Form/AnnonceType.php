<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', Date::class,[
                'date_widget'=>'single_text',
                'html5'=>true,
            ])
            ->add('ville',  TextType::class, [
                'label'=>'Ville'
            ])
            ->add('rue', TextType::class, [
                'label'=>'Rue/Quartier',
            ])
            ->add('details', TextareaType::class, [
                'label'=>'Détails',
                'attr'=> [
                    'class'=>'detailsAnnonce',
                    'required'=>false
                ]
            ])
            ->add('photo', TextType::class, [
                'attr'=> 'photoAnimal',
                'required'=>false
            ])
            ->add('statut', TextType::class)
            ->add('departement', TextType::class)
            ->add('animal')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
