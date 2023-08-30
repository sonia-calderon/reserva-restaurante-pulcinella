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
                        <input type="name" class="form-control" id="name" name="name" placeholder="Nombre" required>
                        <label for="floatingInput">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" id="lastname" name="lastname" placeholder="Apellidos" required>
                        <label for="floatingInput">Apellidos</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="hola@ejemplo.com" required>
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="numPeople" name="numPeople" required>
                            <option selected value="">Seleccione número de personas</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        <label for="floatingSelect">Número de personas</label>
                    </div>
                    <div class="form-floating row g-2 mb-3">
                        <div class="form-floating col-md">
                            <input type="date" class="form-control" id="date" name="date" placeholder="Fecha" required>
                            <label for="floatingInput">Fecha</label>
                        </div>
                        <div class="form-floating col-md">
                            <select class="form-select" id="time" name="time" required>
                                <option selected value="">Seleccione la hora</option>
                                <option value="13:00">13:00</option>
                                <option value="13:30">13:30</option>
                                <option value="14:00">14:00</option>
                                <option value="14:30">14:30</option>
                                <option value="15:00">15:00</option>
                                <option value="15:30">15:30</option>
                                <option value="20:00">20:00</option>
                                <option value="20:30">20:30</option>
                                <option value="21:00">21:00</option>
                                <option value="21:30">21:30</option>
                                <option value="22:00">22:00</option>
                                <option value="22:30">22:30</option>
                            </select>
                            <label for="floatingInput">Hora</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <button type="submit" class="btn button btn-primary" id="btn-reservar">Reservar</button>
                    </div>
                </form>    
            </div>
        </div>        
    </section>
</main>

<?php
    include "./templates/footer.html";  
?>