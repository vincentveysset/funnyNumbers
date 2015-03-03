<?php

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Entity\Fact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Metinet\AppBundle\Repository\InMemoryFactRepository;
use Symfony\Component\HttpFoundation\Request;
use Metinet\AppBundle\Form\Type\FactType;

class FactController extends Controller
{
    public function homeAction()
    {
        //$repo = $this->container->get('metinet_app.in_memory_fact');
        $repo = $this->container->get('metinet_app.doctrine_fact');
        $facts = $repo->findAll();

        return $this->render('MetinetAppBundle:Fact:home.html.twig', array(
            'facts' => $facts,
        ));
    }

    public function randomAction() {

        $repo = $this->container->get('metinet_app.doctrine_fact');

        $fact = $repo->randomFact();

        return $this->render('MetinetAppBundle:Fact:random.html.twig', array(
            'fact' => $fact,
        ));
    }

    public function submitAction(Request $request) {

        $fact = new Fact();

        $form = $this->createFormBuilder($fact)
            ->add('number', 'number')
            ->add('summary', 'text')
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $repo = $this->container->get('metinet_app.doctrine_fact');
            $repo->save($fact);

            return $this->redirect($this->generateUrl('home'));
        }

        return $this->render('MetinetAppBundle:Fact:submit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
