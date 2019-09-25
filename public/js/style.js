
//Edit admin user button
$(".BtnEdit").click(function()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

     // get row columns data when edit button is clicked and append it to model dialog

    var $row = $(this).closest("tr");    // Find the row

    var $tdId = $row.find(".id").text(); // Find the text
    var $tdname = $row.find(".name").text(); // Find the text
    var $tdnid = $row.find(".nid").text(); // Find the text
    var $tdemail = $row.find(".email").text(); // Find the text
    var $tdrole = $row.find(".role").text(); // Find the text
    var $tdvillage = $row.find(".village").text(); // Find the text
    var $tdcell = $row.find(".cell").text(); // Find the text
    var $tdsector = $row.find(".sector").text(); // Find the text

    // Append variables to the model dialog
    $("#dialogid").val($.trim($tdId));
    $("#namedial").val($.trim($tdname));
    $("#niddial").val($.trim($tdnid));
    $("#emaildial").val($.trim($tdemail));
    $("#roledial").val($.trim($tdrole));
    $("#villagedial").val($.trim($tdvillage));
    $("#celldial").val($.trim($tdcell));
    $("#sectordial").val($.trim($tdsector));

    $("#editmodel").modal('show');


});

//Delete admin user

$(".BtnDelete").click(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var $row = $(this).closest("tr");    // Find the row
    var $tdId = $row.find(".id").text(); // Find the text

    // Append variables to the model dialog
    $("#iddelete").val($.trim($tdId));

    $("#Deletemodel").modal('show');

});

//Approve village application button
$(".vApproveBtn").click(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var $row = $(this).closest("tr");    // Find the row
    var $tdId = $row.find(".vid").text(); // Find the text
    var  $id = $.trim($tdId);
    $.ajax({
        method: "POST",
        url:"/admin/village/approval/"+$id,
        data: $id,
        cache: false,
        type: 'POST',
       success:function(response){
           success:"approved";
           window.location.reload();
       },
        error:function(response){
            error:response;
        }
    } )
});

//Approve cell application button
$(".cApproveBtn").click(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var $row = $(this).closest("tr");    // Find the row
    var $tdId = $row.find(".cid").text(); // Find the text
    var  $id = $.trim($tdId);
    $.ajax({
        method: "POST",
        url:"/admin/cell/approval/"+$id,
        data: $id,
        cache: false,
        type: 'POST',
       success:function(response){
           window.location.reload();
       },
        error:function(response){
            error:response;
        }
    } )
});

//Approve sector application button
$(".ApproveBtn").click(function() {

    var $row = $(this).closest("tr");    // Find the row
    var $tdId = $row.find(".sid").text(); // Find the text
    var  $id = $.trim($tdId);
    $("#commentid").val($id);
    $("#commentDialog").modal('show');
});

//reject sector application button
$(".RejectBtn").click(function() {



    var $row = $(this).closest("tr");    // Find the row
    var $tdId = $row.find(".sid").text(); // Find the text
    var  $id = $.trim($tdId);
    $("#commentid2").val($id);
    $("#rejectModeldialog").modal('show');

});

//search function
 var textbox2 = document.getElementById('search');

if(textbox2) {
    textbox2.addEventListener("keypress", function onEvent(event) {
        if (event.key === "Enter") {
            var $search = $("#search").val();
            window.location.href = "/admin/search/" + $search;
        }
    });
   }

// Details button when is clicked
    $(".btnDetails").click(function () {
//$(document).on("click", ".btnDetails", function(){

        //$(document).on("click", ".btnDetails", function(){

        var $row = $(this).closest("tr");  // Find the row
        var $tdname = $row.find(".name").text(); // Find the text
        var $tdemail = $row.find(".email").text(); // Find the text
        var $tdnid = $row.find(".nid").text(); // Find the text
        var $tdvillage = $row.find(".village").text(); // Find the text
        var $tdcell = $row.find(".cell").text(); // Find the text
        var $tdsector = $row.find(".sector").text(); // Find the text
        var $tdcomment = $row.find(".scomment").text(); // Find the text

        $('#namedial').val($.trim($tdname));
        $('#emaildial').val($.trim($tdemail));
        $('#niddial').val($.trim($tdnid));
        $('#villagedial').val($.trim($tdvillage));
        $('#celldial').val($.trim($tdcell));
        $('#sectordial').val($.trim($tdsector));
        $('#commentsdialog').html("");
        $('#commentsdialog').append($.trim($tdcomment));

        $("#DetailModel").modal('show');
    });


  $(".printCertBtn").click(function(){

    var $row = $(this).closest("tr");  // Find the row
    var $tdname = $row.find(".landmanager").text(); // Find the text
    $('#landmanagername').append($.trim($tdname));

      $('#no').css('margin-left', '45%');
      $('#contents').css('margin-top', '10%');
      $('#regards').css('margin-top', '20%');
      $('.printableCert').show();
      jQuery('#printableCert').print();


  });