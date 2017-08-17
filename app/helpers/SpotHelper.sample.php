<?php
function spot()
{
    static $spot;
    if($spot === null) {
        $config = new \Spot\Config();
        $config->addConnection('mysql', 'mysql://_username_:_password_@_remote_server_/_database_');
        $spot = new \Spot\Locator($config);
    }
    return $spot;
}
