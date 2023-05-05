  </div>
</div>

<script>
  var el = document.getElementById("wrapper");
  var toggleButton = document.getElementById("menu-toggle");
  toggleButton.onclick = function () {
      el.classList.toggle("toggled");
  };

  function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
  }

  function printDiv1(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
  }

</script>
</body>
</html>
