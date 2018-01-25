<?php include('./load/head.php'); ?>

<body class="bg-light" >
    <!-- top logo -->
    <?php include('./components/logo.php'); ?>
    <!-- NAV -->
    <section class="container navigation-section">
        <?php include('./components/navigation.php'); ?>    
    </section>
    
    <!-- Main -->
    <section class="container item-container">
        <?php require('./php/dbConnection.php'); 
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            } else { $id = 1; } 
            
            //create query
            $query = 'SELECT * FROM prekes WHERE id='.$id.'';

            //Get result in a msqla obj
            $result = mysqli_query($conn, $query);
            
            //fetch row by row
            $preke = mysqli_fetch_assoc($result);

            //free result
            mysqli_free_result($result);
            
            // close connection
            mysqli_close($conn);
        ?>

        <article class="row color-dark-grey d-flex mt-5">
            <!-- image column -->
            <div class="col-lg-6 pic-container position-relative">
                <p class="sale bg-dark text-light blockquote text-uppercase position-absolute px-1">
                <?php   if ($preke['sale']) {
                            echo "išpardavimas";    
                        }?>
                </p>
                <img class="rounded img-fluid" src="./img/pard/<?php echo $preke['image']?>.jpg" alt="sapnų gaudyklės nuotrauka"> </div>
            <!-- Text column -->
            <div class="col-lg-6">
                <!-- Pavadinimas -->
                <div class="item-name-container ">
                    <h4 class="h2 bg-light" ><?php echo $preke['pavadinimas']?></h4>
                </div>
                <!-- kaina -->
                <div class="price-container bg-light h4 mb-3"><p>
                <?php if ($preke['sale']) {
                    echo '<s class="text-muted">'.$preke['kaina_buvusi'].' eur</s>'; } ?>    
                <?php echo $preke['kaina']?> eur</p></div>
                <!-- Matmenys -->
                <div class="row bg-grey  matmenys-container">
                    <div class="col-4">
                        <p><strong> Matmenys: </strong></p>
                    </div>
                    <div class="col">
                        <p>ilgis: <?php echo $preke['ilgis']?>cm</p>
                        <p>skersmuo: <?php echo $preke['skersmuo']?>cm</p>
                    </div>
                </div>
                <!-- Medziagos -->
                <div class="row medziagos-container bg-light">
                    <div class="col-4">
                    <div><p><strong> Medžiagos: </strong></p></div>    
                    </div>
                    <div class="col">
                        <p><?php echo $preke['medziagos_1']?></p>
                        <p><?php echo $preke['medziagos_2']?></p>
                    </div>
                </div>
                <!-- buy button -->
                <div class="to-cart-container bg-grey row">
                    <div class="col-lg-12">
                        <!-- Button trigger modal -->
                        <button class="btn btn-dark btn-lg blockquote mt-3" data-toggle="modal" data-target="#pirkti_forma">pirkti</button>
                    </div>
                </div>    
            </div>
        </article>
        
    
    
       

        <!-- Modal -->
        <div class="modal fade" id="pirkti_forma" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Įsigyti šią sapnų gaudyklę</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <p>Norėdami įsigyti šią sapnų gaudyklę, perveskite bankiniu pavedimu 20 eur į saskaitą LT9000000444555. Gaudyklė bus jums išsiųsta iškarto gavus pavedimą. Užpildykite rezervacijos lentelę</p> 
                    <!-- form -->
                    <div class="form-group">
                        <input type="text" name="vardas" id="" class="form-control form-control-lg" placeholder="Vardas Pavardė">
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="tel" name="telefonas" id="" class="form-control form-control-lg" placeholder="telefonas">
                        </div>
                        <div class="col">
                            <input type="email" name="elpastas" id="" class="form-control form-control-lg" required  placeholder="el. paštas">
                        </div>
                    </div>
               
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Rezervuoti gaudyklę</button>
            </div>
            </div>
        </div>
        </div>
    

<div class="height-20v"></div>
<!-- <div class="div-row-long my-3 mx-auto"> </div> -->

    </section>
    
    
    
    
    
    
    <!-- Footer and scripts -->
    <?php include('./components/footer.php'); ?>    

    
    
  
    <script src="./js/script.js"></script>
</body>
</html>