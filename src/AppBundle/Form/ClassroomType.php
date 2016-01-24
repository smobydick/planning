<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassroomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', 'text', array('label' => 'Nom de la salle :'))
        ->add('save', 'submit', array('label' => 'button.create', 'translation_domain' => 'forms'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Classroom',
        ));
    }

    public function getName()
    {
        return 'app_classroom';
    }
}
