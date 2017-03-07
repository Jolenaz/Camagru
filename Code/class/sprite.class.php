<?php

class sprite
{
    private $_id;
    private $_name;
    private $_width;
    private $_height;

    public function _get($att){
        print('name : ' . $_name . 'id : ' . $_id .'width : ' . $_width .$_id .'height : ' . $_height . PHP_EOL);
        return (1);
    }

    public function _set($att, $value){
        print('not implemented' . PHP_EOL);
    }

    public function getName(){
        return $this->$_name;
    }

    public function getID(){
        return $this->$_id;
    }

    public function getSize(){
        return array ("width" => $this->$_width, "height" => $this->$_height);
    }

    public function getWidth(){
        return $this->$_width;
    }

    public function getHeight(){
        return $this->$_height;
    }

}
?>