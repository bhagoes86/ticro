<?php
/**
 * Created by PhpStorm.
 * User: akung
 * Date: 7/27/16
 * Time: 07:42
 */

namespace App\Entities;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * Class Issue
 * @package App\Entities
 * @Entity
 * @Table(name="issues")
 */
class Issue
{
    /**
     * @var string $id
     * @Column(type="string", length=100)
     * @Id
     * @GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @var string $title
     * @Column(type="string")
     */
    private $title;

    /**
     * @var boolean $public
     * @Column(type="boolean")
     */
    private $public = true;

    /**
     * @ManyToMany(targetEntity="Tag", inversedBy="issues")
     * @JoinTable(name="issue_tag")
     */
    private $tags;

    /**
     * Issue constructor.
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }
}