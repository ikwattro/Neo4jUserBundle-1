<?php
// UserBundle/Form/Type/UserType.php
namespace UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('firstName', 'text', ['label'=>'First Name'])
                ->add('lastName', 'text', ['label'=>'Last Name'])
                ->add('birthday', 'birthday', ['label'=>'Date of Birth'])
                ->add('gender', 'choice', array(
                        'choices'  => array('m' => 'Male', 'f' => 'Female'),
                        'required' => false,
                    ))
                ->add('hiveName', 'text', ['label'=>'Choose HiveName (if no HiveName is chosen an ID is generated. Can be chosen later'])       
                ;
    }
    
    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'user_registration';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User'
        ));
    }
}