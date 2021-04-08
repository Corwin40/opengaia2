<?php

namespace App\Form\Admin;

use App\Entity\Admin\cardMember;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class cardMemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameSociety')
            ->add('adress')
            ->add('complement')
            ->add('zipcode')
            ->add('city')
            ->add('phoneDesk')
            ->add('phoneGsm')
            ->add('emailSociety')
            ->add('siret')
            ->add('ape')
            ->add('isRgpd')
            ->add('createAt')
            ->add('updateAt')
            ->add('Product')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => cardMember::class,
        ]);
    }
}
