<?php
/**
 * Created by PhpStorm.
 * User: user01
 * Date: 02/03/15
 * Time: 17:18
 */

namespace Metinet\AppBundle\Repository;

use Metinet\AppBundle\Entity\Fact;

class InMemoryFactRepository implements FactRepository {

    private $facts = [];

    public function __contruct() {

        $this->save( new Fact( 9000, "Longueur cannalisation France"));
        $this->save( new Fact( 42, "Réponse à l'univers"));
    }

    public function findAll () {

        $facts = $this->facts;

        return $facts;
    }

    public function randomFact() {

        $index = array_rand($this->facts);

        return $this->facts[$index];
    }

    public function save(Fact $fact) {

        if(null === $fact->getId()) {
            $ids = [];
            foreach ($this->facts as $f) {
                $ids[] = $f->getId();
            }

            $id = count($ids) ? max($ids) + 1 : 1;

            $fact->setId($id);
        }
        $this->facts[$fact->getId()] = $fact;
    }
} 