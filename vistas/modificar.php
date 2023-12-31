<?php require(__DIR__ . "/../modelos/modelo_ubicacion.php") ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="svg" sizes="32x32" href="../assets/imagenes/favicon.svg">
    <link rel="stylesheet" href="../assets/css/comun.css">
    <link rel="stylesheet" href="../assets/css/modificar.css">
    <script src="../assets/js/libraries/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script defer src="../assets/js/modificar.js"></script>
    <title>Modificar Empleado</title>
</head>
<body>
    <nav class="dashboard">
        <div class="logo-container">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M311.9 260.8L160 353.6 8 260.8 160 0l151.9 260.8zM160 383.4L8 290.6 160 512l152-221.4-152 92.8z"/></svg>
            <h1>Dashboard</h1>
        </div>
        <ul class="pages-container">
            <li class="page registrar" onclick="window.location.href = '../index.php'">
                <svg viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.05 8.32799C5.53922 8.32799 6.75 7.11721 6.75 5.628C6.75 4.13879 5.53922 2.92801 4.05 2.92801C2.56078 2.92801 1.35 4.13879 1.35 5.628C1.35 7.11721 2.56078 8.32799 4.05 8.32799ZM22.95 8.32799C24.4392 8.32799 25.65 7.11721 25.65 5.628C25.65 4.13879 24.4392 2.92801 22.95 2.92801C21.4608 2.92801 20.25 4.13879 20.25 5.628C20.25 7.11721 21.4608 8.32799 22.95 8.32799ZM24.3 9.67798H21.6C20.8575 9.67798 20.1867 9.97751 19.6973 10.4627C21.3975 11.395 22.6041 13.0783 22.8656 15.078H25.65C26.3967 15.078 27 14.4747 27 13.728V12.378C27 10.8888 25.7892 9.67798 24.3 9.67798ZM13.5 9.67798C16.1114 9.67798 18.225 7.5644 18.225 4.953C18.225 2.34161 16.1114 0.228027 13.5 0.228027C10.8886 0.228027 8.775 2.34161 8.775 4.953C8.775 7.5644 10.8886 9.67798 13.5 9.67798ZM16.74 11.028H16.3898C15.5123 11.4498 14.5378 11.703 13.5 11.703C12.4622 11.703 11.4919 11.4498 10.6102 11.028H10.26C7.57688 11.028 5.4 13.2048 5.4 15.8879V17.1029C5.4 18.2209 6.30703 19.1279 7.425 19.1279H19.575C20.693 19.1279 21.6 18.2209 21.6 17.1029V15.8879C21.6 13.2048 19.4231 11.028 16.74 11.028ZM7.30266 10.4627C6.81328 9.97751 6.1425 9.67798 5.4 9.67798H2.7C1.21078 9.67798 0 10.8888 0 12.378V13.728C0 14.4747 0.603281 15.078 1.35 15.078H4.13016C4.39594 13.0783 5.6025 11.395 7.30266 10.4627Z" fill="#DDE2FF"/></svg>
                <a href="../index.php">Registrar Empleado</a>
            </li>
            <li class="page modificar active" onclick="window.location.href = 'modificar.php'">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.475 0.713109C19.5242 -0.237703 17.9873 -0.237703 17.0365 0.713109L15.7296 2.01559L19.9801 6.26602L21.2869 4.9592C22.2377 4.00839 22.2377 2.47146 21.2869 1.52065L20.475 0.713109ZM7.48493 10.2646C7.22009 10.5295 7.01603 10.8551 6.89881 11.2155L5.6137 15.0708C5.48779 15.4442 5.58765 15.8566 5.86551 16.1388C6.14337 16.421 6.55582 16.5166 6.93354 16.3906L10.7889 15.1055C11.1449 14.9883 11.4705 14.7843 11.7397 14.5194L19.0032 7.25157L14.7484 2.99679L7.48493 10.2646ZM4.16794 2.54961C1.86689 2.54961 0 4.4165 0 6.71755V17.8321C0 20.1331 1.86689 22 4.16794 22H15.2825C17.5835 22 19.4504 20.1331 19.4504 17.8321V13.6641C19.4504 12.8957 18.8295 12.2748 18.0611 12.2748C17.2926 12.2748 16.6718 12.8957 16.6718 13.6641V17.8321C16.6718 18.6005 16.0509 19.2214 15.2825 19.2214H4.16794C3.39948 19.2214 2.77863 18.6005 2.77863 17.8321V6.71755C2.77863 5.94909 3.39948 5.32824 4.16794 5.32824H8.33588C9.10435 5.32824 9.7252 4.70739 9.7252 3.93892C9.7252 3.17046 9.10435 2.54961 8.33588 2.54961H4.16794Z" fill="#A4A6B3"/></svg>
                <a href="modificar.php">Modificar Empleado</a>
            </li>
            <li class="page planilla" onclick="window.location.href = 'planilla.php'">
                <svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 2.55556V20.4444C0 21.1222 0.269245 21.7722 0.748505 22.2515C1.22776 22.7308 1.87778 23 2.55556 23H20.4444C21.1222 23 21.7722 22.7308 22.2515 22.2515C22.7308 21.7722 23 21.1222 23 20.4444V2.55556C23 1.87778 22.7308 1.22776 22.2515 0.748505C21.7722 0.269245 21.1222 0 20.4444 0H2.55556C1.87778 0 1.22776 0.269245 0.748505 0.748505C0.269245 1.22776 0 1.87778 0 2.55556ZM8.94444 5.11111H19.1667V7.66667H8.94444V5.11111ZM8.94444 10.2222H19.1667V12.7778H8.94444V10.2222ZM8.94444 15.3333H19.1667V17.8889H8.94444V15.3333ZM3.83333 5.11111H6.38889V7.66667H3.83333V5.11111ZM3.83333 10.2222H6.38889V12.7778H3.83333V10.2222ZM3.83333 15.3333H6.38889V17.8889H3.83333V15.3333Z" fill="#A4A6B3"/></svg>
                <a href="planilla.php">Planilla</a>
            </li>
        </ul>
    </nav>
    <main>
        <form>
            <h1>Modificar Empleado</h1>
            <div class="row">
                <div class="column">
                    <label for="input-cedula">Cedula</label>
                    <input type="text" name="input-cedula" id="input-cedula">
                </div>
                <div class="column">
                    <label class="label-modificar"></label>
                    <button id="button-buscar">Buscar</button>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="select-genero">Género</label>
                    <select name="select-genero" id="select-genero">
                        <option value="M" selected>Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="select-estado-civil">Estado Civil</label>
                    <select name="select-estado-civil" id="select-estado-civil">
                        <option value="SOLTERO" selected>Soltero</option>
                        <option value="CASADO">Casado</option>
                        <option value="VIUDO">Viudo</option>
                        <option value="DIVORCIADO">Divorciado</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="">Nombre</label>
                    <input type="text" name="input-nombre" id="input-nombre">
                </div>
                <div class="column">
                    <label for="">
                        <span>Segundo Nombre</span>
                        <span class="opcional">(opcional)</span>
                    </label>
                    <input type="text" name="input-segundo-nombre" id="input-segundo-nombre">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="">Apellido</label>
                    <input type="text" name="input-apellido" id="input-apellido">
                </div>
                <div class="column">
                    <label for="input-segundo-apellido">
                        <span>Segundo Apellido</span>
                        <span class="opcional">(opcional)</span>
                    </label>
                    <input type="text" name="input-segundo-apellido" id="input-segundo-apellido">
                </div>
                <div class="column">
                    <label for="input-apellido-casada" class="label-apellido-casada oculto">
                        <span>Apellido de Casada</span>
                        <span class="opcional">(opcional)</span>
                    </label>
                    <input type="text" name="input-apellido-casada" id="input-apellido-casada" class="oculto">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="input-fecha">Fecha de Nacimiento</label>
                    <input type="date" name="input-fecha" id="input-fecha">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="input-estatura">
                        <span>Estatura</span>
                        <span class="pista">(metros)</span>
                    </label>
                    <input type="text" name="input-estatura" id="input-estatura" class="numerico">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="input-peso">
                        <span>Peso</span>
                        <span class="pista">(libras)</span>
                    </label>
                    <input type="text" name="input-peso" id="input-peso" class="numerico">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="select-tipo-sangre">Tipo de Sangre</label>
                    <select name="select-tipo-sangre" id="select-tipo-sangre">
                        <option value="A+" selected>A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="">Condición Física</label>
                    <input type="text" name="input-condicion-fisica" id="input-condicion-fisica">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="select-pais" class="label-pais">País</label>
                    <select name="select-pais" id="select-pais">
                        <?php
                            $paises = obtenerPaises();
                            foreach ($paises as $pais) {
                                if ($pais == "Panamá") {
                                    echo "<option value=\"$pais\" selected>$pais</option>";
                                } else {
                                    echo "<option value=\"$pais\">$pais</option>";
                                }
                            }
                        ?>
                        <option value="" class="oculto"></option>
                    </select>
                </div>
                <div class="column">
                    <label for="select-provincia" class="label-provincia">Provincia</label>
                    <select name="select-provincia" id="select-provincia">
                        <?php
                            $provincias = obtenerProvinciasDePanama();
                            foreach ($provincias as $provincia) {
                                $nombre = $provincia["nombre_provincia"];
                                $codigo = $provincia["codigo_provincia"];
                                $nombre_formateado = ucwords(strtolower(mb_strtolower($nombre, 'UTF-8')));
                                if ($nombre == "PANAMA OESTE") {
                                    echo "<option value=\"$codigo\" selected>$nombre_formateado</option>";
                                } else {
                                    echo "<option value=\"$codigo\">$nombre_formateado</option>";
                                }
                            }
                        ?>
                        <option value="" class="oculto"></option>
                    </select>
                </div>
                <div class="column">
                    <label for="select-distrito" class="label-distrito">Distrito</label>
                    <select name="select-distrito" id="select-distrito">
                        <?php
                            $distritos = obtenerDistritosDeLaPronvincia("13");
                            foreach ($distritos as $distrito) {
                                $nombre = $distrito["nombre_distrito"];
                                $codigo = $distrito["codigo_distrito"];
                                $nombre_formateado = ucwords(strtolower(mb_strtolower($nombre, 'UTF-8')));
                                if ($nombre == "LA CHORRERA") {
                                    echo "<option value=\"$codigo\" selected>$nombre_formateado</option>";
                                } else {
                                    echo "<option value=\"$codigo\">$nombre_formateado</option>";
                                }
                            }
                        ?>
                        <option value="" class="oculto"></option>
                    </select>
                </div>
                <div class="column">
                    <label for="select-corregimiento" class="label-corregimiento">Corregimiento</label>
                    <select name="select-corregimiento" id="select-corregimiento">
                        <?php
                            $corregimientos = obtenerCorregimientosDelDistrito("1302");
                            foreach ($corregimientos as $corregimiento) {
                                $nombre = $corregimiento["nombre_corregimiento"];
                                $codigo = $corregimiento["codigo_corregimiento"];
                                $nombre_formateado = ucwords(strtolower(mb_strtolower($nombre, 'UTF-8')));
                                if ($nombre == "GUADALUPE") {
                                    echo "<option value=\"$codigo\" selected>$nombre_formateado</option>";
                                } else {
                                    echo "<option value=\"$codigo\">$nombre_formateado</option>";
                                }
                            }
                        ?>
                        <option value="" class="oculto"></option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="input-comunidad">Comunidad</label>
                    <input type="text" name="input-comunidad" id="input-comunidad">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="input-calle">
                        <span>Calle</span>
                        <span class="opcional">(opcional)</span>
                    </label>
                    <input type="text" name="input-calle" id="input-calle">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="input-casa">
                        <span>Casa</span>
                        <span class="opcional">(opcional)</span>
                    </label>
                    <input type="text" name="input-casa" id="input-casa">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="select-estado">Estado</label>
                    <select name="select-estado" id="select-estado">
                        <option value="1" selected>Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <button id="button-modificar" disabled>Modificar</button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>