<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Identification;
use App\Entity\Poils;
use App\Entity\Sexe;
use App\Entity\Taille;
use App\Entity\TypeAnimal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
            'data_class' => Animal::class,
        ]);
    }
}
