$(document).ready(function () {
    $('#searchUserFormNIC').on('submit', function(e) {
        var nic = $("#donorNIC").val();
        $("#nameForm").hide();
        $("div#thirdContent").removeClass("hidden");
        
        e.preventDefault();
        $.ajax({
            async:false,
            url : $(this).attr('action') || window.location.pathname,
            type: "POST",
            dataType: "json",
            data:{'nic':nic},
            success: function (data) {
                
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
                          "<tr><td><b>Province</b></td><td>"+data['province']+"</td></tr>";
                        
                          
                          
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
               
               var donorStatus = data['status']
               var stat;
               if(donorStatus==1){
                    stat = "Availabe"
               }
               else if(donorStatus==2){
                    stat = "Dead"
               }
               else if(donorStatus==3){
                    stat = "Donated"
               }
               else if(donorStatus==4){
                    stat = "Transfer"
               }
               else if(donorStatus==5){
                    stat = "Pending Acceptance"
               }
               
               
               $("#insertStatus").append(stat); 
               var donorID=data['id'];
               $("#getID").val(donorID);
             
            }
//            ,
//            error: function (jXHR, textStatus, errorThrown) {
//                alert(errorThrown);
//            }
        });
    });
});

