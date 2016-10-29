$(document).ready(function () {
    $('#searchAvailabilityForm').on('submit', function(e) {
        var status = $("#status").val();
        
        var statusString = "";
        
        
        if(status == 1){
            statusString = "Available";
        }
        else if(status == 2){
            statusString = "Dead";
        }
        else if(status == 3){
            statusString = "Donated";
        }
        else if(status == 1){
            statusString = "Transfer";
        }
        else if(status == 1){
            statusString = "Pending";
        }
        
        
        
        
        
        $("#nameForm").hide();
        
        $("div#needHide").removeClass("hidden");
        
        e.preventDefault();
        $.ajax({
            async:false,
            url : $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
//            data: dataString,
            success: function (data) {
//                data = jason_decode(data,true);
//                $("#form_output").append(data);

                var len = data.length;
                var txt = "";
                if(len>0){
                    for(var i=0; i<len;i++){
                       
                        if(data[i].id && data[i].fName && data[i].lName && data[i].nic){
                            txt += "<tr><td>"+data[i].id+"</td><td>"+data[i].fName+"</td><td>"+data[i].lName+"</td><td>"+data[i].nic+"</td><td>"+statusString+"</td><td><button onclick=donorData("+data[i].id+")>View Donor</button></td></tr>"
                        }
                    }
                    if(txt != ""){
                        $("#tableDonor").append(txt);
                    }
                }
                
                
                
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});

function donorData(info) {
    
    $("#resultForm").hide();
    $("div#thirdContent").removeClass("hidden");
//    window.location.href = "<?php echo base_url();?>index.php/controllers/donors/getDonor/"+info;
//    window.location.href = "<?php echo site_url('donors/getDonorDetails?id=');?>"+info;
    $.ajax({
            type:'POST',
//            url:'<?php echo base_url("donors/getDonor"); ?>',
            url: 'http://localhost/login/index.php/details/getDonor',
            dataType: "json",
            data:{'id':info},
            success:function(data){
                
                var txt = "<tr><td><b>National Identity Card Number</b></td><td>"+data['nic']+"</td></tr>"+
                          "<tr><td><b>First Name</b></td><td>"+data['fName']+"</td></tr>"+
                          "<tr><td><b>Middle Name</b></td><td>"+data['mName']+"</td></tr>"+
                          "<tr><td><b>Last Name</b></td><td>"+data['lName']+"</td></tr>"+
                          "<tr><td><b>Date of Birth</b></td><td>"+data['dob']+"</td></tr>"+
                          "<tr><td><b>Gender</b></td><td>"+data['gender']+"</td></tr>"+
                          "<tr><td><b>Address Line 1</b></td><td>"+data['addressLine1']+"</td></tr>"+
                          "<tr><td><b>Address Line 2</b></td><td>"+data['addressLine2']+"</td></tr>"+
                          "<tr><td><b>City</b></td><td>"+data['city']+"</td></tr>"+
                          "<tr><td><b>Email</b></td><td>"+data['email']+"</td></tr>"+
                          "<tr><td><b>Telephone Home</b></td><td>"+data['telephone_1']+"</td></tr>"+
                          "<tr><td><b>Telephone Mobile</b></td><td>"+data['telephone_2']+"</td></tr>"+
                          "<tr><td><b>Gramasevaka Devision</b></td><td>"+data['gramasevakaDevision']+"</td></tr>"+
                          "<tr><td><b>Gramasevaka Devision Number</b></td><td>"+data['gramasevakaNo']+"</td></tr>"+
                          "<tr><td><b>Divisional Secretary Area</b></td><td>"+data['devisionalSecratary']+"</td></tr>"+
                          "<tr><td><b>Division</b></td><td>"+data['district']+"</td></tr>"+
                          "<tr><td><b>Province</b></td><td>"+data['province']+"</td></tr>"
                        
                          
                          
               $("#insertData").append(txt);
       
               var txt2 = "<tr><td><b>First Name</b></td><td>"+data['CR_fName']+"</td></tr>"+
                          "<tr><td><b>Last Name</b></td><td>"+data['CR_lName']+"</td></tr>"+
                          "<tr><td><b>Address Line 1</b></td><td>"+data['CR_addressLine1']+"</td></tr>"+
                          "<tr><td><b>Address Line 2</b></td><td>"+data['CR_addressLine2']+"</td></tr>"+
                          "<tr><td><b>City</b></td><td>"+data['CR_city']+"</td></tr>"+
                          "<tr><td><b>National Identity Card Number</b></td><td>"+data['CR_NIC']+"</td></tr>"+
                          "<tr><td><b>Relationship</b></td><td>"+data['CR_relationship']+"</td></tr>"+
                          "<tr><td><b>Telephone</b></td><td>"+data['CR_telephone_1']+"</td></tr>"+
                          "<tr><td><b>Mobile</b></td><td>"+data['CR_telephone_2']+"</td></tr>"
               $("#insertData2").append(txt2);  
        }
    });
    
}