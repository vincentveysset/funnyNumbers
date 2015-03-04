<?php
/**
 * Created by PhpStorm.
 * User: user01
 * Date: 02/03/15
 * Time: 17:26
 */

namespace Metinet\AppBundle\Repository;

use Metinet\AppBundle\Entity\Fact;

interface FactRepository {
    public function findAll();

    public function randomFact();

    public function findFacts();

    public function findOne($id);

    public function save(Fact $fact);
} 