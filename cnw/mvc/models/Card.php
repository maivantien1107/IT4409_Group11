<?php 
    class Card {
        private $card;
        public function __construct($card) {
            self::setCard($card);

        }
        public function getCard() {
            return $this->card;
        }
        public function setCard($card) {
            return $this->card = $card;
        }
    }
 ?>