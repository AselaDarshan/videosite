<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/home", name="homepage")
     */
    public function homePageAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle::basic_layout.html.twig');
    }

    /**
     * @Route("/upload")
     */
    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $product = new Product();
//        $product->setTask('Write a blog post');
//        $product->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($product)
            ->add('imageFile', 'vich_file')
            ->add('imageName', 'text')
            ->add('save', 'submit', array('label' => 'Create Task'))
            ->getForm();
        $form->handleRequest($request);
        return $this->render('AppBundle::uploadForm.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
