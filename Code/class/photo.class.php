<?php
class photo
{
    private $_id;
    private $_name;
    private $_userId;
    private $_likes;
    private $_userName;

    public function __construct(array $kwargs){
    try{
        if (!array_key_exists('id', $kwargs))
            throw new InvalidArgumentException('A photo needs a id');
        else
            $this->_id = $kwargs['id'];
        if (!array_key_exists('name', $kwargs))
            throw new InvalidArgumentException('A photo needs a name');
        else
            $this->_name = $kwargs['name'];
        if (!array_key_exists('userId', $kwargs))
            throw new InvalidArgumentException('A photo needs a userId');
        else
            $this->_userId = $kwargs['userId'];
    }catch(Exception $exc){
        print ($exc . PHP_EOL);
    }
    }

    public function get(){
        $res = '{\"name\" : \"'.$this->_name.'\", \"id\" : '.$this->_id.', \"userId\" : '.$this->_userId.', \"likes\" : '.count($this->_likes).'}';
        return ($res);
    }

    public function getName(){
        return $this->_name;
    }

    public function getId(){
        return $this->_id;
    }

    public function getUserId(){
        return $this->_userId;
    }

    public function getUserName(){
        return $this->_userName;
    }

    public function setLikes($likes)
    {
        $this->_likes = $likes;
    }

    public function getLikes()
    {
        return count($this->_likes);
    }

    public function getLikes_full()
    {
        return $this->_likes;
    }

    public function setUserName($name)
    {
        $this->_userName = $name;
    }

}