$(document).ready( function () {
   
  // datatables
  var table = $('#tbl-users-data').DataTable({
    lengthMenu: [[ 10, 30, -1], [ 10, 30, "All"]], // page length options
    bProcessing: true,
    serverSide: true,
    scrollY: "400px",
    scrollCollapse: true,
    ajax: {
      url: "/load-users", // json datasource
      type: "post",
      headers: {
        'X-CSRF-TOKEN': csrfToken
      }
    },
    columns: [
      { data: "id" },
      { data: "lastname" },
      { data: "firstname" },
      { data: "birthdate" },
      { data: "email" },
      { data: "phone" }
    ],
    columnDefs: [
      { orderable: false, targets: [0, 1, 2, 3] }
    ],
    bFilter: true, // to display datatable search
  });
  // save
  $("#add-user").validator();

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
    }
});
  // when the form is submitted
  $("#add-user").on("submit", function(e) {
    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
      var postdata = $("#add-user").serialize();
        $.ajax({
            url: "/ajax-add-user",
            data: postdata,
            type: "JSON",
            method: "post",
            success:function(response){
              $('#tbl-users-data').DataTable().ajax.reload();
              $('#userModal').modal('hide')
            }
        });
      return false;
    }
  });
});