<?php

namespace Metinet\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Metinet\AppBundle\Repository\InMemoryFactRepository;

class FactController extends Controller
{
    public function homeAction()
    {
        $repo = $this->container->get('metinet_app.in_memory_fact');
        //$repo = $this->container->get('metinet_app.mysql_fact');
        $facts = $repo->findAll();

        return $this->render('MetinetAppBundle:Fact:home.html.twig', array(
                'facts' => $facts,
            ));    }

}
