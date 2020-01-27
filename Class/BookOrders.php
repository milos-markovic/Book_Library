<?php
    class BookOrders {

        public $query;

        public function __construct($query){
            $this->query = $query;
        }

        public function getPaymentTypes(){

            $sql = "SELECT * FROM payment_types";
            $peymentTypes = $this->query->returnRows($sql);
            return $peymentTypes ? $peymentTypes  : [];
        }

        public function getOrders(){
            $sql = "SELECT orders.id,books.name AS book,concat(users.first_name,' ',users.last_name) AS user,orders.quantity,orders.coments,payment_types.name AS payment FROM orders JOIN books ON books.id = orders.book_id ";
            $sql .="JOIN users ON users.id = orders.user_id JOIN payment_types ON payment_types.id = orders.payment_type_id GROUP BY books.name";
            $orders = $this->query->returnRows( $sql );
            return $orders ? $orders : [];
        }

        public function insertOrder( $inputArray, $userId ){

            if( isset( $_SESSION['shopingCartProducts'] )){

                $countElemntsFromShopingCart = count( $_SESSION['shopingCartProducts'] );

                $insertItem = 0;

                foreach( $_SESSION['shopingCartProducts'] as $shopingCartProduct ){

                    $sql = "INSERT INTO orders(quantity,coments,user_id,book_id,payment_type_id)VALUES(:quantity,:note,:user_id,:book_id,:payment_type_id)";
                    $array = [
                        ':quantity' => $shopingCartProduct->quantity,
                        ":note" => trim($inputArray['note']),
                        ":user_id" => trim( $userId ),
                        ":book_id" => trim( $shopingCartProduct->id ),
                        ":payment_type_id" => trim($inputArray['payment'])
                    ];
                    $createOrder = $this->query->runQuery($sql,$array);
                    $insertItem += 1;
                }

                return ( $insertItem == $countElemntsFromShopingCart ) ? true : false;
            }
        }

        public function deleteOrder( $orderId ){

            $sql = "DELETE FROM orders WHERE id = :orderId";
            $array = [
                ':orderId' => $orderId
            ];
            $deleteOrder = $this->query->runQuery( $sql,$array );
            return $deleteOrder ? true : false;
        }

        public function getRegularUserOrders( $regularUserId ){

            if( isset($_SESSION['userId'] )){

                $sql = "SELECT orders.id,books.name AS book,concat(users.first_name,' ',users.last_name) AS user,orders.quantity,orders.coments,payment_types.name AS payment FROM orders JOIN books ON books.id = orders.book_id ";
                $sql .="JOIN users ON users.id = orders.user_id JOIN payment_types ON payment_types.id = orders.payment_type_id";
                $sql .=" WHERE user_id = :userId";
                $array = [
                    ':userId' => $regularUserId 
                ];
                $orders = $this->query->returnRows( $sql,$array );
                return $orders ? $orders : [];
            }
            
        }

    }