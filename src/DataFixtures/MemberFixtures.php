<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Admin\Member;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MemberFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $member = new Member();
        $password = $this->encoder->encodePassword($member, 'Corwin_40');
        $member
            ->setUsername('Administrateur')
            ->setEmail('contact@openpixl.fr')
            ->setPassword($password)
            ->setFirstName('Dév')
            ->setLastName('OpenPixel')
            ->setRoles(['ROLE_SUPER_ADMIN'])
        ;
        $manager->persist($member);

        $manager->flush();
    }
}
