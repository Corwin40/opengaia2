<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Webapp\Page;

class PageFixtures extends Fixture
{
    public const PAGE_REFERENCE = 'admin-page';

    public function load(ObjectManager $manager)
    {
        $page = new Page();
        $page
            ->setTitle('Accueil')
            ->setSlug('acccueil')
            ->setState('publish')
            ->setIsMenu(1)
            ->setAuthor($this->getReference(MemberFixtures::MEMBER_REFERENCE))
            ->setPosition(1)
            ->setIsPublish(1)
            ->addSection($this->getReference(SectionFixtures::SECTION_REFERENCE))
        ;
        $manager->persist($page);
        $manager->flush();

        // Ajout de l'objet admin aux fixtures
        $this->addReference(self::PAGE_REFERENCE, $page);
    }

    public function getDependencies()
    {
        return array(
            MemberFixtures::class,
            PageFixtures::class
        );
    }
}
