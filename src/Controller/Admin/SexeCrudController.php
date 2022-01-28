<?php

namespace App\Controller\Admin;

use App\Entity\Sexe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SexeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sexe::class;
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
