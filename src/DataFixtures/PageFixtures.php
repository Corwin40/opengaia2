<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
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
            ->setIsMenu(0)
            ->setAuthor($this->getReference(MemberFixtures::MEMBER_REFERENCE))
            ->setPosition(1)
            ->setCreateAt()
            ->setUpdateAt()
        ;
        $manager->persist($page);

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            MemberFixtures::class,
        );
    }
}
