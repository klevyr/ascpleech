<?php

Class Session{
    
    static function init(){
        @session_start();
    }
    
    static function destroy(){
        session_destroy();
    }
    
    static function getValue($var){
        return $_SESSION[$var];
    }
    
    static function setValue($var, $val){
        $_SESSION[$var] = $val;
    }
    
    static function unsetValue($var){
        if(isset($_SESSION[$var])){
            unset($_SESSION[$var]);
        }
    }
    
    static function exist(){
        if(sizeof($_SESSION) > 0){
            return true;
        }else{
            return false;
        }
    }
    
}