<?php

namespace Northwind\Controller;

use Silex\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;
use Silex\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormError;
use Northwind\Entity;
use Northwind\Form\ProductType;
use Northwind\Form\ProductsType;
use Northwind\Form\CategoryType;


class ProductsController implements ControllerProviderInterface{
    
    public function connect(Application $app)
    {   
         
        $controllers = $app['controllers_factory'];
        $em = $app['em'];
        
        $controllers->match('/', function(Request $request) use ($app, $em) {

            $page = (int) $request->query->get('page', 1);
            $categoryid = (int) $request->query->get('categoryid', 0);
            $orderBy = 'categoryName';
            if (!$categoryid) {
                $categoryid = $em->getRepository('Northwind\Entity\Category')->getFirst();
                // si es 0 no hay categorias //redireccionar
            }
            $categories = $em->getRepository('Northwind\Entity\Category')->findAll();
            
            $products = $em->getRepository('Northwind\Entity\Product')->getProductsByCategory($categoryid);
            $productsContainer = new \Northwind\Form\Model\Products($products);

            $form = $app['form.factory']->create(new ProductsType(), $productsContainer);

            if ($request->isMethod("POST")) {
                $form->bind($request);
                
                if ($form->isValid()) {
                    
                    $newproducts = $form->getData()->products;

                    foreach ($products as $product) {
                        if(!in_array($product, $newproducts))
                            $em->remove($product);
                    }
                    foreach ($newproducts as $product) {
                        $em->persist($product);
                    }

                    $em->flush();
                    
                    $app['session']->getFlashBag()->add('success', 'The product has been edited!');
                    return $app->redirect($app['url_generator']->generate('products',array('categoryid' => $categoryid)));
                } else {
                    $app['session']->getFlashBag()->add('error', 'The form contains errors.');
                }
            }
            
            return $app['twig']->render('northwind/products/index.html.twig', array(
                'categories' => $categories,
                'categoryid' => $categoryid,
                'form' => $form->createView()
            ));
      
        })->bind('products');
        
    }
}