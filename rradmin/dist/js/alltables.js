var categorytable;
var subcategorytable;
var usertable;
var addprodtable;

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

  addprodtable = $("#addprodtable").DataTable({
    "ajax": "showproduct.php",
    "order": []
  });

});
