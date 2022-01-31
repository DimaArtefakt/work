<?php

namespace App\Controller\Admin;

use App\Entity\ItemCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class ItemCollectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ItemCollection::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('name'),
            TextEditorField::new('description'),
            AssociationField::new('topic'),
            AssociationField::new('user'),
            AssociationField::new('items'),
        ];
    }

}
