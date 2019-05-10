let start = 0;
let limit = 1;

function getData(){
    let ajax =  new XMLHttpRequest();
    ajax.open("GET", "Http.php?start=" + start + "&limit=" + limit, true);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let data = JSON.parse(this.responseText);
            data = JSON.parse(data.dataimage);

            let datalikes =  JSON.parse(this.responseText);
            datalikes = JSON.parse(datalikes.datalikes)

            let html = "";

            for(let i = 0; i < data.length; i++){

            let likeorunlike = "";
            let action = "test";
            if(typeof(datalikes[i]) !== 'undefined'){
                if(datalikes[i].user_id == 1){  
                    likeorunlike = "unlike";
                    action = "onclick='unlikeclick(this);'";                   
                }else{
                    likeorunlike = "like";
                    action = "onclick='likeclick(this);'";                  
                }
            }else{
               likeorunlike = "like";
               action = "onclick='likeclick(this);'";                   
            }

                html += "<div class='img_div'>";
                html += "<img src='miniimages/"+ data[i].image +"'>";
                html += "<p>"+data[i].text+"</p>";
                html += "<p><span id='"+ data[i].id +"id'>" + data[i].image_likes + "</span> Likes</p>";
                html += "<span id='"+likeorunlike+"'><button = '' class='"+ likeorunlike +"' id= '" + data[i].id + "'"+action+">"+likeorunlike+"</button</span>"
                html += "</div>";
                html += "<br>";
            }

           document.getElementById("testloadmore").innerHTML += html;

           start = start + limit;
           
        }
    };
};

getData();

$('#loadmorebtn').click(getData);