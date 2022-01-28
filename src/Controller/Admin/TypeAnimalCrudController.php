<?php

namespace App\Controller\Admin;

use App\Entity\TypeAnimal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeAnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeAnimal::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
