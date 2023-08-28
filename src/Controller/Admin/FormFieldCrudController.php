<?php

namespace App\Controller\Admin;

use App\Entity\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FormFieldCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FormField::class;
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
