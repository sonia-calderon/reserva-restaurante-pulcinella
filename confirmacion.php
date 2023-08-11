<?php
    $title = "Pulcinella Trattoria  - Confirmación de Reserva";
    include "./templates/header.php";  
?>

<main class="main-confirmation">
    <section class="section-confirmation">
        <div class="top">
            <img src="./img/pulcinella-logo-black.png" alt="" class="logo-pulcinella-confirmation">  
        </div>
        <div class="main">
            <h1>Gracias por reservar, <?php echo $_GET["name"]; ?></h1>
            <p>Podrás disfrutar de tu mesa para <?php echo $_GET["numPeople"]; ?> personas el día <?php echo $_GET["date"]; ?> a las <?php echo $_GET["time"]; ?></p>
            <p>¡Nos vemos pronto!</p>
            <div class="btns">
                <a href="./modificar.php?id=<?php echo $_GET["uniqueId"]; ?>" class="btn button btn-confirmation">Modificar Reserva</a>
                <!--<a href="#" class="btn btn-confirmation cancelation" id="btn-cancelar">Cancelar Reserva</a>-->
                <button type="button" class="btn button btn-confirmation cancelation" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="btn-cancelar">Cancelar Reserva</button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Estás a punto de cancelar tu reserva</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-confirmation cancelation" data-bs-dismiss="modal">Volver</button>
                        <button type="button" class="btn btn-confirmation cancelation" id="cancel">Cancelar Reserva</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
    include "./templates/footer.html";  
?>