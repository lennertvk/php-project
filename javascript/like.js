$(document).ready(function(){

    /////LIKE
    $('.like').click(function(){
        let postid = $(this).attr('id');
        console.log(postid);
        $.ajax({
            url: 'test.php',
            type: 'post',
            async: 'false',
            data: {
                'liked': 1,
                'postid': postid
            },
            succes: function(){}
        });
    });


    /////unlike
    $('.unlike').click(function(){
        let postid = $(this).attr('id');
        console.log(postid);
        $.ajax({
            url: 'test.php',
            type: 'post',
            async: 'false',
            data: {
                'unliked': 1,
                'postid': postid
            },
            succes: function(){}
        });

    });


});