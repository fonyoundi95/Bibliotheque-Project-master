<?php

namespace App\Controller\Admin;

use App\Entity\Books;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BooksCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Books::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       $imageField = ImageField::new('imageFile')
       ->setFormType(VichImageType::class)
       ->setLabel('Image du livre');
       $image = ImageField::new('image ')
       ->setBasePath("/uploads/livre")
       ->setLabel('Image du livre');
        $imageField1 = ImageField::new('fileAttach')->setFormType(VichFileType::class)
        ->setLabel('fichier PDF');
        $image1 = ImageField::new('livre')
        ->setBasePath("/uploads/fichier")
        ->setLabel('fichier PDF');
        
       $fields = [
           IntegerField::new('id', 'ID')->onlyOnIndex(),
           TextField::new('Title')->setLabel('Titre du livre'),
           IdField::new('numberOfPage')->setLabel(' Nombre de page'),
           TextField::new('publishingHouse')->setLabel('Maison de publication'),
           TextEditorField::new('Resume'),
           AssociationField::new('category')->onlyOnForms(),
           AssociationField::new('author')->onlyOnForms(),

        ];

        if($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_DETAIL)
        {
            $fields[] = $image;
            $fields[] = $image1;
          
        }else{
            $fields[] = $imageField;
            $fields[] = $imageField1;
        }

        return $fields;
    }


    
}
