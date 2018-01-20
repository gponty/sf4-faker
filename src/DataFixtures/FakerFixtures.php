<?php
// src/DataFixtures/FakerFixtures.php
namespace App\DataFixtures;

use App\Entity\Personne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class FakerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // on créé 10 personnes
        for ($i = 0; $i < 10; $i++) {
            $personne = new Personne();
            $personne->setNom($faker->name);
            $personne->setAdresse($faker->streetAddress);
            $personne->setVille($faker->city);
            $personne->setCodePostal($faker->postcode);
            $personne->setDescription($faker->text);
            $personne->setEmail($faker->email);
            $manager->persist($personne);
        }

        $manager->flush();
    }
}