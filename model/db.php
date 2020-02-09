<?php

interface IConnection{
	public function open();
	public function query($query);
	public function close();
}


class MySQL_I_Connection implements IConnection{

    private $link;

    public function __construct() {
        $this->link = null;
    }

    public function close() {
        $this->link->close();
    }
    public function query($query) {
        return $this->link->query($query);
    }

    public function open() {
        $this->link = new mysqli('localhost', 'root', '', 'enyro');
        mysqli_set_charset($this->link,"utf8");
        if (!$this->link)
		return false;
	   return true;    
    }
    
    
}

function getConnection(){
	return new MySQL_I_Connection();
}

?>
