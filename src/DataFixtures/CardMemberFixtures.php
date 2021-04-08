<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Admin\CardMember;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CardMemberFixtures extends Fixture
{
    public const CARDMEMBER_REFERENCE = 'admin-cardmember';

    public function load(ObjectManager $manager)
    {
        $cardmember = new CardMember();
        $cardmember
            ->setNameSociety('openPixl')
            ->setAdress('adress')
            ->setComplement('complement')
            ->setZipcode('40280')
            ->setCity('saint Pierre du Mont')
            ->setPhoneDesk('07.79.84.50.65')
            ->setPhoneGsm('07.79.84.50.65')
            ->setEmailSociety('contact@openpixl.r')
            ->setSiret('842.542.658.00025')
            ->setApe('7852PF')
            ->setIsRgpd(1)
        ;
        $manager->persist($cardmember);

        $manager->flush();

        // Ajout de l'objet admin aux fixtures
        $this->addReference(self::CARDMEMBER_REFERENCE, $cardmember);
    }
}
