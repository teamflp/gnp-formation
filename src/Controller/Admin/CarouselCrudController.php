<?php

namespace App\Controller\Admin;

use App\Entity\Carousel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\File;

class CarouselCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Carousel::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm()
                ->hideOnIndex(),

            TextField::new('titre', 'Titre')
                //->setColumns('col-md-6')
                ->setMaxLength(50)
                ->setHelp('Le titre doit être court et précis avec un maximum de 50 caractères')
                ->setRequired(false),

            TextField::new('sousTitre', 'Sous-titre')
                //->setColumns('col-md-6')
                ->setMaxLength(50)
                ->setHelp('Le sous-titre doit être court et précis avec un maximum de 50 caractères')
                ->setRequired(false),

            ImageField::new('image', 'Image')
                //->setColumns('col-md-5')
                ->setHelp('L\'image doit être au format .jpg, .jpeg, ou .webp')
                ->setBasePath('/uploads/carousel/')
                ->setUploadDir('public/uploads/carousel/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

            TextField::new('btnInfo', 'Bouton info')
                //->setColumns('col-md-3')
                ->setRequired(false),

            TextField::new('btnInscription', 'Bouton inscription')
                //->setColumns('col-md-3')
                ->setRequired(false),

            TextEditorField::new('description', 'Description')
                ->setRequired(false),
        ];
    }


}
