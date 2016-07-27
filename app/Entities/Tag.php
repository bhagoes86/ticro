<?php
/**
 * Created by PhpStorm.
 * User: akung
 * Date: 7/27/16
 * Time: 07:50
 */

namespace App\Entities;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * Class Tag
 * @package App\Entities
 * @Entity()
 * @Table(name="tags")
 */
class Tag
{
    /**
     * @var string $id
     * @Id()
     * @GeneratedValue(strategy="UUID")
     * @Column(type="string", length=100)
     */
    private $id;

    /**
     * @var string $slug
     * @Column(type="string", length=100)
     */
    private $slug;

    /**
     * @var string $name
     * @Column(type="string")
     */
    private $name;

    /**
     * @ManyToMany(targetEntity="Issue", mappedBy="tags")
     */
    private $issues;

    public function __construct()
    {
        $this->issues = new ArrayCollection();
    }
}