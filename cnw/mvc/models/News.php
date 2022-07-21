<?php 
    class News {
        private $news_id;
        private $title;
        private $category;
        private $description;
        private $time;
        private $img;
        private $overview;
        public function __construct($news_id, $title,$category, $description,$time, $img, $overview){
               self::setNews_id($news_id);
               self::setTitle($title);
               self::setCategory($category);
               self::setDescription($description);
               self::setTime($time);
               self::setImg($img);
               self::setOverview($overview);

        }
        public function getNews_id(){return $this->news_id;}
        public function getTitle(){return $this->title;}
        public function getDescription(){return $this->description;}
        public function getTime(){return $this->time;}
        public function getImg(){return $this->img;}
        public function getOverview(){return $this->overview;}
        public function setNews_id($news_id){ $this->news_id=$news_id;}
        public function setTitle($title){ $this->title=$title;}
        public function setDescription($description){ $this->description=$description;}
        public function setTime($time){ $this->time=$time;}
        public function setImg($img){ $this->img=$img;}
        public function setOverview($overview){ $this->overview=$overview;}
        public function getCategory(){ return $this->category;}
        public function setCategory($category){ $this->category=$category;}


    }
?>