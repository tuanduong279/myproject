<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
use AppBundle\Entity\ProductRespository;
use AppBundle\Entity\ProductTranslation;
use Doctrine\ORM\EntityRepository;

class ClientController extends Controller
{
    /**
     * @Route("/homepage", name ="list_product")
     */
    public function indexAction(Request $request)
    {
       $repository = $this->getDoctrine()->getRepository('AppBundle:Product');
       $products = $repository->findAll();

       $repository = $this->getDoctrine()->getRepository('AppBundle:Category');
       $categories =  $repository->findAll();

       $repository = $this->getDoctrine()->getRepository('AppBundle:SubCategory');
       $subcategories =  $repository->findAll();
        return $this->render('frontend/index.html.twig',
            array('products' => $products,
                  'categories' => $categories,
                  'subcategories' => $subcategories  )
        );  
        
    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function showAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Product');
        $product = $repository->findOneById($id);
        $repository = $this->getDoctrine()->getRepository('AppBundle:Category');
        $categories =  $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('AppBundle:SubCategory');
        $subcategories =  $repository->findAll();
         return $this->render('frontend/product.html.twig',
            array('product' => $product,
             'categories' => $categories,
             'subcategories' => $subcategories   )
        );  
    }

    /**
     * @Route("category/{id}", name="category_show")
     */
    public function showCategoryAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Category');
        $categories =  $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('AppBundle:Product');
        $products = $repository->findAll();

        for($i =0; $i< count($products); $i++)
        {
            if($products[$i]->getSubcategory()->getCategory()->getId() == $id)
            {
                $result[] = $products[$i];
            }
        }
       
        $repository = $this->getDoctrine()->getRepository('AppBundle:SubCategory');
        $subcategories =  $repository->findAll();
        
        return $this->render('frontend/category.html.twig',
            array('products' => $result,
             'categories' => $categories,
             'subcategories' => $subcategories   )
        );  
    }
       /**
     * @Route("subcategory/{id}", name="subcategory_show")
     */
    public function showSubcategoryAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Category');
        $categories =  $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('AppBundle:Product');
        $products = $repository->findAll();

        for($i =0; $i< count($products); $i++)
        {
            if($products[$i]->getSubcategory()->getId() == $id)
            {
                $result[] = $products[$i];
            }
        }
       
        $repository = $this->getDoctrine()->getRepository('AppBundle:SubCategory');
        $subcategories =  $repository->findAll();
        
        return $this->render('frontend/category.html.twig',
            array('products' => $result,
             'categories' => $categories,
             'subcategories' => $subcategories   )
        );  
    }
}

