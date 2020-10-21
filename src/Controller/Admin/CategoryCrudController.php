<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureFields(string $pageName): iterable
    {   
      $imageField = ImageField::new('imageFile')
      ->setFormType(VichImageType::class)
      ->setLabel('Image');
      $image = ImageField::new('image')
      ->setBasePath("/uploads/category")
      ->setLabel('Image');
      
      $fields = [
        IntegerField::new('id', 'ID')->onlyOnIndex(),
        TextField::new('name'),
        TextEditorField::new('description'),
         ];

         if($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_DETAIL)
         {
           $fields [] = $image;
         }else{
           $fields [] = $imageField;
         }
         return $fields;

    }

  
        
}
