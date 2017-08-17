<?php
namespace Portabilidad\Controllers;

use \Curl\Curl;
/**
*
*/
class ASCP extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }

    public function leechAction( $id )
    {
        $curl = new Curl();
        $curl->setUserAgent('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36');
        $curl->setHeaders([
          'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8' , 
          'Accept-Language' => ' es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3' , 
          'Accept-Encoding' => ' gzip, deflate' , 
          'Referer' => ' http://lookup.ascp.com.ec/lookup.html?lang=8' , 
          'Connection' => ' keep-alive'
        ]);
        /*DEBUG
        $handle = fopen( dirname(dirname(__DIR__)) . '/logs/log_2017-04-26.txt' , "a" );
        $curl->verbose(true, $handle);
        */
        $curl->post($this->getURI() ,
            [
                'lang'          =>   '8' ,
                'id'            =>   '' ,
                'ism'           =>   '-' ,
                'telno'         =>   $id
            ] );
        if ($curl->error) {
            echo 'Error en cURL: [' . $curl->errorCode . '] ' . $curl->errorMessage;
            return false;
        } else {
            return $curl->response;
        }
    }
    
    public function getURI(){
        $protocol = 'https';
        $urisep = '://';
        $domain = 'lookup.ascp.com.ec';
        $portseparator = '';
        $port   = '';
        $path   = '/';
        $page   = 'lookup.html';
                
        return $protocol . $urisep . $domain . $portseparator . $port . $path . $page;
    }
}