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
                <a href="./modificar.php?id=<?php echo $_GET["uniqueId"]; ?>" class="btn btn-confirmation">Modificar Reserva</a>
                <a href="#" class="btn btn-confirmation cancelation" id="btn-cancelar">Cancelar Reserva</a>
            </div>
        </div>
        <!-- The Modal -->
        <div id="modal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Estás a punto de cancelar tu reserva</p>
                <div class="btns">
                    <a href="#" class="btn btn-confirmation cancelation" id="back">Volver</a>
                    <a href="#" class="btn btn-confirmation cancelation" id="cancel">Cancelar Reserva</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
    include "./templates/footer.html";  
?>