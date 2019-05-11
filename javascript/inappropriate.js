function innappropriate(e){
    let postid = e.id;
        console.log(postid);
        $.ajax({
            url: 'ajax/report.php',
            type: 'post',
            async: 'false',
            data: {
                'reported': 1,
                'reportid': postid
            },
            succes: function(data){
                console.log("testttt");
            }
        });
}

function checktimesreported(button){
    let postid = button.id;
    let ajax =  new XMLHttpRequest();
    ajax.open("GET", "Http.php?start=" + start + "&limit=" + limit, true);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let data = JSON.parse(this.responseText);
            data = JSON.parse(data.alldata);
            //console.log(data);

            for(let i = 0; i < data.length; i++){
                if(data[i].id = postid){
                    if(data[i].reported > 2 ){
                        //console.log("de image is al teveel gerapporteerd");
                        document.getElementById(postid).classList.add("hide");
                    }
                }
            }

        }       
    }
}