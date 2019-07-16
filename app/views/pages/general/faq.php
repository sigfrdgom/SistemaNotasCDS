<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';
?>

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"><?php echo $datos['titulo'] ?> &nbsp;</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            
            <!-- <div>
                <h1 class="main-title float-left"><?php echo $datos['titulo'] ?> &nbsp;</h1>
            </div> -->
           
        </div>
    </div>

    <div class='justify-content-center text-center ml-2 mr-2'>
    <div class='tab'>
    
    <button class='tablinks' onclick="openTab(event, 'usuarios')" id='defaultOpen'>Sobre usuarios</button>
    <button class='tablinks' onclick="openTab(event, 'participantes')">Sobre participantes</button>
    <button class='tablinks' onclick="openTab(event, 'cursos')">Sobre cursos</button>
    <button class='tablinks' onclick="openTab(event, 'modulos')">Sobre módulos</button>
    <button class='tablinks' onclick="openTab(event, 'matricula')">Sobre matrícula</button>
    <button class='tablinks' onclick="openTab(event, 'notas')">Sobre notas</button>
    <button class='tablinks' onclick="openTab(event, 'otros')">Otros</button>
    </div>
    
 
    <div id='usuarios' class='tabcontent'>
      <h3>Usuarios</h3>
        <button class='accordion'>Nuevo &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde se puede agregar un nuevo usuario, ya sea que se agregue un nuevo docente o se quiera agregar un administrador
        y la información personal de esté. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b>Id usuario</b> se encuentra el ID del usuario a ingresar. <br> En el campo de <b>Nombres del Docente</b> se agregará los nombres del docente o administrador. <br>
        En el campo de <b>Apellidos del Docente</b> se agregará los apellidos del docente o administrador. <br> En el campo de <b>Fecha de nacimiento del Docente</b>
        el formato es : Día/Mes/Año. <br> En el campo de <b>Sexo del Docente</b> selecionará el género del docente o administrador. <br> Los campos <b>DUI del Docente</b> y
        <b>NIT del Docente</b> al menos uno de ellos tiene que ser agregados. <br> En el campo de <b>Especialidad del docente</b> se agregará la especialidad del docente o el administrador. <br>
        En el campo <b>Tipo de usuario</b> es donde se selecciona si el usuario es docente o administrador. <br> En los últimos dos campos se ingresará
        la contraseña del docente o administrador.</p>
        </div>
        <button class='accordion'>Detalles &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado se muestran todos los datos personales del docente o administrador.</p>
        </div>
        
        <button class='accordion'>Dar de baja &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede eliminar a un docente
        ya registrado o si él mismo desea borrar su propio registro.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>este apartado es donde el administrador puede modificar los datos de un docente o de él mismo solo si es necesario
        o por que existió un error al momento de ingresar un dato de un docente o de él mismo.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede guardar los cambios realizados en algún dato del docente o de él mismo
        si es que los ha modificados.</p>
        </div>
    </div>
    <div id='participantes' class='tabcontent'>
      <h3>Participantes</h3>
      <button class='accordion'>Nuevo &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede agregar un nuevo participante incluyendo su información personal. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b>Id participante</b> se encuentra el ID del participante a ingresar. 
        <br> En el campo de <b>Nombres del participante</b> se agregará los nombres del participante. <br>
        En el campo de <b>Apellidos del participante</b> se agregará los apellidos del participante. <br> En el campo <b>Fecha de nacimiento del participante</b> 
        el formato es : Día/Mes/Año. <br> En el campo de <b>Sexo del participante</b> selecionará el género del participante. <br> Los campos <b>DUI del participante</b>,
        <b>Carnet de minoridad del participante</b> y<b>NIT</b> al menos uno de ellos tiene que ser agregado. <br>
        En el campo de <b>Dirección del participante</b> se agregará la dirección de residencia del participante. <br>
        En el campo Teléfono del participante se agregará el número del teléfono del participante. <br>
        En el campo de <b>Email del participante</b> se agregará un Email existente del participante. <br> En los campos de <b>Ingresa un password para el participante</b>
        y <b>Confirma el password para el participante</b>, se ingresará la contraseña que utilizará el participante. <br> En el campo
        de <b>Estado del participante</b> se seleccionará el estado del participante, ya sea que se encuentre activo o se encuentre inactivo. <br> En la sección de <b>Matricula</b>,
        seleccionará los <b>Cursos disponibles</b>, <b>el Estado de la matricula (ACTIVA O INACTIVA)</b> y las Observaciones sobre la matricula</b></p>
        </div>
        <button class='accordion'>Detalles &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado se muestran todos los datos personales del particpante.</p>
        </div>
        
        <button class='accordion'>Dar de baja &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda dar de baja a un participante ingresado.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos del participante si en un caso el participante
        modifica algún documento de él.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en algún dato del participante
        si es que los ha modificados.</p>
        </div>
    </div>
    <div id='cursos' class='tabcontent'>
      <h3>Cursos</h3>
      <button class='accordion'>Nuevo &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede agregar un nuevo participante incluyendo su información personal. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> Id del curso </b> se encuentra el ID del curso a ingresar. 
        <br> En el campo de <b>Nombre del curso</b> se agregará el nombre del curso. <br>
        En el campo de <b>Cohorte</b> se agregará el cohorte que pertenece. <br> En el campo <b>Descripción del curso</b> 
        se agregará una descripción del curso. <br> En el campo de <b>Duración del curso</b> se agregará la duración del curso. <br>
        En el campo de <b>Sede</b> se agregará la sede de pertenencia. <br>
        En el campo de <b>Estado del curso</b> se seleccionará el estado del curso (ACTIVO O INACTIVO). <br> En el campo <b>Nivel del curso</b> se seleccionará 
        el nivel del curso (NIVEL 1, NIVEL 2 Y NIVEL 3).</p>
        </div>
        <button class='accordion'>Detalles &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado se muestran todos los datos que se ingresaron al registrar un nuevo curso.</p>
        </div>
        
        <button class='accordion'>Dar de baja &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda dar de baja a un curso ingresado.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos de un curso agregado .</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en el curso
        si es que fueron modificados.</p>
        </div>
        <button class='accordion'>Ver modulos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede ver los módulos inscritos dentro del curso seleccionado.</p>
        </div>
    </div>
    <div id='modulos' class='tabcontent'>
      <h3>Módulos</h3>
      <button class='accordion'>Nuevo Módulo &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede agregar un nuevo módulo. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> Nombres del módulo </b> se encuentran los nombres del módulo. 
        <br> En el campo de <b>Descripción del módulo</b> se agregará una descripción breve del módulo. <br>
        En el campo de <b>Horas del módulo</b> se agregará las horas del módulo. <br>En el campo <b>Tipos de módulos</b> se seleccionara el módulo. 
        <br> En el campo <b>Cantidad de evaluaciones</b> se agregará las cantidad de evaluaciones que quieran ser ingresadas. </p>
        </div>
        <button class='accordion'>Detalles &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado se muestran todos los datos del módulo que fue ingresado.</p>
        </div>
        
        <button class='accordion'>Dar de baja &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda dar de baja al módulo ingresado.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos del módulo ingresado.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en el módulo
        si es que fueron modificados.</p>
        </div>
    </div>
    <div id='matricula' class='tabcontent'>
      <h3>Matricula</h3>
      <button class='accordion'>Nuevo &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede agregar una matricula. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> ID del participante </b> se selecciona el ID del participante matriculado. 
        <br> En el campo de <b>Cursos disponibles</b> se seleccionará el curso. <br>
        En el campo de <b>Estado de matricula</b> se seleccionará el estado de la matricula (ACTIVA O INACTIVA). <br> En el campo <b>Observaciones de matricula</b> 
        se agregará las observaciones en la matricula si es que las hay.</p>
        </div>
        <button class='accordion'>Detalles &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado se muestran todos los datos de la matricula.</p>
        </div>
        
        <button class='accordion'>Dar de baja &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda dar de baja a la matricula.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos de la matricula.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en la matricula
        si es que fue modificada.</p>
        </div>
    </div>
    <div id='notas' class='tabcontent'>
     <h3>Notas</h3>
        <button class='accordion'>Nueva Nota &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede agregar una nota. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> Nota a agregar </b> se agrega una nota. 
        <br> En el campo de <b>Nota final</b> se agrega la nota final. <br>
        En el campo de <b>Fecha de nacimiento del Docente</b> el formato es : Día/Mes/Año. <br> En el campo de <b>Sexo del Docente</b>
        se selecionará el género del docente. <br> Los campos <b>DUI del Docente</b> y
        <b>NIT del Docente</b> al menos uno de ellos tiene que ser agregados. <br> En el campo de <b>Especialidad del docente</b> se agregará la especialidad del docente o el administrador. <br>
        En el campo <b>Tipo de usuario</b> es donde se selecciona si el usuario es docente o administrador. <br> En los ultimos dos campos se ingresará
        la contraseña del docente o administrador.</p>
        </div>
        <button class='accordion'>Detalles &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado se muestran todos los datos de la matricula.</p>
        </div>
        
        <button class='accordion'>Dar de baja &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda dar de baja a la matricula.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos de la matricula.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en la matricula
        si es que fue modificada.</p>
        </div>
        <button class='accordion'>Reportes &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede imprimir un reporte en formato PDF con los 
          resultados obtenidos por el participante y un desglose de cada modulo y notas del curso.</p>
        </div>
    </div>
    <div id='otros' class='tabcontent'>
      <h3>Otros</h3>
        <button class='accordion'>Login &#9660;</button>
        <div class='panel'>
        <p class='text-left'>Es el formulario que le permitirá al usuario hacer uso del sistema, este puede ingresar 
        usando su número de DUI y su respectiva contraseña.</p>
        </div>
        
        <button class='accordion'>Acerca de &#9660;</button>
        <div class='panel'>
        <p class='text-left'>El apartado con la información general del sistema, lo que busca solucionar e 
        información sobre el desarrollo del mismo.</p>
        </div>
        <button class='accordion'>Buscar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>El control siempre presente en la barra superior para realizar búsquedas sobre las vistas en las que esté disponible la función.</p>
        </div>
    </div>
   
    <!-- <div id='usuarios' class='tabcontent'>
      <h3>Usuarios</h3>
        <button class='accordion'>Nuevo &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde se puede agregar un nuevo usuario, ya sea que se agregue un nuevo docente o se quiera agregar un administrador
        y la información personal de esté. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b>Id usuario</b> se encuentra el ID del usuario a ingresar. <br> En el campo de <b>Nombres del Docente</b> se agregará los nombres del docente o administrador. <br>
        En el campo de <b>Apellidos del Docente</b> se agregará los apellidos del docente o administrador. <br> En el campo de <b>Fecha de nacimiento del Docente</b>
        el formato es : Día/Mes/Año. <br> En el campo de <b>Sexo del Docente</b> selecionará el género del docente o administrador. <br> Los campos <b>DUI del Docente</b> y
        <b>NIT del Docente</b> al menos uno de ellos tiene que ser agregados. <br> En el campo de <b>Especialidad del docente</b> se agregará la especialidad del docente o el administrador. <br>
        En el campo <b>Tipo de usuario</b> es donde se selecciona si el usuario es docente o administrador. <br> En los últimos dos campos se ingresará
        la contraseña del docente o administrador.</p>
        </div>
        <button class='accordion'>Detalles &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado se muestran todos los datos personales del docente o administrador.</p>
        </div>
        
        <button class='accordion'>Dar de baja &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede eliminar a un docente
        ya registrado o si él mismo desea borrar su propio registro.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>este apartado es donde el administrador puede modificar los datos de un docente o de él mismo solo si es necesario
        o por que existió un error al momento de ingresar un dato de un docente o de él mismo.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede guardar los cambios realizados en algún dato del docente o de él mismo
        si es que los ha modificados.</p>
        </div>
    </div>
    <div id='participantes' class='tabcontent'>
      <h3>Participantes</h3>
      <button class='accordion'>Nuevo &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede agregar un nuevo participante incluyendo su información personal. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b>Id participante</b> se encuentra el ID del participante a ingresar. 
        <br> En el campo de <b>Nombres del participante</b> se agregará los nombres del participante. <br>
        En el campo de <b>Apellidos del participante</b> se agregará los apellidos del participante. <br> En el campo <b>Fecha de nacimiento del participante</b> 
        el formato es : Día/Mes/Año. <br> En el campo de <b>Sexo del participante</b> selecionará el género del participante. <br> Los campos <b>DUI del participante</b>,
        <b>Carnet de minoridad del participante</b> y<b>NIT</b> al menos uno de ellos tiene que ser agregado. <br>
        En el campo de <b>Dirección del participante</b> se agregará la dirección de residencia del participante. <br>
        En el campo Teléfono del participante se agregará el número del teléfono del participante. <br>
        En el campo de <b>Email del participante</b> se agregará un Email existente del participante. <br> En los campos de <b>Ingresa un password para el participante</b>
        y <b>Confirma el password para el participante</b>, se ingresará la contraseña que utilizará el participante. <br> En el campo
        de <b>Estado del participante</b> se seleccionará el estado del participante, ya sea que se encuentre activo o se encuentre inactivo. <br> En la sección de <b>Matricula</b>,
        seleccionará los <b>Cursos disponibles</b>, <b>el Estado de la matricula (ACTIVA O INACTIVA)</b> y las Observaciones sobre la matricula</b></p>
        </div>
        <button class='accordion'>Detalles &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado se muestran todos los datos personales del particpante.</p>
        </div>
        
        <button class='accordion'>Dar de baja &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda dar de baja a un participante ingresado.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos del participante si en un caso el participante
        modifica algún documento de él.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en algún dato del participante
        si es que los ha modificados.</p>
        </div>
    </div>
    <div id='cursos' class='tabcontent'>
      <h3>Cursos</h3>
      <button class='accordion'>Nuevo &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede agregar un nuevo participante incluyendo su información personal. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> Id del curso </b> se encuentra el ID del curso a ingresar. 
        <br> En el campo de <b>Nombre del curso</b> se agregará el nombre del curso. <br>
        En el campo de <b>Cohorte</b> se agregará el cohorte que pertenece. <br> En el campo <b>Descripción del curso</b> 
        se agregará una descripción del curso. <br> En el campo de <b>Duración del curso</b> se agregará la duración del curso. <br>
        En el campo de <b>Sede</b> se agregará la sede de pertenencia. <br>
        En el campo de <b>Estado del curso</b> se seleccionará el estado del curso (ACTIVO O INACTIVO). <br> En el campo <b>Nivel del curso</b> se seleccionará 
        el nivel del curso (NIVEL 1, NIVEL 2 Y NIVEL 3).</p>
        </div>
        <button class='accordion'>Detalles &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado se muestran todos los datos que se ingresaron al registrar un nuevo curso.</p>
        </div>
        
        <button class='accordion'>Dar de baja &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda dar de baja a un curso ingresado.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos de un curso agregado .</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en el curso
        si es que fueron modificados.</p>
        </div>
        <button class='accordion'>Ver modulos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede ver los módulos inscritos dentro del curso seleccionado.</p>
        </div>
    </div>
    <div id='modulos' class='tabcontent'>
      <h3>Módulos</h3>
      <button class='accordion'>Nuevo Módulo &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede agregar un nuevo módulo. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> Nombres del módulo </b> se encuentran los nombres del módulo. 
        <br> En el campo de <b>Descripción del módulo</b> se agregará una descripción breve del módulo. <br>
        En el campo de <b>Horas del módulo</b> se agregará las horas del módulo. <br>En el campo <b>Tipos de módulos</b> se seleccionara el módulo. 
        <br> En el campo <b>Cantidad de evaluaciones</b> se agregará las cantidad de evaluaciones que quieran ser ingresadas. </p>
        </div>
        <button class='accordion'>Detalles &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado se muestran todos los datos del módulo que fue ingresado.</p>
        </div>
        
        <button class='accordion'>Dar de baja &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda dar de baja al módulo ingresado.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos del módulo ingresado.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en el módulo
        si es que fueron modificados.</p>
        </div>
    </div>
    <div id='matricula' class='tabcontent'>
      <h3>Matricula</h3>
      <button class='accordion'>Nuevo &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede agregar una matricula. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> ID del participante </b> se selecciona el ID del participante matriculado. 
        <br> En el campo de <b>Cursos disponibles</b> se seleccionará el curso. <br>
        En el campo de <b>Estado de matricula</b> se seleccionará el estado de la matricula (ACTIVA O INACTIVA). <br> En el campo <b>Observaciones de matricula</b> 
        se agregará las observaciones en la matricula si es que las hay.</p>
        </div>
        <button class='accordion'>Detalles &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado se muestran todos los datos de la matricula.</p>
        </div>
        
        <button class='accordion'>Dar de baja &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda dar de baja a la matricula.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos de la matricula.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en la matricula
        si es que fue modificada.</p>
        </div>
    </div>
    <div id='notas' class='tabcontent'>
     <h3>Notas</h3>
        <button class='accordion'>Nuevo Nota &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede agregar una nota. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> Nota a agregar </b> se agrega una nota. 
        <br> En el campo de <b>Nota final</b> se agrega la nota final. <br>
        En el campo de <b>Fecha de nacimiento del Docente</b> el formato es : Día/Mes/Año. <br> En el campo de <b>Sexo del Docente</b>
        se selecionará el género del docente. <br> Los campos <b>DUI del Docente</b> y
        <b>NIT del Docente</b> al menos uno de ellos tiene que ser agregados. <br> En el campo de <b>Especialidad del docente</b> se agregará la especialidad del docente o el administrador. <br>
        En el campo <b>Tipo de usuario</b> es donde se selecciona si el usuario es docente o administrador. <br> En los ultimos dos campos se ingresará
        la contraseña del docente o administrador.</p>
        </div>
        <button class='accordion'>Detalles &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado se muestran todos los datos de la matricula.</p>
        </div>
        
        <button class='accordion'>Dar de baja &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda dar de baja a la matricula.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos de la matricula.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en la matricula
        si es que fue modificada.</p>
        </div>
        <button class='accordion'>Reportes &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede imprimir un reporte en formato PDF con los 
          resultados obtenidos por el participante y un desglose de cada modulo y notas del curso.</p>
        </div>
    </div>
    <div id='otros' class='tabcontent'>
      <h3>Otros</h3>
        <button class='accordion'>Login &#9660;</button>
        <div class='panel'>
        <p class='text-left'>Es el formulario que le permitirá al usuario hacer uso del sistema, este puede ingresar 
        usando su número de DUI y su respectiva contraseña.</p>
        </div>
        
        <button class='accordion'>Acerca de &#9660;</button>
        <div class='panel'>
        <p class='text-left'>El apartado con la información general del sistema, lo que busca solucionar e 
        información sobre el desarrollo del mismo.</p>
        </div>
        <button class='accordion'>Buscar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>El control siempre presente en la barra superior para realizar búsquedas sobre las vistas en las que esté disponible la función.</p>
        </div>
    </div>
     -->
</div>


<script>
    function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName('tabcontent');
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = 'none';
    }
    tablinks = document.getElementsByClassName('tablinks');
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(' active', '');
    }
    document.getElementById(tabName).style.display = 'block';
    evt.currentTarget.className += ' active';
    }
    // Get the element with id='defaultOpen' and click on it
    document.getElementById('defaultOpen').click();
    var acc = document.getElementsByClassName('accordion');
    var i;
    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener('click', function() {
        this.classList.toggle('activex');
        var panel = this.nextElementSibling;
        if (panel.style.display === 'block') {
        panel.style.display = 'none';
        } else {
        panel.style.display = 'block';
        }
    });
    }
</script>


<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>