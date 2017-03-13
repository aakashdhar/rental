var categorytable;
var subcategorytable;
var usertable;
$(document).ready(function() {

  categorytable = $("#categorytable").DataTable({
    "ajax": "showcategory.php",
    "order": []
  });

  subcategorytable = $("#subcategorytable").DataTable({
    "ajax": "showsubcategory.php",
    "order": []
  });

  usertable = $("#usertable").DataTable({
    "ajax": "showuser.php",
    "order": []
  });

});
