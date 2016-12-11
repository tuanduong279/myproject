<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ProductAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', 'text')
        		   ->add('description','textarea')
        		   ->add('price','text')
        		   // ->add('category', 'entity', array(
             //              'class' 			=> 'AppBundle\Entity\Category',
             //              'choice_label' 	=> 'name',
             //              // 'required'  		=> true,
             //              // 'query_builder' 	=> function(EntityRepository $er) {
             //              //                       return $er->createQueryBuilder('s')
             //                                    // ->where('s.owner = :id')
             //                                    // ->setParameter('id',$this->user->getId())
             //                                    // ->orderBy('s.name','ASC');},
             //            ))
                    ->add('subcategory', 'entity', array(
                          'class' 			=> 'AppBundle\Entity\Subcategory',
                          'choice_label' 	=> 'name',
                        ))	
                   ->add('is_active', CheckboxType::class, array(
                        'label'    => 'Active this Category ?',
                        'required' => false,
                        ));
    	;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
          $listMapper->addIdentifier('name')
          			 ->add('description')
          			// ->add('category.name')
          			 ->add('subcategory.name')
          			 ->add('price')
          			 ->add('is_active')
          			 ;
    }
}