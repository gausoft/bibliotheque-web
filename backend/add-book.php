<?php
class book {

    protected string $title;
    protected string $author;
    protected string $publish_at;
    protected bool $available;

    public function __construct($title, $author, $publish_at)
    {
        $this->title = $title;
        $this->author = $author;
        $this->publish_at= $publish_at;
        $this->available = true;


    } 

    public function getTitle(){
        return $this->title;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getPublishDate(){
        return $this->publish_at;
    }

    public function getAvailable(){
        return $this->available;
    }
    
    public function setTitle($title){
         $this->title = $title;
         return $this->title;
    }

    public function setAuthor($author){
        $this->title = $author;
        return $this->author;
    }

   public function setPublishDate($publish_at){
    $this->title = $publish_at;
    return $this->publish_at;
    }

    public function setAvailable($available){
        $this->title = $available;
        return $this->available;
   }

   public function addBook($pdo){
    $sql = 
        "INSERT INTO books ('title', 'author' , 'publish_at', 'available') 
        VALUES (':titre'. ':author' ,':publish_at, ':available')";

    $prepareSql = $pdo->prepare($sql);
    $prepareSql->execute(['titre' => $this->title, 'author' =>$this->author ,
                         'publish_at' => $this->publish_at,'available' => $this->available] );



   }

}