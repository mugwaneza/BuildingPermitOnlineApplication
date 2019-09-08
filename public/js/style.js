
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var $row = $(this).closest("tr");    // Find the row
    var $tdId = $row.find(".sid").text(); // Find the text
    var  $id = $.trim($tdId);
    $.ajax({
        method: "POST",
        url:"/admin/sector/approval/"+$id,
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

//reject sector application button
$(".RejectBtn").click(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var $row = $(this).closest("tr");    // Find the row
    var $tdId = $row.find(".sid").text(); // Find the text
    var  $id = $.trim($tdId);
    $.ajax({
        method: "POST",
        url:"/admin/sector/reject/"+$id,
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


// Details button when is clicked

$(".btnDetails").click(function() {

    var $row = $(this).closest("tr");    // Find the row

    var $tdname = $row.find(".name").text(); // Find the text
    var $tdemail = $row.find(".email").text(); // Find the text
    var $tdnid= $row.find(".nid").text(); // Find the text
    var $tdvillage= $row.find(".village").text(); // Find the text
    var $tdcell= $row.find(".cell").text(); // Find the text
    var $tdsector= $row.find(".sector").text(); // Find the text

    $('#namedial').val($.trim($tdname));
    $('#emaildial').val($.trim($tdemail));
    $('#niddial').val($.trim($tdnid));
    $('#villagedial').val($.trim($tdvillage));
    $('#celldial').val($.trim($tdcell));
    $('#sectordial').val($.trim($tdsector));

    $("#DetailModel").modal('show');

});