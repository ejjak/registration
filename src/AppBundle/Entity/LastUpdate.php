<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LastUpdate
 *
 * @ORM\Table(name="last_update")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LastUpdateRepository")
 */
class LastUpdate
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
     * @ORM\Column(name="lastupdate", type="string", length=255)
     */
    private $lastupdate;


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
     * Set lastupdate
     *
     * @param string $lastupdate
     *
     * @return LastUpdate
     */
    public function setLastupdate($lastupdate)
    {
        $this->lastupdate = $lastupdate;

        return $this;
    }

    /**
     * Get lastupdate
     *
     * @return string
     */
    public function getLastupdate()
    {
        return $this->lastupdate;
    }
}

