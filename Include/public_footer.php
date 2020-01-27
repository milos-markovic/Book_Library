
    </main>
        
        <?php 
            $menuTitles = $menu->getBootomMenuItems();
        ?>


        <div id="bottom-footer" class="bg-dark py-4" >
            <div class="container">
            
                <h3 class="text-center mb-4 font-italic text-warning p-2">Korisni linkovi</h3>

                <div class="row">
                
                    <?php foreach( $menuTitles as $menuTitle) :?>

                        <div class="col-md-3 text-center links">
                            <h5 class ="text-warning" ><?php echo $menuTitle->title; ?></h5>

                            <ul class="p-0 list-unstyled">
                                <?php foreach( $menuTitle->menuItems as $menuItem ) :?>

                                    <li><a class="font-italic text-white active"  href="<?php echo $menuItem->link; ?>" target="_blank" > <?php echo $menuItem->title; ?></a> </li>

                                <?php endforeach; ?>
                            </ul> 
                        </div>

                    <?php endforeach; ?>

                </div>

            </div>
        </div>


        <div class="footer text-center plava-pozadina text-light">
            <div class="container">
                <p class="m-0 p-2">Napravio: Milos Marković</p>
            </div>  
        </div>



        <script src="<?php echo ROOT; ?>/asets/jquery/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="<?php echo ROOT; ?>/asets/js/bootstrap/bootstrap.min.js" ></script>
        <!-- <script src="http://localhost/Book_Library/asets/jquery/jquery.datetimepicker.full.js"></script> -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <script src="<?php echo ROOT; ?>/asets/js/owl-js/owl.carousel.min.js"></script>
        <script src="<?php echo ROOT; ?>/asets/js/validate.js"></script>

        <!-- <script src="https://kit.fontawesome.com/f6db652956.js" crossorigin="anonymous"></script> -->

        <script src="<?php echo ROOT; ?>/asets/js/helper.js" ></script>

    </body> 
</html>

<script>

   

        let search = document.querySelector("#search");
        let searchResult = document.querySelector(".searchResults");

        search.addEventListener('keyup',function(){

            let textSearch =  search.value;

            if( textSearch !== '' ){

                url = '<?php echo ROOT; ?>/admin/admin/searchBookAjax.php';

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: { bookName: textSearch }
                }).done(function( data ){

                    console.log( data);
                   searchResult.innerHTML = `${data}`;
                    
                });

            }else{

                searchResult.innerHTML = "";
            }
            

        });
   


</script>