<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Admin\Parameter;

class ParameterFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $parameter = new Parameter();
        $parameter
            ->setNameSite('OpenGaia')
            ->setTitleSite('OpenGaia')
            ->setIsOnline(0)
            ->setDescription('Application de gestion')
            ;
        $manager->persist($parameter);

        $manager->flush();
    }
}
