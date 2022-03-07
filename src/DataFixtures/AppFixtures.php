<?php
namespace App\DataFixtures;
use Faker;
use App\Entity\User;
use App\Entity\Vinyl;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager):void
    {    
        $faker = Faker\Factory::create('fr_FR');
        //$categorieRepository = new CategorieRepository();
        // $cat = new Categorie;
         for ($i=80; $i < 91 ; $i++) { 
         $vinyl = new Vinyl();  
         $vinyl->setMp3("vinyl".$i);
         $vinyl->setTitle("titre du vinyl".$i);
         $vinyl->setArtiste($faker->name());
         $vinyl->setAnnee(mt_rand(1982,2002));
         $vinyl->setDescription("description du vinyl".$i);
         $vinyl->setPrice(14.99);
         $vinyl->setQte(mt_rand(1,20));
         $vinyl->setCreateAt(new \DateTimeImmutable('now'));
        //$vinyl->addCategorie($cat);
         $manager->persist($vinyl);
        }
         $manager->flush();
         // generation de 20 utilisateurs avec Faker
          
        $i= 1;
        while ($i <= 20) {   
            $user = new User();
            $user->setLastname($faker->LastName());
            $user->setFirstname($faker->FirstName());
            $user->setAdresse($faker->address());
            $user->setEmail($faker->email());
            $user->setTel($faker->phoneNumber());
            $user->setRoles(["ROLE_USER"]);
            $user->setPassword($faker->sha256());
            $manager->persist($user);

   $i++; 


    }$manager->flush();
} 

}