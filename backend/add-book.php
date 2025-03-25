<?php
class addBook {

    protected string $title;
    protected string $author;
    protected string $publish_at;
    protected bool $available;

    public function __construct($title, $author, $publish_at, $available = true)
    {
        $this->title = $title;
        $this->author = $author;
        $this->publish_at= $publish_at;
        $this->available = $available;


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
        $this->author = $author;
        return $this->author;
    }

   public function setPublishDate($publish_at){
    $this->publish_at = $publish_at;
    return $this->publish_at;
    }

    public function setAvailable($available){
        $this->available = $available;
        return $this->available;
   }

   public function addBook($pdo){
        $sql = 
            "INSERT INTO books ('title', 'author' , 'publish_at', 'available') 
            VALUES (':title', ':author' ,':publish_at', ':available')";

        $statement = $pdo->prepare($sql);
        $statement->execute([':title' => $this->title,
                         ':author' => $this->author,
                         ':publish_at' => $this->publish_at,
                         ':available' => $this->available]);



   }

}