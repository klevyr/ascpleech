<?php
namespace Portabilidad\Mapper;

class Celular extends \Spot\Mapper
{
    /**
     * Get 10 most recent shifts for this employee
     *
     * @return \Spot\Query
     */
    public function getCel2Leech()
    {
        return $this->all()
            ->where(['lastsync' => null])
            ->limit(10);
    }
}
