<?php
/**
 * Created by PhpStorm.
 * User: user01
 * Date: 03/03/15
 * Time: 12:21
 */

namespace Metinet\AppBundle\Repository;

use Doctrine\ORM\EntityManager;
use Metinet\AppBundle\Entity\Fact;

class DoctrineFactRepository implements FactRepository {

    private $entityManager;

    public function __construct(EntityManager $em) {

        $this->entityManager = $em;
    }

    public function findAll() {

        $facts = $this->entityManager->getRepository("MetinetAppBundle:Fact")->findByStatus(1);

        return $facts;
    }

    public function randomFact() {

        $connection = $this->entityManager->getConnection();
        $ids = $connection->fetchAll("SELECT id FROM fact WHERE status=1;");
        $randomId = $ids[array_rand($ids)]["id"];

        $query = $this->entityManager->createQuery(
            "SELECT fact FROM MetinetAppBundle:Fact fact WHERE fact.id = :randomId"
        );
        $query->setParameter("randomId", $randomId);

        $results = $query->getResult();

        return $results[0];

        // Ma soluce
        //$facts = $this->entityManager->getRepository("MetinetAppBundle:Fact")->findAll();
        //return $facts[rand(0, count($facts) - 1)];
    }

    public function findOne($id) {

        $fact = $this->entityManager->getRepository("MetinetAppBundle:Fact")->find($id);

        return $fact;
    }

    public function findFacts() {

        $facts = $this->entityManager->getRepository("MetinetAppBundle:Fact")->findByStatus(0);

        return $facts;
    }

    public function save(Fact $fact) {

        $this->entityManager->persist($fact);
        $this->entityManager->flush();
    }
} 