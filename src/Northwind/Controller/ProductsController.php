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
            //echo '<pre>'; var_dump($products[0]->getCategory());exit;
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
            //$form = $app['form.factory']->create(new ProductsType(), array('products' => $products));
            $form = $app['form.factory']->create(new ProductsType(), $productsContainer);
           // echo '<pre>';
           //var_dump($products);
            //echo '<hr>';
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
                    //var_dump($form->hasErrors());exit;
                    //$form->addError(new FormError('The form contains errors'));
                    $app['session']->getFlashBag()->add('error', 'The form contains errors.');
                }
            }
            
            return $app['twig']->render('northwind/products/index.html.twig', array(
                //'pager' => $products,
                'categories' => $categories,
                'categoryid' => $categoryid,
                'form' => $form->createView()
            ));
      
        })->bind('products');
        
 




       
        
        //ADD 
        $controllers->match('/add', function(Request $request) use ($app, $em) {
            
            $product = new Entity\Product();
            
            $form = $app['form.factory']->create(new ProductType(),$product);
            
            if ($request->isMethod("POST")) {
                $form->bind($request);

                if ($form->isValid()) {
                    $em->persist($product);
                    $em->flush();
                    
                    $app['session']->getFlashBag()->add('success', 'A new product has been added !');

                    return $app->redirect($app['url_generator']->generate('products'));
                } else {
                    $form->addError(new FormError('The form contains errors'));
                    //$app['session']->getFlashBag()->add('warning', 'No data was saved');

                }
            }
            return $app['twig']->render('northwind/products/add_edit.html.twig', array(
                'form' => $form->createView()
            ));
      
        })->bind('products_add');
        
        // SHOW
        $controllers->get('/{id}', function($id, Request $request) use ($app, $em) {
            
            if($id) {
                $product = $em->getRepository('Northwind\Entity\Product')->find($id);
            } else {
                $app['session']->getFlashBag()->add('error', 'The product does not exist.');
                return $app->redirect($app['url_generator']->generate('products'));    
            }
            
            return $app['twig']->render('northwind/products/show.html.twig', array(
                'product' => $product
            ));
      
        })->bind('products_show')->assert('id', '\d+')->value('id', 0);
        
        // EDIT
        $controllers->match('/{id}/edit', function($id, Request $request) use ($app, $em) {
            
            if($id) {
                $product = $em->getRepository('Northwind\Entity\Product')->find($id);
            } else {
                $app['session']->getFlashBag()->add('error', 'The product does not exist.');
                return $app->redirect($app['url_generator']->generate('products'));    
            }
            
            $form = $app['form.factory']->create(new ProductType(),$product);
            
            if ($request->isMethod("POST")) {
                $form->bind($request);

                if ($form->isValid()) {
                    $em->persist($product);
                    $em->flush();
                    
                    $app['session']->getFlashBag()->add('success', 'The product has been edited!');

                    return $app->redirect($app['url_generator']->generate('products'));
                } else {
                    $form->addError(new FormError('The form contains errors'));
                }
            }
            
            return $app['twig']->render('northwind/products/add_edit.html.twig', array(
                'form' => $form->createView()
            ));
      
        })->bind('products_edit')->assert('id', '\d+')->value('id', 0);
        
        // DELETE
        $controllers->match('/delete/{id}', function($id, Request $request) use ($app, $em) {
            
            $categoryid = (int) $request->query->get('categoryid', 0);
            var_dump($category);exit;
            $product = $em->getRepository('Northwind\Entity\Product')->find($id);
            if (!$product)  {
                return new Response(sprintf('Product with id %s not found', $id));
                //throw $request->createNotFoundException(sprintf('Product with id %s not found', $id));
            }
            
            //if($product instanceOf Entity\Product) {
                $em->remove($product);
                $em->flush();        
                
                $app['session']->getFlashBag()->add('success', 'The product has been deleted.');
            //} else {
              //  $app['session']->getFlashBag()->add('error', 'The product does not exist.');
            //}
            
            return $app->redirect($app['url_generator']->generate('products'));    
            
            
        })->bind('products_delete')->assert('id', '\d+')->value('id', 0);
      
        
        
        return $controllers;
    }
    
    private function deleteCollections($em, $init, $final)
    {
        if (empty($init)) {
            return;
        }

        if (!$final->getAddresses() instanceof \Doctrine\ORM\PersistentCollection) {
            foreach ($init['addresses'] as $addr) {
                $em->remove($addr);
            }
        }
    }
}