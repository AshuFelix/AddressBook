<?php

namespace App\Form;

use App\Entity\AddressBook;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressBookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Firstname', TextType::class)
            ->add('Lastname')
            ->add('Street')
            ->add('Streetnumber')
            ->add('Zip')
            ->add('City')
            ->add('Country')
            ->add('Phonenumber')
            ->add('Birthday')
            ->add('Email', EmailType::class)
            ->add('Picture',FileType::class,[
                'data_class' => null,
            ])  //
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AddressBook::class,
        ]);
    }
}
