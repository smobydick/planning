<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubjectType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', 'text', array('label' => 'Nom matière'))

        ->add('room', 'text', array('label' => 'Salle/Bâtiment'))
        ->add('teacher', 'text', array('label' => 'Nom du professeur (séparer par une virgule si plusieurs)'))
        ->add('save', 'submit', array('label' => 'Créer'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Subject',
        ));
    }

    public function getName()
   {

   }
}
