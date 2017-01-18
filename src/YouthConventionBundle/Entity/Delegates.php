<?php

namespace YouthConventionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delegates
 *
 * @ORM\Table(name="delegates")
 * @ORM\Entity(repositoryClass="YouthConventionBundle\Repository\DelegatesRepository")
 */
class Delegates
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
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="church", type="string", length=255)
     */
    private $church;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=15)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=15)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=6)
     */
    private $district;


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
     * @return Delegates
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
     * Set church
     *
     * @param string $church
     *
     * @return Delegates
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

    /**
     * Set gender
     *
     * @param boolean $gender
     *
     * @return Delegates
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return bool
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Delegates
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set district
     *
     * @param string $district
     *
     * @return Delegates
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Delegates
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }
}
