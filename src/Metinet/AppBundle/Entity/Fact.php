<?php
/**
 * Created by PhpStorm.
 * User: user01
 * Date: 03/03/15
 * Time: 10:27
 */

namespace Metinet\AppBundle\Entity;

class Fact {

    private $id;
    private $number;
    private $summary;

    public function __construct() {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        if(null !== $this->id) {
            throw new \Exception("Can't update id");
        }
        $this->id = $id;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @param mixed $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }
}