<?php

class sprite
{
    private $_id;
    private $_name;
    private $_width;
    private $_height;
    private $_posX = 0;
    private $_posY = 0;
    private $_ang = 0;

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
            if (!array_key_exists('width', $kwargs))
                throw new InvalidArgumentException('A sprite needs a width');
            else
                $this->_width = $kwargs['width'];
            if (!array_key_exists('height', $kwargs))
                throw new InvalidArgumentException('A sprite needs a height');
            else
                $this->_height = $kwargs['height'];
        }catch(Exception $exc){
			print ($exc . PHP_EOL);
		}
    }

    public function __get($att){
        print('name : ' . $_name . 'id : ' . $_id .'width : ' . $_width .$_id .'height : ' . $_height . PHP_EOL);
        return (10);
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

    public function getSize(){
        return array ("width" => $this->_width, "height" => $this->_height);
    }

    public function getWidth(){
        return $this->_width;
    }

    public function getHeight(){
        return $this->_height;
    }

    public function change_size($quos)
    {
        $this->_width *= $quos;
        $this->_height *= $quos;
    }

}
?>