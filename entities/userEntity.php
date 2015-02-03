<?php
namespace entities;
use \Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class userEntity {

    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    public $id;

    /** @ORM\Column(type="string") */
    public $username;

    /** @ORM\Column(type="string") */
    public $password;

    /** @ORM\Column(type="string") */
    public $email;

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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}