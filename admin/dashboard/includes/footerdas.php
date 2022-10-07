</section>
</div>
</div>
</div>

<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#content-wrapper").toggleClass("toggled");
  });
</script>

<script>
  const sliderValue = document.querySelector("span");
  const inputSlider = document.querySelector("input");
  inputSlider.oninput = (() => {
    let value = inputSlider.value;
    sliderValue.textContent = value;
    sliderValue.style.left = (value / 2) + "%";
    sliderValue.classList.add("show");
  });
  inputSlider.onblur = (() => {
    sliderValue.classList.remove("show");
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="../../assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../../assets/js/scripts.js"></script>
<script src="../../assets/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="../../assets/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="../../assets/js/sweetalert2.Wall.min.js"></script>
<script src="../../assets/js/jquery-ui/jquery-ui.min.js"></script>
<script src="../../assets/js/Chart.bundle.min.js"></script>
<script src="../../assets/js/funciones.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

<script>
  function CargarContenido(pagina_php,contenerdor){
    $("#" + contenerdor).load(pagina_php);
  }
</script>



</body>

</html>