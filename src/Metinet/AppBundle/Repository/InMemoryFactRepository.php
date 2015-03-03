<?php
/**
 * Created by PhpStorm.
 * User: user01
 * Date: 02/03/15
 * Time: 17:18
 */

namespace Metinet\AppBundle\Repository;

class InMemoryFactRepository implements FactRepository {

    public function findAll () {

        $facts =  [
            [
                "number" => 900000,
                "summary" => "La longueur en kilomètres du réseau de canalisations d'eau potable français"
            ],
            [
                "number" => 5,
                "summary" => "C'est le nombre de rhinocéroos blancs du Nord encore en vie : deux dans des zoos, trois dans une réserve kenyane"
            ]
        ];

        return $facts;
    }
} 