$(document).ready(function (){
    $('.razorpay_btn').click(function (e) {
        e.preventDefault();

       var cname = $('.cname').val(); 
       var cemail = $('.cemail').val(); 
       var cphone = $('.cphone').val();
       var cstreet = $('.cstreet').val(); 
       var cpostcode = $('.cpostcode').val();
       var ccity = $('.ccity').val();
       var cstate = $('.cstate').val();
    
       if(!cname)
       {
           cname_error = "Name is required";
           $('#cname_error').html('');
           $('#cname_error').html(cname_error);
       }
       else{
        cname_error = "";
        $('#cname_error').html('');
       }

       if(!cemail)
       {
           cemail_error = "Email is required";
           $('#cemail_error').html('');
           $('#cemail_error').html(cemail_error);
       }
       else{
        cemail_error = "";
        $('#cemail_error').html('');
       }

       if(!cphone)
       {
           cphone_error = "Phone is required";
           $('#cphone_error').html('');
           $('#cphone_error').html(cphone_error);
       }
       else{
        cphone_error = "";
        $('#cphone_error').html('');
       }

       if(!cstreet)
       {
           cstreet_error = "Street is required";
           $('#cstreet_error').html('');
           $('#cstreet_error').html(cstreet_error);
       }
       else{
        cstreet_error = "";
        $('#cstreet_error').html('');
       }

       if(!cpostcode)
       {
           cpostcode_error = "Address is required";
           $('#cpostcode_error').html('');
           $('#cpostcode_error').html(cpostcode_error);
       }
       else{
        cpostcode_error = "";
        $('#cpostcode_error').html('');
       }

       if(!ccity)
       {
           ccity_error = "Address is required";
           $('#ccity_error').html('');
           $('#ccity_error').html(ccity_error);
       }
       else{
        ccity_error = "";
        $('#ccity_error').html('');
       }

       if(!cstate)
       {
           cstate_error = "Address is required";
           $('#cstate_error').html('');
           $('#cstate_error').html(cstate_error);
       }
       else{
        cstate_error = "";
        $('#cstate_error').html('');
       }


       if(cname_error != '' || cemail_error != '' || cphone_error != '' || cstreet_error != '' || cpostcode != '' || ccity != '' || cstate != '')
       {
           return false;
       }
       else
       {
            var data = {
                'O_Name' : cname, 
                'O_Email' : cemail, 
                'O_Phone' : cphone,
                'O_Street_1' : cstreet, 
                'O_Postcode' : cpostcode,
                'O_City' : ccity,
                'O_State' : cstate
            }

            $.ajax({
                method: "POST",
                url:"proceed-to-pay",
                data: data,
                success: function (response) {
                    alert(response.total_price) 
                }
            })
       }
        
    });
});