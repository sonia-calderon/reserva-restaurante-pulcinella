<?php
    $title = "Pulcinella Trattoria  - Cancelación de Reserva";
    include "./templates/header.php";  
?>

<main class="main-confirmation">
    <section class="section-confirmation">
        <div class="top">
            <img src="./img/pulcinella-logo-black.png" alt="" class="logo-pulcinella-confirmation">  
        </div>
        <div class="main">
            <h1>Hemos cancelado tu reserva número <?php echo $_GET["uniqueId"]; ?></h1>
            <p>¡Esperamos verte pronto!</p>
            <div class="btns">
                <a href="./index.php" class="btn btn-confirmation" id="btn-new-reserve">Hacer una nueva reserva</a>
            </div>
        </div>
    </section>
</main>

<?php
    include "./templates/footer.html";  
?>