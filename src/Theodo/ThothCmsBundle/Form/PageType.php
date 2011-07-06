<?php

namespace Theodo\ThothCmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Theodo\ThothCmsBundle\Entity\Page;
use Theodo\ThothCmsBundle\Repository\PageRepository;

class PageType extends AbstractType
{   
    /**
     * Form builder
     * 
     * @author Vincent Guillon <vincentg@theodo.fr>
     * @since 2011-06-21
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        // Set inputs
        $builder->add('parent_id', 'hidden', array('required' => true));
        $builder->add('name', 'text', array('required' => true));
        $builder->add('slug', 'text', array('required' => true));
        $builder->add('breadcrumb', 'text', array('required' => false));
        $builder->add('description', 'text', array('required' => false));
        $builder->add('content', 'textarea', array('required' => true));
        $builder->add('status', 'choice', array(
            'choices'   => PageRepository::getAvailableStatus(),
            'required'  => true
        ));
        $builder->add('content_type', 'choice', array(
            'choices'   => PageRepository::getAvailableContentTypes(),
            'required'  => true
        ));
        $builder->add('cacheable', 'checkbox', array('required' => false));
        
        // Display published_at date only in edition
        if (null !== $options['data']->getId())
        {
            $builder->add('published_at', 'date', array('required' => false));
        }
    }
   
    /**
     * Form default options
     * 
     * @author Vincent Guillon <vincentg@theodo.fr>
     * @since 2011-06-21
     */
    public function getDefaultOptions(array $options)
    {
        return array(
           'data_class' => 'Theodo\ThothCmsBundle\Entity\Page',
        );
    }
}
