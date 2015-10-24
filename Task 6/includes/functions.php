<?php

class NewsLetter {

    private static $_instance = null;
    public $address;
    public $content;
    
    // metoda send salje sve  ne poslate mail-ove 
    function send()
    {
        $db = DB::getInstance();
        $st = $db->prepare("SELECT * FROM `news_letter` WHERE `status` = 1 ");                  //vraca mailove sa statusom 1 (neposlati)
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $st->execute();
        while ($rw = $st->fetch()) {
            $from = "From: NewsLetter@NewsLetter.com";                                          
            $address = $rw['address'];
            $content = $rw['content'];
            mail($address,"", $content, $from);                                                 //!!! funkcija mail() salje mail, u testu koriscen smtp4dev, u produkciji neophodno obeybediti SMPT server 
            $db->exec("UPDATE `news_letter` SET `status`= 0 WHERE `id` = " . $rw['id']);        //poslat mail dobija status 0 (poslat)
        }
    }

   // metoda save upisuje u bazu adresu i sadržaj emaila, prepare statement 
    function save()
    {
        $db = DB::getInstance();
        $st = $db->prepare("INSERT INTO `news_letter` VALUES (NULL, :address, :content, 1)");   //svaki mail dobija status = 1 (neposlat)
        $st->bindParam(':address', $this->address);
        $st->bindParam(':content', $this->content);
        $st->execute();

    }

    public static function getInstance()
    {

        if (self::$_instance == null)
        {
            self::$_instance = new NewsLetter();
        }

        return self::$_instance;
    }

}
