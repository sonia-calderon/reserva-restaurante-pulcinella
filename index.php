<?php
    $title = "Pulcinella Trattoria - Reservas";
    include "./templates/header.php";  
?>

<main>
    <section class="section">
        <div class="left"></div>
        <div class="right">
            <div class="box">
                <img src="./img/pulcinella-logo.png" alt="" class="logo-pulcinella">
                <form action="./php/controller.php" class="form" method="POST">
                    <?php
                    srand ((double) microtime() * 1000000);
                    $random = rand(1000,9999);
                    ?>
                    <input type="hidden" id="hidden" value="<?php echo $random; ?>" name="uniqueId">
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" id="name" name="name" placeholder="Nombre">
                        <label for="floatingInput">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" id="lastname" name="lastname" placeholder="Apellidos">
                        <label for="floatingInput">Apellidos</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="hola@ejemplo.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="numPeople" name="numPeople">
                            <option selected>Seleccione número de personas</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <label for="floatingSelect">Número de personas</label>
                    </div>
                    <div class="form-floating row g-2 mb-3">
                        <div class="form-floating col-md">
                            <input type="date" class="form-control" id="date" name="date" placeholder="Fecha">
                            <label for="floatingInput">Fecha</label>
                        </div>
                        <div class="form-floating col-md">
                            <input type="time" class="form-control" id="time" name="time" placeholder="Hora">
                            <label for="floatingInput">Hora</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <button type="submit" class="btn btn-primary" id="btn-reservar">Reservar</button>
                    </div>
                </form>
                
            </div>
        </div>        
    </section>
</main>

<?php
    include "./templates/footer.html";  
?>