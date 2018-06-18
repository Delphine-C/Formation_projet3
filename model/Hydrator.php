<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 12:12
 */

abstract class Hydrator
{
    public function __construct($donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate($donnees)
    {
        foreach($donnees as $key => $value)
        {
            $method='set'.ucfirst($key);

            if(method_exists($this,$method))
            {
                $this->$method($value);
            }
        }
    }
}