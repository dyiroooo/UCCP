
<script>
var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function () {
  el.classList.toggle("toggled");
};
</script>

<!-- News JS -->
<script type="text/javascript" src="removenews.js"></script>
<script type="text/javascript" src="viewnews.js"></script>
<!-- News JS Above -->

<!-- Student Information JS -->
<script type="text/javascript" src="viewstudentinfo.js"></script>
<script type="text/javascript" src="editstdinfo.js"></script>

<!-- Professor Information JS -->
<script type="text/javascript" src="viewprofessorinfo.js"></script>
<script type="text/javascript" src="editprofinfo.js"></script>

<!-- Admin JS-->
<script type="text/javascript" src="editadmin.js"></script>
<script type="text/javascript" src="removeadmin.js"></script>
<script type="text/javascript" src="addadmin.js"></script>
<script type="text/javascript" src="viewadmin.js"></script>
<script type="text/javascript"> //for showing password
function chkbxShowpassword() {
  var click =  document.getElementById("admin_password");
  if (click.type === "password") {
    click.type = "text";
  } else {
    click.type = "password";
  }
}
</script>
<!-- Admin Js ABOVE -->

<!-- Home Template JS -->
<script type="text/javascript" src="viewht.js"></script>
<script type="text/javascript" src="removeht.js"></script>
<!-- Home Template JS Above -->

<!-- Board of Regents JS -->
<script type="text/javascript" src="viewbor.js"></script>
<script type="text/javascript" src="removebor.js"></script>
<!-- Board of Regents JS Above -->

<!-- Executive Office JS -->
<script type="text/javascript" src="viewxo.js"></script>
<script type="text/javascript" src="removexo.js"></script>
<!-- Executive Office JS Above -->

</body>
</html>
