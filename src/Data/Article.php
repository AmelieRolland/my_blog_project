<?php

namespace App\Data;


class Article
{
    public function __construct(
        private string $name,
        private string $date,
        private string $category,
        private string $img
    ){
    }

        /**
         * Get the value of name
         */
        public function getName()
        {
                return $this->name;
        }

        /**
         * Get the value of date
         */
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Get the value of category
         */
        public function getCategory()
        {
                return $this->category;
        }

        /**
         * Get the value of img
         */
        public function getImg()
        {
                return $this->img;
        }
}