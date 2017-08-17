<?php
namespace Portabilidad\Controllers;

class PortabilidadController extends BaseController {
	public $mapper;

    function __construct() {
        parent::__construct();
        $this->mapper = spot()->mapper('\Portabilidad\Entity\Celular');
    }

    function syncCelular(){
        $celular = $this->mapper->getCel2Leech();

        $ascp = new ASCP();

        foreach ($celular as $key => $value) {
          $this->l->info("Validacion Celular: " . substr($value->numcel,-9) );
          $response = $ascp->leechAction(
              substr($value->numcel,-9)
          );

          $dom = new \DOMDocument();
          $dom->loadHTML($response);

          $xpath = new \DOMXpath($dom);

          $result = $xpath->query('//div[@class="res"]');
          if ($result->length > 0) {
            $node = preg_replace('/\s\s+/', ' ', iconv( 'UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $result->item(0)->nodeValue) );
            $this->l->info("RES: " . $node );
            $numcel = $this->mapper->get( $value->numcel );
            $numcel->lastsync = new \DateTime();
            $numcel->lastupdate = new \DateTime();
            $numcel->response = $node;
            $this->mapper->update($numcel);
          }

          $result = $xpath->query('//div[@class="msg"]');
          if ($result->length > 0) {
            $node = preg_replace('/\s\s+/', ' ', iconv( 'UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $result->item(0)->nodeValue) );
            $this->l->info("MSG: " . $node);
            $numcel = $this->mapper->get( $value->numcel );
            $numcel->lastsync = new \DateTime();
            $numcel->lastupdate = new \DateTime();
            $numcel->response = $node;
            $this->mapper->update($numcel);
          }

          $result = $xpath->query('//div[@class="err"]');
          if ($result->length > 0) {
            $node = preg_replace('/\s\s+/', ' ', iconv( 'UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $result->item(0)->nodeValue) );
            $this->l->info("MSG: " .  $node);
          }
        }
    }

    public function __call($method, $args) {
        return $this->mapper->$method( $args );
    }
}
