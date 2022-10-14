<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use App\Controller\Admin\MembreCrudController;
use App\Controller\Admin\ProduitCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            
            IdField::new('id')->hideOnForm(),
            AssociationField::new('produit')->autocomplete(),
            AssociationField::new('membre')->autocomplete(),
            IntegerField::new('quantite'),
            MoneyField::new('montant')->setCurrency('EUR'),
            IntegerField::new('etat'),
            
            DateTimeField::new('createdAt')->setFormat("d/M/Y à H:m:s")->hideOnForm(),

        ];
    }
    public function createEntity(string $entityFqcn)
    {
        $commande= new $entityFqcn;
        $commande->setCreatedAt(new \DateTime);
        return $commande;
    }
    
}
