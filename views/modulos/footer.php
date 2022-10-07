
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



