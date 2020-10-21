<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AuthorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Author::class;
    }


    public function configureFields(string $pageName): iterable
    {
        
          
        $imageFiealds = ImageField::new('uploadImage')->setFormType(VichImageType::class)->setLabel('Image');
        $image = ImageField::new('image')->setBasePath("/uploads/author")->setLabel('Image');
      
        $fields =[

            IntegerField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('firstName'),
            TextField::new('secondName'),
            TextEditorField::new('bibliography'),
        ];

        if ($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_DETAIL)
        {
            $fields[] = $image;
            
        }
        else
        {
            $fields[] = $imageFiealds;
        }

      return $fields;
    }
    
    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(CRUD::PAGE_INDEX, 'detail');
    }
    
}
