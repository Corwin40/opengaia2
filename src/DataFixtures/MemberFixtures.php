<?php

namespace App\DataFixtures;

use App\Entity\Webapp\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Admin\Member;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MemberFixtures extends Fixture
{
    private $encoder;

    public const MEMBER_REFERENCE = 'admin-member';

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
            ->setTypeMember('admin')
            ->setCardMember($this->getReference(CardMemberFixtures::CARDMEMBER_REFERENCE))
        ;
        $manager->persist($member);

        $manager->flush();

        // Ajout de l'objet admin aux fixtures
        $this->addReference(self::MEMBER_REFERENCE, $member);
    }

    public function getDependencies()
    {
        return array(
            CardMemberFixtures::class,
        );
    }
}
