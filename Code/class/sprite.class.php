<?php

class sprite
{
    private $_id;
    private $_name;
    private $_format;

    public function __construct(array $kwargs){
        try{
            if (!array_key_exists('id', $kwargs))
                throw new InvalidArgumentException('A sprite needs a id');
            else
                $this->_id = $kwargs['id'];
            if (!array_key_exists('name', $kwargs))
                throw new InvalidArgumentException('A sprite needs a name');
            else
                $this->_name = $kwargs['name'];
            if (!array_key_exists('format', $kwargs))
                throw new InvalidArgumentException('A sprite needs a format');
            else
                $this->_format = $kwargs['format'];
        }catch(Exception $exc){
			print ($exc . PHP_EOL);
		}
    }

    public function get(){
        $res = '{\"name\" : \"'.$this->_name.'\",\"id\" : '.$this->_id.',\"format\" : \"'.$this->_format.'\"}';
        return ($res);
    }

    public function __set($att, $value){
        print('not implemented' . PHP_EOL);
    }

    public function getName(){
        return $this->_name;
    }

    public function getID(){
        return $this->_id;
    }

    public function getFormat(){
        return $this->_format;
    }
}
?>