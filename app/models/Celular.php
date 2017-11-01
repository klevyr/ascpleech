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
            'carrypp'          => [ 'type' => 'string' ],
            'sendat'           => [ 'type' => 'string' ],
            'statyp'           => [ 'type' => 'string' ],
            'platyp'           => [ 'type' => 'string' ],
            'carrier'          => [ 'type' => 'string' ],
            'response'         => [ 'type' => 'string' ],
            'lastsync'         => [ 'type' => 'datetime', 'value' => new \DateTime() ],
            'lastupdate'       => [ 'type' => 'datetime', 'value' => new \DateTime() ]
        ];
    }
}
