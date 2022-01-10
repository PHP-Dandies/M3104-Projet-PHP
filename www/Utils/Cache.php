<?php
class Cache {
    public $page;
    public $expiration;
    public $buffer;

    //Constructor & Destructor
    public function __construct($page) {
        $this->page = $page;
        $this->expiration = time()+3600;
    }


    //Getters Setters
    public function set_page($page) {  $this->page = $page;  }

    public function get_page() {  return $this->page;  }

    public function set_expiration($expiration) {  $this->expiration = $expiration;  }

    public function get_expiration() {  return $this->expiration;  }

    public function set_buffer($buffer) {  $this->buffer = $buffer;  }

    public function get_buffer() {  return $this->buffer;  }


    //Methods
    public function cache_view() {
        if (file_exists('Cache/'.$this->page.'.tmp') & time() < $this->expiration) {
            readfile('Cache/'.$this->page.'.tmp');
            die(-1);
        }
    }

    public function start_buffer() {
        ob_start();
    }

    public function end_buffer() {
        $this->buffer = ob_get_clean();
        file_put_contents('Cache/'.$this->page.'.tmp', $this->buffer);
        echo $this->buffer;
    }
}?>