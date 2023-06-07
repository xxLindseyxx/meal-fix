<?php
/**
 * 
 * Generates a webpage
 * 
 * Intended as a parent class to generate a valid html 5 webpage.
 * 
 * @author Lindsey Cawthorne
 * 
 */
class Webpage {
    public $head;
    public $body;
    public $nav;
    public $foot;

    public function __construct($title,$style,$header, $paragraph){
        $this->setHead($title,$style);
        $this->setBody($header);
        $this->setNav();
        $this->setFoot();
        $this->addParagraph($paragraph);
    }

    public function setHead($title,$style){
        $this->head = <<<EOT
        <!docutype html>
        <html lang= 'en-gb'>
        <head>
            <title>$title</title>
            <meta charset= 'utf-8'>
            <link rel="stylesheet" href=$style>
        </head>
        <body>
EOT;
    }
    public function setNav(){
        $this->nav = <<<EOT
        <nav class="nav">
            <ul>
                <li><a href="#">home</a></li>
                <li><a href="#">Add a meal</a></li>
                <li><a href="#">Calendar</a></li>
                <li><a href="#">Shopping List</a></li>
              </ul>
        </nav>
        
EOT;
    }
    public function setBody($header){
        $this->body = "<h1>$header</h1>";
    }    
    public function setFoot(){
        $this->foot = <<<EOT
        </body>
        </html>
EOT;
    }
    private function getHead(){
        return $this->head;
        // Could enter some valadation. 
    }
    private function getBody(){
        return $this->body;
    }
    private function getFoot(){
        return $this->foot;
    }
    private function addParagraph($text){
        $this->body = $this->body . "<p>" . $text ."</p>";
    }

    public function generateWebpage(){
        return $this->getHead() . $this->getBody() . $this->getFoot();
    }
}