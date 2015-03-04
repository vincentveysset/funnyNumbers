<?php
/**
 * Created by PhpStorm.
 * User: user01
 * Date: 03/03/15
 * Time: 10:27
 */

namespace Metinet\AppBundle\Entity;

class Fact {

    const STATUS_MODERATION = 0;
    const STATUS_VALIDATE = 1;
    const STATUS_NOT_VALIDATE = 2;

    private $id;
    private $number;
    private $summary;
    private $email;
    private $status;

    public function __construct() {
        $this->status = 0;
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

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}