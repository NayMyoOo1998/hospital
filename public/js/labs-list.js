$(document).ready(function(){
   $('#labs-list').keyup(function(){
       var labs = $('#labs-list').val();
       if(labs){
           $.ajax({
               url: "lab-list-search",
               method: 'get',
               data: {name : labs},
               success: function(res){
                   $('#labs-list-tbody').html(res);
               },
           });
       }else{
           $('#labs-list-tbody').load('labs_list_searchempty');
       }
   });

   $('#laborder').change(function(){
       var name = $('#laborder').val();
       $.ajax({
           url: 'lab-order',
           method:'get',
           data:{name:name},
           success : function(res){
            $('#labs-list-tbody').html(res);
           }
       })
   });


});