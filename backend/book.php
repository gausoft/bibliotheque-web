<?php 

class book {


    protected string $title;
    protected string $author;
    protected string $publish_at;
    protected bool $available = true;
    protected $pdo;

    public function __construct()
    {
        
    } 

    public function getTitle(){
        return $this->title;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getPublishDate()
    {
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
            "INSERT INTO books (title, author, publish_at, available) 
            VALUES (:title, :author ,:publish_at, :available)";

        $req = $pdo->prepare($sql);
       
        $res = $req->execute([":title" => $this->title,
                            ":author" => $this->author,
                            ":publish_at" => $this->publish_at,
                            ":available" => $this->available]);
        

        if($res > 0){
            return true;
         }else{
            return false;
        }
                            

    }

    public function updateBook(){
        $sql = 
            "UPDATE books SET ( 
                            title = :title,
                            author = :author, 
                            publish_at = :publish_at,
                            available = :availaible,
                    WHERE title = $this->title";
            
    
        $prepareSql = $this->pdo->prepare($sql);
        $req = $prepareSql->execute(['titre' => $this->title, 'author' =>$this->author ,
                                    'publish_at' => $this->publish_at,'available' => $this->available]);

        if($req > 0){
            return true;
        }else{
            return false;
        }
    
    
    
       }

}