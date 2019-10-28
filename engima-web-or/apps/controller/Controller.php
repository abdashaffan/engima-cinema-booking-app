<?php


/**
 * 
 * Controller class
 * Handle various methods, but need to inherit invoke class
 * 
 */


abstract class Controller{


    /**
     * Invoke method
     * Need to be implemented to all children
     * 
     */
    abstract public function invoke();


};