<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Services::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre', 'Titre du service')
                ->setRequired(false),

            TextField::new('icon', 'Icon du service')
                ->setRequired(false)
                ->setHelp('Veuillez vous rendre sur le site fontawesome.com pour choisir une icon et la copier ici. Exemple: fas fa-home'),

            TextField::new('animationWow', 'Animation Wow')
                ->setRequired(false)
                ->setHelp('Veuillez vous rendre sur le site wow.js pour choisir une animation et la copier ici. Exemple: fadeInUp'),

            TextEditorField::new('description', 'Description')
                ->setHelp('Veuillez décrire le service en 150 caractères maximum')
                ->setRequired(false),
        ];
    }

}
