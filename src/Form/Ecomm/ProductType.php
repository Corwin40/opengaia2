<?php

namespace App\Form\Ecomm;

use App\Entity\Admin\Member;
use App\Entity\Ecomm\FamProduct;
use App\Entity\Ecomm\Product;
use App\Entity\Ecomm\typeProduct;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('Description')
            ->add('producer', EntityType::class, [
                'class' => Member::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('m')
                        ->orderBy('m.username', 'ASC')
                        ->where("m.typeMember = 'producers'")
                        ;
                },
                'choice_label' => 'username'
            ])
            ->add('type', EntityType::class, [
                'class' => typeProduct::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('tp')
                        ->orderBy('tp.name', 'ASC')
                        ;
                },
                'choice_label' => 'name'
            ])
            ->add('family', EntityType::class, [
                'class' => famProduct::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('fp')
                        ->orderBy('fp.name', 'ASC')
                        ;
                },
                'choice_label' => 'name'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
            'translation_domain' => 'forms'
        ]);
    }
}
