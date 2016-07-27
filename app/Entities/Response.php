<?php
/**
 * Created by PhpStorm.
 * User: akung
 * Date: 7/27/16
 * Time: 07:43
 */

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * Class Response
 * @package App\Entities
 * @Entity()
 * @Table(name="responses")
 */
class Response
{

    /**
     * @var string $id
     * @Id()
     * @Column(type="string", length=100)
     * @GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @var string $content
     * @Column(type="text")
     */
    private $content;
}