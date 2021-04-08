<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Webapp\Section;

class SectionFixtures extends Fixture
{
    public const SECTION_REFERENCE = 'section-page';

    public function load(ObjectManager $manager)
    {
        $section = new Section();
        $section
            ->setTitle('First section')
            ->setSlug('first-section')
        ;
        $manager->persist($section);
        $manager->flush();

        // Ajout de l'objet admin aux fixtures
        $this->addReference(self::SECTION_REFERENCE, $section);
    }

}
