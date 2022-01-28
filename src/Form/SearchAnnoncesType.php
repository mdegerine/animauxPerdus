<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Departement;
use App\Entity\Statut;
use App\Entity\TypeAnimal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchAnnoncesType extends AbstractType
{const CHOIX1 = 'choix 1';
    const CHOIX2 = 'choix 2';
    const CHOIX3 = 'choix 3';
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('statut', EntityType::class, [
                'class'=>Statut::class,
                'choice_label'=>'libelle',
                'label'=>'Statut : ',
            ])

            ->add('departement', EntityType::class, [
                'class'=>Departement::class,
                'choice_label'=>'libelle',
                'label'=>'Département : ',
            ])

            ->add('typeAnimal', EntityType::class, [
                'class'=>TypeAnimal::class,
                'choice_label'=>'libelle',
                'label'=>'Type d animal ',
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
