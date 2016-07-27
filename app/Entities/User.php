<?php
/**
 * Created by PhpStorm.
 * User: akung
 * Date: 7/27/16
 * Time: 08:35
 */

namespace App\Entities;


use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * Class User
 * @package App\Entities
 * @Entity
 * @Table(name="users")
 */
class User implements \Illuminate\Contracts\Auth\Authenticatable
{
    use \App\Entities\Authenticatable;

    /**
     * @var string $id
     * @Column(type="string", length=100)
     * @Id
     * @GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @Column(type="string", unique=true)
     */
    private $email;

    /**
     * @Column(type="string", unique=true)
     */
    private $phone;


}