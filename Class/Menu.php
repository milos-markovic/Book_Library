<?php

    class Menu {

        private $query;

        public function __construct($query){
            $this->query = $query;
        }

        public function getBootomMenuItems(){
            $sql = "SELECT id,title FROM bootom_menu_titles";
            $menuTitles = $this->query->returnRows($sql);
            foreach( $menuTitles as $menuTitle ){
                $menuTitle->menuItems = $this->getMenuItems( $menuTitle->id );
            }
            return $menuTitles ? $menuTitles  : []; 
        }
        public function getMenuItems( $titleId ){
            $sql = "SELECT * FROM bottom_menu_items WHERE menu_title_id = :menu_title_id";
            $array = [
                ':menu_title_id' => $titleId
            ];
            $menuItems = $this->query->returnRows( $sql,$array );
            return $menuItems ? $menuItems : [];
        }
        public function getMenuTitle( $titleId ){
            $sql = "SELECT * FROM bootom_menu_titles WHERE id = :titleId";
            $array = [
                ':titleId' => $titleId
            ];
            $menuTitle = $this->query->returnRows( $sql,$array,true );
            return $menuTitle ? $menuTitle : [];
        }
        public function updateMenuTitle( $titleId, $title ){
            $sql = "UPDATE bootom_menu_titles SET title = :title WHERE id = :titleId";
            $array = [
                ':titleId' => $titleId,
                ':title' => $title
            ];
            $updateMenuTitle = $this->query->runQuery( $sql,$array );
            return $updateMenuTitle ? true : false;
        }
        public function deleteMenuTitle( $titleId ){
            $sql = "DELETE FROM bootom_menu_titles WHERE id = :titleId";
            $array = [
                ':titleId' => $titleId
            ];
            $deleteTitle = $this->query->runQuery( $sql,$array );
            return $deleteTitle ? true : false;
        }
        public function createMenuTitle( $inputArray ){
            $sql = "INSERT INTO bootom_menu_titles(title)VALUES(:title)";
            $array = [ 
                ':title' => trim($inputArray['menuTitle'])
            ];
            $createMenuTitle = $this->query->runQuery($sql,$array);
            return $createMenuTitle ? true : false;
        }
        public function getMenuLinks( $titleId ){
            $sql = "SELECT * FROM bottom_menu_items WHERE menu_title_id = :titleId";
            $array = [
                ':titleId' => $titleId
            ];
            $menuLinks = $this->query->returnRows( $sql,$array );
            return $menuLinks ? $menuLinks : []; 
        }
        public function getMenuLink( $linkId ){
            $sql = "SELECT * FROM bottom_menu_items WHERE id = :linkId";
            $array = [
                ':linkId' => $linkId
            ];
            $menuLink = $this->query->returnRows( $sql,$array,true );
            return $menuLink ? $menuLink : [];
        }
        public function updateMenuLink( $inputArray ){

            $sql = "UPDATE bottom_menu_items SET title = :title,link = :link WHERE id = :linkId";
            $array = [
                ':title' => trim($inputArray['title']),
                ':link' => trim($inputArray['link']),
                ':linkId' => trim($inputArray['linkId'])
            ];
            $updateMenuLink = $this->query->runQuery( $sql,$array );
            return $updateMenuLink ? true : false;
        }
        public function deleteMenuLink( $linkId ){

            $sql = "DELETE FROM bottom_menu_items WHERE id = :linkId";
            $array = [
                ':linkId' => $linkId
            ];
            $deleteLink = $this->query->runQuery( $sql,$array );
            return $deleteLink ? true : false;
        }
        public function createMenuLink( $inputArray ){

            $sql = "INSERT INTO bottom_menu_items(title,link,menu_title_id)VALUES(:title,:link,:menu_title_id)";
            $array = [
                ':title' => trim($inputArray['linkName']),
                ':link' => 'http://wwww.' .trim($inputArray['link']),
                ':menu_title_id' => trim($inputArray['titleId'])
            ];
            $createLink = $this->query->runQuery( $sql,$array );
            return  $createLink ? true : false;
        }

        public function getTopMenuItems(){

            $sql = "SELECT * FROM top_menu_items";
            $menuItems = $this->query->returnRows( $sql );
            return  $menuItems ?  $menuItems : [];
        }
        public function getTopMenuItem( $linkId ){
 
            $sql = "SELECT * FROM top_menu_items WHERE id = :linkId";
            $array = [
                ':linkId' => $linkId 
            ];
            $menuItem = $this->query->returnRows( $sql,$array,true );
            return $menuItem ? $menuItem : [];
        }
        public function updateTopMenuLink( $inputArray ){

            $sql = "UPDATE top_menu_items SET name = :name,link = :link WHERE id = :linkId";
            $array = [
                ':name' => trim($inputArray['title']),
                ':link' => trim($inputArray['link']),
                ':linkId' => trim($inputArray['linkId'])
            ];
            $updateLink = $this->query->runQuery( $sql,$array );
            return $updateLink ? true : false;
        }
        public function createTopMenuLink( $inputArray ){

            $sql = "INSERT INTO top_menu_items(name,link)VALUES(:name,:link)";
            $array = [
                ':name' => trim( $inputArray['title'] ),
                ':link' => trim( $inputArray['link'] )
            ];
            $createLink = $this->query->runQuery( $sql,$array );
            return $createLink ? true : false; 
        }
        public function deleteTopMenuLink( $linkId ){
            $sql = "DELETE FROM top_menu_items WHERE id = :linkId";
            $array = [
                ':linkId' => $linkId
            ];
            $deletelink = $this->query->runQuery( $sql,$array );
            return $deletelink ? true : false;
        }
    }