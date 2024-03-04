<?php

namespace App\Controller\Admin;

use App\Entity\AboutCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AboutCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AboutCategory::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('category', 'Catégorie')
                ->setRequired(false),
        ];
    }

}
