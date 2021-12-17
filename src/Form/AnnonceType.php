<?php

namespace App\Form;



use App\Entity\Animal;
use App\Entity\Annonce;
use App\Entity\Departement;
use App\Entity\Statut;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('statut', EntityType::class,[
                'class'=>statut::class,
                'choice_label'=>'libelle'
            ])



            ->add('departement', EntityType::class, [
                'class'=>departement::class,
                'choice_label'=>'libelle'
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



        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
