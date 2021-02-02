<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Webapp\Page;

class PageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $page = new Page();
        $page
            ->setTitle('Accueil')
            ->setSlug('acccueil')
            ->setState('publish')
            ->setAuthor(1)
            ->setPosition(1)
            ->setCreateAt()
            ->setUpdateAt()
        ;
        $manager->persist($page);

        $manager->flush();
    }
}
