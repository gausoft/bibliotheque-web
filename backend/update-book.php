<?php 

class updateBook extends addBook{

    public function updateBook($pdo,$title,$author,$publish_at){
        $sql = 
            "UPDATE books SET ( 
                            'title'=':title',
                            'author'=':author', 
                            'publish_at'=':publish_at',
                    WHERE title = $title";
            
    
        $prepareSql = $pdo->prepare($sql);
        $prepareSql->execute(['titre' => $title, 'author' =>$author ,
                             'publish_at' => $publish_at,] );
    
    
    
       }

}