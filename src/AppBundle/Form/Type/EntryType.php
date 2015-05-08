<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of EntryType
 *
 * @author mconrad
 */
class EntryType extends AbstractType{
    
    //TODO: add contraints to entity
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('id')
            ->add('type')
            ->add('title')
            ->add('content')
            ->add('buttontext')
            ->add('icon')
            ->add('route')
            ->add('imagepath')
            ->add('imageDescription')
            ->add('subEntries','collection',array(
                'type' => new SubEntryType(),
                'allow_add'    => true, //so we can dynamically add fields, otherwise exception
                'by_reference' => false, //handling via doctrine easier
                'allow_delete' => true, //dynamic deletion otherwise not allowed
                ))
            //->add('dueDate', null, array('widget' => 'single_text'))
            // otherwise every entry must be mapped
            //>add('dueDate', null, array('mapped' => false))
            ->add('save', 'submit');
    }
    
    /*
     * Used if defined as a service so that it can be referenced/loaded like this
     */
    public function getName()
    {
        return 'entry';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) 
    {
        $resolver->setDefaults(array(
        'data_class' => 'AppBundle\Entity\Entry',
        ));
    }
    
}
