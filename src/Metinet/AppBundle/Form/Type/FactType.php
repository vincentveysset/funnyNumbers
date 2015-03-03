<?php
/**
 * Created by PhpStorm.
 * User: user01
 * Date: 03/03/15
 * Time: 17:24
 */

namespace Metinet\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FactType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('gender_code', new GenderType(), array(
            'empty_value' => 'Choose a gender',
        ));
    }

    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'gender';
    }
} 