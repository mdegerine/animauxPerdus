<?php

namespace App\Form;




use App\Entity\Animal;
use App\Entity\Annonce;
use App\Entity\Departement;
use App\Entity\Identification;
use App\Entity\Poils;
use App\Entity\Sexe;
use App\Entity\Statut;
use App\Entity\Taille;
use App\Entity\TypeAnimal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
                'choice_label'=>'libelle',
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

            ->add('prenom', TextType::class, [
                'label'=>'Prénom de l animal'
            ])
            ->add('sexe', EntityType::class, [
                'class'=>sexe::class,
                'choice_label'=>'libelle'
            ])
            ->add('taille', EntityType::class, [
                'class'=>taille::class,
                'choice_label'=>'libelle'
            ])
            ->add('identification', EntityType::class, [
                'class'=>identification::class,
                'choice_label'=>'libelle'
            ])
            ->add('poils', EntityType::class, [
                'class'=>poils::class,
                'choice_label'=>'libelle'
            ])
            ->add('typeAnimal', EntityType::class, [
                'class'=>typeAnimal::class,
                'choice_label'=>'libelle'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
