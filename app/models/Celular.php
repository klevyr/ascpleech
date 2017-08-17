<?php
namespace Portabilidad\Entity;

/**
 * Author
 *
 * @package Spot
 */
class Celular extends \Spot\Entity
{
    protected static $table = 'celsinope';
    protected static $mapper = '\Portabilidad\Mapper\Celular';
    
    public static function fields()
    {
        return [
            'numcel'           => [ 'type' => 'string', 'primary' => true, 'autoincrement' => true ],
            'carrier'          => [ 'type' => 'string' ],
            'response'         => [ 'type' => 'string' ],
            'lastsync'         => [ 'type' => 'datetime', 'value' => new \DateTime() ],
            'lastupdate'       => [ 'type' => 'datetime', 'value' => new \DateTime() ]
        ];
    }
}
