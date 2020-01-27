     
       <!-- Modal -->
       <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="modal">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header bg-secondary text-white">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Uneto u Korpu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="byProductsFromShopingCart.php" method="POST" id="insertProductForm">
                        <div class="modal-body " id="modal_body">
                            
                            <?php 

                                if( isset( $getProductsFromShopingCart ) && !empty( $getProductsFromShopingCart ) ){

                                    
                                    
                                    $getUser = $user->getUser( $_SESSION['userId'] );

                                    
                                    $peymentTypes = $order->getPaymentTypes();

                                    require 'view/shopingCart.view.php';
                                   
                                    
                                }else{

                                    echo "<h4 class='text-warning'>Vaša korpa je trenutno prazna</h4>";
                                }
    
                            ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="nastaviKupovinu">Nastavi Kupovinu</button>
                            
                            <?php if( isset($_SESSION['shopingCartProducts']) && !empty($_SESSION['shopingCartProducts']) ) :?>
                                <button type="submit" name="byProduct" class="btn btn-primary btn-lg"><i class="fas fa-shopping-cart"></i>&nbsp; Izvrši Kupovinu</button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>