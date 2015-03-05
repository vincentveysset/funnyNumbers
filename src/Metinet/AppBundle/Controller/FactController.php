<?php

namespace Metinet\AppBundle\Controller;

use Metinet\AppBundle\Entity\Fact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Metinet\AppBundle\Repository\InMemoryFactRepository;
use Symfony\Component\HttpFoundation\Request;
use Metinet\AppBundle\Form\Type\FactType;
use Metinet\AppBundle\Form\Type\FactValidationType;

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

        $form = $this->createForm(new FactType(), $fact);

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

    public function adminAction(Request $request) {

        $repo = $this->container->get('metinet_app.doctrine_fact');
        $facts = $repo->findFacts();

        if($request->isMethod("POST")) {

            $repo = $this->container->get('metinet_app.doctrine_fact');
            $fact = $repo->findOne($request->get('id'));

            if($request->get('action') == "Validate") {
                $fact->getStatus(1);

                $message = \Swift_Message::newInstance()
                    ->setSubject('Validation of your Fact')
                    ->setFrom('send@example.com')
                    ->setTo($fact->getEmail())
                    ->setBody("Bravo, votre fact a été validée par l'équipe ! Merci de votre participation")
                ;
            }
            else {
                $fact->setStatus(2);

                $message = \Swift_Message::newInstance()
                    ->setSubject('Refuse of your Fact')
                    ->setFrom('send@example.com')
                    ->setTo($fact->getEmail())
                    ->setBody("Désolé, votre fact n'a pas été validée par l'équipe ! Merci de votre participation")
                ;
            }

            $this->get('mailer')->send($message);

            $repo->save($fact);

            return $this->redirect($this->generateUrl('admin'));
        }

        return $this->render('MetinetAppBundle:Fact:admin.html.twig', array(
            'facts' => $facts,
        ));
    }
}
