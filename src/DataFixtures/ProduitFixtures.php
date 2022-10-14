<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker= \Faker\Factory::create('fr_FR');

        for($i = 0; $i < mt_rand(8,10); $i++)
        {
            $produit = new Produit;
            $produit->setTitre($faker->sentence(3))
                    ->setDescription($faker->sentence(3))
                    ->setCouleur($faker->sentence(3))
                    ->setTaille($faker->sentence(3))
                    ->setPhoto($faker->imageUrl)
                    ->setCollection($faker->sentence(3))
                    ->setPrix($faker->randomFloat(2, 10, 100))
                    ->setStock($faker->randomFloat(2, 10, 100))
                    ->setCreatedAt(new \DateTime());

               
            
       $manager->persist($produit);
    }

        $manager->flush();
    }
}
