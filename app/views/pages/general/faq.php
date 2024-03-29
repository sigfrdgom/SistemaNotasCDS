<?php
/*Importacion de Header de la aplicacion*/
// require_once RUTA_APP . '/views/include/header.php';
require_once RUTA_APP . '/views/include/headerPadre.php';
?>

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <div class="text-center breadcrumb-holder mt-2 pb-2 border-info border">
                        <h1 class="main-title">Preguntas y respuestas frecuentes sobre Sistema de Notas CDS &nbsp;</h1>
                </div>
    
    <div class='justify-content-center text-center ml-2 mr-2'  style="height: 100%">
    <div class='tab'>
    
    <button class='tablinks' onclick="openTab(event, 'guia')" id='defaultOpen'><p class="ml-2 my-0 font-weight-bold">Guia de inicio rapido</p></button>
    <button class='tablinks' onclick="openTab(event, 'usuarios')" ><p class="ml-2 my-0 font-weight-bold">Sobre usuarios</p></button>
    <button class='tablinks' onclick="openTab(event, 'participantes')"><p class="ml-2 my-0 font-weight-bold">Sobre participante</p></button>
    <button class='tablinks' onclick="openTab(event, 'cursos')"><p class="ml-2 my-0 font-weight-bold">Sobre cursos</p></button>
    <button class='tablinks' onclick="openTab(event, 'modulos')"><p class="ml-2 my-0 font-weight-bold">Sobre módulos</p></button>
    <button class='tablinks' onclick="openTab(event, 'matricula')"><p class="ml-2 my-0 font-weight-bold">Sobre matrícula</p></button>
    <button class='tablinks' onclick="openTab(event, 'notas')"><p class="ml-2 my-0 font-weight-bold">Sobre notas</p></button>
    <button class='tablinks' onclick="openTab(event, 'mantenimiento')" ><p class="ml-2 my-0 font-weight-bold">Sobre mantenimiento</p></button>
    <!-- <button class='tablinks' onclick="openTab(event, 'tiposModulos')" ><p class="ml-2 my-0 font-weight-bold">Sobre tipos de Modulos</p></button> -->
    <button class='tablinks' onclick="openTab(event, 'otros')"><p class="ml-2 my-0 font-weight-bold">Otros</p></button>
    </div>
    
 
    <div id='guia' class='tabcontent'>
      <h3>Guia de inicio rapido</h3>
        <button class='accordion'>Ver guia &#9660;</button>
        <div class='panel'>
          <p style="text-align: left">Para hacer uso inicial deberá haber definido al menos un usuario administrar en la base de datos para ejecutar todas las configuraciones pertinentes.</p>
          <ol style="text-align: left">
            <li>Primer paso dentro del sistema es ingresar con sus credenciales correctas de administrador y realizar el ingreso de los demás usuarios que administrarán el sistema de notas y darán catedra en los diversos cursos de la fundación.</li>
            <br><li>Siguiente paso es la realización del ingreso de los niveles de los cursos que manejara la fundación.</li>
            <br><li>Siguiente paso es el ingreso de los cursos que impartirá la fundación a lo largo de su duración con su nivel inicial.</li>
            <br><li>Siguiente paso es el ingreso de los tipos o categorías de los módulos que habrá y que contendrá todos los módulos de la fundación a impartir en los cursos.</li>
            <br><li>Siguiente paso es el ingreso de los módulos perteneciente a cada tipo o categoría de módulos que hay ya ingresado en el sistema.</li>
            <br><li>Luego de haber configurado los cursos y módulos con sus tipos correspondiente, lo siguiente será delegar a los usuarios que darán catedra en los diferentes cursos, más específicamente los módulos que estos impartirán.</li>
            <br><li>El siguiente paso sería asignarle los porcentajes a los diferente tipo o categoría de módulos de cada curso.</li>
            <br><li>El siguiente paso puede ser ejecutado en distintos tiempos anteriores lo cual es el registro de los diferentes participantes que estarán integrado en los cursos que imparten la fundación.</li>
            <br><li>Ahora que los curso esta configurados correctamente con su docente, tipos de módulos, módulos y porcentaje de evaluación de los tipos de modulo, lo siguiente será empezar matricular los participantes en los diferentes cursos que están ingresado.</li>
            <br><li>Para finalizar será lo que es el ingreso de notas en los diferentes cursos y los módulos que este lo integran de los participantes matriculados para luego ver su reportes y ranking al finalizar los cursos ya con las notas completas.</li>
          </ol>
        </div>
        
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

    <!-- PARTICIPANTE -->
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


    <!-- CURSO -->
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
        el nivel del curso cargado de la vista nivel de curso.</p>
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

    <div id='mantenimiento' class='tabcontent'>
      <h3>Mantenimiento</h3>
      
      <button class='accordion'>Nivel Curso &#9660;</button>
      <div class='panel'>
        <p class='text-left mt-3'><b> En este apartado es donde el administrador puede agregar un Niveles de curso. </b></p>
        <!-- <button class='accordion'>Nivel Curso &#9660;</button> -->
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> nombre del nivel de curso </b> El nombre del nivel del curso. 
        <br> En el campo de <b>Estado</b> estado del nivel del curso. <br>
        </div>       
        <button class='accordion'>Eliminar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda eliminar un nivel de curso existente.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos del nivel de curso.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en el nivel de curso
        si es que fueron modificados.</p>
        </div> 
     </div>



        <button class='accordion'>Tipos de modulos &#9660;</button>
        <div class='panel'>
        <p class='text-left mt-3'><b>En este apartado es donde el administrador puede agregar un Tipo de Modulo. </b></p>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> nombre del Tipo de Modulo </b> El nombre del Tipo de Modulo. 
        <br> En el campo de <b>Estado</b> estado del Tipo de Modulo. <br>
        </div>      
        <button class='accordion'>Eliminar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda eliminar un Tipo de Modulo existente.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos del Tipo de Modulo.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en el Tipo de Modulo
        si es que fueron modificados.</p>
        </div>
       </div>



       <button class='accordion'>Modulo por Curso &#9660;</button>
        <div class='panel'>
        <p class='text-left mt-3'><b> En este apartado es donde el administrador puede agregar los modulos perteneciente a diferente tipos a los curso existentes . </b></p>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> Curso </b> curso elegido. 
        <br> En la opciones <b>Tipo de Modulo</b> Seleccionamos todos los tipo de modulos y modulos que llevara el curso. <br>
        En el campo <b>Observaciones</b> una observacion de la asignacion hecha si la hay <br>
        </div>      
        <button class='accordion'>Eliminar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda eliminar un modulo especifico de un curso.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los algunos datos de un modulo asignado al curso en especifico.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en el modulos por curso
        si es que fueron modificados.</p>
        </div>
       </div>



       <button class='accordion'>Porcentajes por Curso &#9660;</button>
        <div class='panel'>
        <p class='text-left mt-3'><b>En este apartado es donde el administrador puede agregar los porcentaje perteneciente a diferente tipos de modulos que hay . </b> </p>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> Tipo Modulo </b> eliges un tipo de modulo. 
        <br> En el campo <b>Porcentaje Asignado</b> Asignacion del porcentaje a ese tipo de modulo. <br>
        En el campo <b>Observaciones</b> una observacion de la asignacion hecha si la hay <br>
        </div>      
        <button class='accordion'>Eliminar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda eliminar un modulo especifico de un curso.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los algunos datos de un porcentaje de modulo asignado a un curso en especifico.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en el porcentaje de modulo
        si es que fueron modificados.</p>
        </div>
       </div>

      
      
    
    
    
    
    
    </div>


    <div id='tiposModulos' class='tabcontent'>
      <h3>TiposModulos</h3>
      <button class='accordion'>Tipos de modulos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador puede agregar un Tipo de Modulo. </p>
        </div>
        <button class='accordion'>Especificación de los campos &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En el campo <b> nombre del nivel </b> El nombre del nivel del curso. 
        <br> En el campo de <b>Estado</b> estado del nivel del curso. <br>
        </div>
                
        <button class='accordion'>Eliminar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado es donde el administrador pueda eliminar un nivel de curso existente.</p>
        </div>
        <button class='accordion'>Modificar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado  el administrador puede modificar los datos del nivel de curso.</p>
        </div>
        <button class='accordion'>Guardar cambios &#9660;</button>
        <div class='panel'>
        <p class='text-left'>En este apartado el administrador puede guardar los cambios realizados en el nivel de curso
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
        <p class='text-left'>En este apartado es donde el administrador o docente(si tiene modulos impartidos) puede agregar una nota. </p>
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
        <p class='text-left'>Es el formulario que le permitirá al usuario o participante hacer uso del sistema, este puede ingresar 
        usando su número de DUI y su respectiva contraseña, aqui se manejan niveles de accesos</p>
        </div>
        
        <button class='accordion'>Acerca de &#9660;</button>
        <div class='panel'>
        <p class='text-left'>El apartado con la información general del sistema, lo que busca solucionar e 
        información sobre el desarrollo del mismo, tecnologia, plataforma, etc.</p>
        </div>
        <button class='accordion'>Buscar &#9660;</button>
        <div class='panel'>
        <p class='text-left'>El control siempre presente en la barra superior para realizar búsquedas sobre las vistas en las que esté disponible la función.</p>
        </div>
    </div>
   
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