$(document).ready(function(){
    $('#patientSearch').keyup(function(){
        var patient = $('#patientSearch').val();
        if(patient){
            $.ajax({
                url: 'patients-search',
                method: 'get',
                data:{name : patient},
                success:function(res){
                    $('#patient-tbody').html(res);
                }
            });
        }else{
            $('#patient-tbody').load('patients-empty-list');
        }
    });


    $('#patientorder').change(function(){
        var name = $('#patientorder').val();
        $.ajax({
            url: 'patients-list-order',
            method: 'get',
            data: {name : name},
            success:function(res){
                $('#patient-tbody').html(res);
            }
        });
    });
});