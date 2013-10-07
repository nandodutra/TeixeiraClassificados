<?php 

class AppModel extends ActiveRecord\Model
{
    
    /**
     * Resolve o problema que não permite acessar as relações no template Twig
     * Solução encontrada em http://stackoverflow.com/questions/10701888/twig-php-activerecord-cannot-access-field-from-join-table
     * 
     * @param string $attribute_name
     * @return boolean
     */
    public function __isset($name)
    {
        // check for getter
        if (method_exists($this, "get_$name"))
        {
            $name = "get_$name";
            $value = $this->$name();
            return $value;
        }

            return $this->read_attribute($name);
    }

}