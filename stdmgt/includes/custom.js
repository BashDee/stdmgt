$(document).ready(function(){
    $('#faculty').on('change', function(){
        var id = $(this).val();
    
        if(id){
            $.ajax({
                type:'POST',
                url:'getAjaxData.php',
                data:'id_val='+id,
                success:function(html){
                    $('#dept').html(html);
                    $('#level').html('<option value="">Select dept first</option>'); 
                }
            }); 
        }else{
            $('#dept').html('<option value="">Select faculty first</option>');
            $('#level').html('<option value="">Select dept first</option>'); 
        }
    });
    
    $('#dept').on('change', function(){
        var facultyIdVal = $('#faculty').val();
        var idID = $(this).val();
        if(idID){
            $.ajax({
                type:'POST',
                url:'getAjaxData.php',
                data:'dept_id='+idID+'&sel_faculty_id='+facultyIdVal,
                success:function(html){
                    $('#dept').html(html);
                }
            }); 
        }else{
            $('#dept').html('<option value="">Select dept first</option>'); 
        }
    });
});