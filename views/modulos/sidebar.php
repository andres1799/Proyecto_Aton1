<!-- Sidebar -->
<div id="sidebar-container" class="bg-light">
  <div class="logo">
    <img src="../assets/img/logo.png" alt="">
    <h4 class="font-weight-bold mb-0"></h4>
  </div>
  <!-- Esta parte de codigo sirve para mostrar dinamicamente las otras paginas por medio de un metodo onclick-->
  <div class="menu list-group-flush">
    <a href="index.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fa-solid fa-house lead mr-2"></i></i> Inicio</a>
    <a style="cursor: pointer;" onclick="CargarContenido('../views/portatiles.php','contenedor')" class="list-group-item list-group-item-action text-light bg-light p-3 border-0" ><i class="fa-solid fa-laptop mr-2"></i> Portatil</a>
    <a style="cursor: pointer;" onclick="CargarContenido('../views/monitores.php','contenedor')" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fa-solid fa-desktop lead mr-2"></i> Monitores</a>
    <a style="cursor: pointer;" onclick="CargarContenido('../views/componentes.php','contenedor')" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fa-solid fa-memory lead mr-2"></i></i> Componentes</a>
    <a style="cursor: pointer;" onclick="CargarContenido('../views/accesorios.php','contenedor')" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fa-solid fa-headphones lead mr-2"></i> Accesorios</a>
    <a style="cursor: pointer;" onclick="CargarContenido('../views/torres.php','contenedor')" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"> <i class="fa-solid fa-computer lead mr-2"></i> Torre</a>
  </div>
</div>

