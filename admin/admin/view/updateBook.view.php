
<?php include '../../include/header.php';?>


<div class="container">

    <h5><a href="books.php" class="btn btn-link text-dark mt-4"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <h1 class="text-primary text-center mt-3 mb-4">Izmenite knjigu: <?php echo $getBook->name; ?></h1>

    <div class="row pt-4 pb-5">

        <div class="col-md-8 mx-auto">

            <?php include '../../Include/showMessages.php';?>


            <form action="" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="bookId" id="bookId" value="<?php echo $getBook->id; ?>" >
                
                <div class="form-group row">
                    <label for="naslov" class="col-sm-3 col-form-label">Naslov dela:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="naslov" name="naziv_dela" value="<?php echo $getBook->name; ?>" placeholder="Naslov dela">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">Izaberi Autora:</div>
                    <div class="col-sm-9">
                        <?php foreach( $autors as $autor ) :?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="autori" name="autori[]"
                                 
                                    <?php foreach( $getBook->autors as $bookAutor ) :?>
                                        <?php if( $autor->id === $bookAutor->id ) :?>

                                            <?php echo 'checked'; ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                 value="<?php echo $autor->id; ?>">
                                <label class="form-check-label" for="autor">
                                    <?php echo $autor->first_name.' '.$autor->last_name; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">Izaberi Žanr:</div>
                    <div class="col-sm-9">
                        <select name="žanr" id="žanr" class="form-control" >
                            <?php foreach($genres as $genre) :?>
                        
                                <option value="<?php echo $genre->id; ?>"><?php echo $genre->name; ?></option>
                            
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">Unesi u skladište:</div>
                    <div class="col-sm-9">
                        <div class="form-row align-items-center justify-content-around">
                        
                            <div class="col-4">
                                <select name="jezik" id="jezik" class="form-control">
                                    <?php foreach($languages as $language) :?>

                                        <option value="<?php echo $language->id;?>"
                                        
                                          <?php if( $language->name === $getBook->language->name ) :?>

                                            <?php echo "selected"; ?>

                                          <?php endif; ?>
                                        
                                        ><?php echo $language->name; ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-4">
                                <?php foreach( $warehouses as $key => $warehouse ) :?>
                                    <div class="form-row">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="skladista" name="skladista[]" 
                                                
                                                    <?php foreach( $getBook->warehouses as $bookWarehouse ) :?>

                                                        <?php if( $warehouse->id === $bookWarehouse->id ) :?>

                                                            <?php echo "checked"; ?>

                                                        <?php endif; ?>

                                                    <?php endforeach; ?>

                                                value="<?php echo $warehouse->id; ?>">
                                                <label class="form-check-label" for="language">
                                                    <?php echo $warehouse->name; ?>
                                                </label>
                                            </div>
                                        </div>                                           
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-3">
                                <?php foreach( $warehouses as $warehouse ) :?>
                                    <div class="form-row">
                                        <div class="col-12">
                                        
                                            <input type="text" name="broj_kopija[]" id="broj_kopija" class="form-control" 
                            
                                            <?php foreach( $getBook->warehouses as $bookWarehouse ) :?>

                                                <?php if( $warehouse->id === $bookWarehouse->id ) :?>

                                                    value="<?php echo $bookWarehouse->number_of_book_copies; ?>"

                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                            
                                            placeholder="Broj kopija">

                                        </div>     
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Ostali podaci: </label>
                    <div class="col-9">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-6"><label for="šifra">Šifra: </label></div>
                                <div class="col-6"><label for="cena">Cena: </label></div>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="šifra" name="šifra" value="<?php echo $getBook->isbn; ?>" placeholder="Šifra knjige" readonly >
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="cena" name="cena" value="<?php echo $getBook->price; ?>" placeholder="Cena">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-6">
                                    <label for="format">Format: </label>
                                    <input type="text" class="form-control" id="format" name="format" value="<?php echo $getBook->format; ?>" placeholder="13 x 12">
                                </div>
                                <div class="col-6">
                                    <label for="broj_strana">Broj strana: </label>
                                    <input type="text" class="form-control" id="broj_strana" name="broj_strana" value="<?php echo $getBook->page_number; ?>" placeholder="Broj strana">
                                </div>
                            </div>        
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-6">
                                    <label for="pismo">Pismo: </label>
                                    <input type="text" name="pismo" id="pismo" class="form-control" value="<?php echo $getBook->letter; ?>" placeholder="latinica">
                                </div>
                                <div class="col-6">
                                    <label for="povez">Povez: </label>
                                    <input type="text" name="povez" id="povez" class="form-control" value="<?php echo $getBook->binding; ?>" placeholder="tvrd">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="o_knjizi">O knjizi: </label>
                            <textarea name="o_knjizi" id="o_knjizi" rows="5" class="w-100 form-control" placeholder="Ukratko o knjizi"><?php echo $getBook->about_book; ?></textarea>
                        </div>
                       <div class="form-group">
                            <label for="godina_izdanja">Godina izdanja: </label>
                            <input type="text" name="godina_izdanja" id="godina_izdanja" class="form-control" value="<?php echo $getBook->year_of_publish; ?>" placeholder="izaberite godinu">
                       </div>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="slika">Izaberi sliku: </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="file" class="form-control-file" id="slika" name="slika" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="fajl">Izaberi Fajl: </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="file" class="form-control-file" id="fajl" name="fajl" >
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="update" class="btn btn-primary mb-5" value="Izmeni Knjigu">
                </div>
            </form>

        </div>
    </div>


</div>



<?php include '../../include/footer.php';?>


<script>
    
    $( function() {
        $( "#godina_izdanja" ).datepicker({
        changeMonth: true,
        changeYear: true
        });
    } );

    // let checkBoxes = document.querySelectorAll('#skladista');

    // checkBoxes.forEach(function(el){

    //     el.value = "";
    //     console.log(el);
    // })

</script>




