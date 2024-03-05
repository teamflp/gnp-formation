<?php

namespace App\Controller\Admin;

use App\Entity\About;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AboutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return About::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),

            TextField::new('titre')
                ->setRequired(false),

            TextField::new('sousTitre', 'Sous titre')
                ->setRequired(false),

            ImageField::new('image', 'Image')
                //->setColumns('col-md-5')
                ->setHelp('L\'image doit être au format .jpg, .jpeg, ou .webp')
                ->setBasePath('/uploads/img/')
                ->setUploadDir('public/uploads/img/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

            TextEditorField::new('description')
                ->setRequired(false),
        ];
    }

}
