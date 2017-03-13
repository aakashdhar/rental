var addprodtable;


$(document).ready(function() {

  addprodtable = $("#addprodtable").DataTable({
    "ajax": "showproduct.php",
    "order": []
  });

});
