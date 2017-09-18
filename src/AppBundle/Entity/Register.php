<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Register
 *
 * @ORM\Table(name="register")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RegisterRepository")
 */
class Register
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phn", type="string", length=255)
     */
    private $phn;

    /**
     *  @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="posting", type="string", length=255)
     */
    private $church;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Register
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Register
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phn
     *
     * @param string $phn
     *
     * @return Register
     */
    public function setPhn($phn)
    {
        $this->phn = $phn;

        return $this;
    }

    /**
     * Get phn
     *
     * @return string
     */
    public function getPhn()
    {
        return $this->phn;
    }
    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Register
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */

    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Register
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set church
     *
     * @param string $church
     *
     * @return Register
     */
    public function setChurch($church)
    {
        $this->church = $church;

        return $this;
    }

    /**
     * Get church
     *
     * @return string
     */
    public function getChurch()
    {
        return $this->church;
    }
}

