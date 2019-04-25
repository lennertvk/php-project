function like_image(image_id){
    $.post('ajax/like_add.php', {image_id:image_id} , function(data){
        if(data == 'success'){
            //do something
            like_get(image_id);
        }else{
            alert(data);
        }
    });
}

function like_get(image_id){
    $.post('ajax/like_get.php', {image_id:image_id} , function(data){
        $('#image_'+image_id+'_likes').text(data);
    });
}