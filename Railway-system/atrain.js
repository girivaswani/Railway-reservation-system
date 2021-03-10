$(document).ready(function(){
    $("button").click(function()
    { 
        var tnumber =document.getElementById("tno").value;
        var source =document.getElementById("source").value;
        var dest =document.getElementById("dest").value;
        var tname =document.getElementById("tname").value;
        var atime =document.getElementById("atime").value;
        var dtime =document.getElementById("dtime").value;
        var seaterac =document.getElementById("seaterac").value;
        var seaternonac =document.getElementById("seaternonac").value;
        var sleeperac =document.getElementById("sleeperac").value;
        var sleepernonac =document.getElementById("sleepernonac").value;
        var seateracprice =document.getElementById("seateracprice").value;
        var seaternonacprice =document.getElementById("seaternonacprice").value;
        var sleeperacprice =document.getElementById("sleeperacprice").value;
        var sleepernonacprice =document.getElementById("sleepernonacprice").value;
        
        if(!source==""){
            $('#source').css('border-color','green');   
        }
        if(!dest==""){
            $('#dest').css('border-color','green');   
        }
        if(!tnumber==""){
            $('#tnumber').css('border-color','green');   
        }
        if(!tname==""){
            $('#tname').css('border-color','green');   
        }
        if(!atime==""){
            $('#atime').css('border-color','green');   
        }
        if(!dtime==""){
            $('#dtime').css('border-color','green');   
        }
        if(!seaterac==""){
            $('#seaterac').css('border-color','green');   
        }
        if(!seaternonac==""){
            $('#seaternonac').css('border-color','green');   
        }
        if(!sleeperac==""){
            $('#sleeperac').css('border-color','green');   
        }
        if(!sleepernonac==""){
            $('#sleepernonac').css('border-color','green');   
        }
        if(!seateracprice==""){
            $('#seateracprice').css('border-color','green');   
        }
        if(!seaternonacprice==""){
            $('#seaternonacprice').css('border-color','green');   
        }
        if(!sleeperacprice==""){
            $('#sleeperacprice').css('border-color','green');   
        }
        if(!sleepernonacprice==""){
            $('#sleepernonacprice').css('border-color','green');   
        }
        
        if(source==""){
            $('#source').css('border-color','red');
            alert("Please Enter Source..");
            
        }
        else if(dest==""){
            $('#dest').css('border-color','red');
            alert("Please Enter Destination..");
        }
        else if(tname===""){
            $('#tname').css('border-color','red');
            alert("Please Enter Train Name..");
        }
        else if(isNaN(tnumber) || tnumber>100000 || tnumber<9999){

            $('#tno').css('border-color','red');
            alert("Please Enter Train Number...");
        }
        else if(atime===""){
            $('#atime').css('border-color','red');
            alert("Please Enter Arival date and time..");
        }
        else if(dtime===""){
            $('#dtime').css('border-color','red');
            alert("Please Enter Destination Date and Time..");
        }
        else if(tname===""){
            $('#tname').css('border-color','red');
            alert("Please Enter Train Name..");
        }
        else if(seaterac===""){
            $('#seaterac').css('border-color','red');
            alert("Please Enter No. of Seater AC Compartment:");
        }
        else if(seaternonac==""){
            $('#seaternonac').css('border-color','red');
            alert("Please Enter No. of Seater AC Compartment...");
        }
        else if(sleeperac==""){
            $('#sleeperac').css('border-color','red');
            alert("Please Enter No. of Seater AC Compartment...");
        }
        else if(sleepernonac==""){
            $('#sleepernonac').css('border-color','red');
            alert("Please Enter No. of Seater AC Compartment...");
        }
        else if(seateracprice===""){
            $('#seateracprice').css('border-color','red');
            alert("Please Enter price");
    }
        else if(seaternonacprice==""){
            $('#seaternonacprice').css('border-color','red');
            alert("Please Enter price");
        }
        else if(sleeperacprice==""){
            $('#sleeperacprice').css('border-color','red');
            alert("Please Enter price");
        }
        else if(sleepernonacprice==""){
            $('#sleepernonacprice').css('border-color','red');
            alert("Please Enter price");    
        }
        else{
            alert("train added successfully");
        }
    
    });
    $("#seaterac").click(function(){
        $("#sacrow").toggle('slow');
    });
    $("#seaternonac").click(function(){
        $("#snonacrow").toggle('slow');
    });
    $("#sleeperac").click(function(){
        $("#slacrow").toggle('slow');
    });
    $("#sleepernonac").click(function(){
        $("#slnonacrow").toggle('slow');
    });
});