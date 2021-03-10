<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <title>Railway Reservation System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" >
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            if(isset($_SESSION['fname'])){ 

            echo '<ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link adv">Welcome '.$_SESSION["fname"].'!</a>
                </li>
            </ul>';
            }
            
            ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link adv" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link adv" href="aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link adv" href="contactus.php">Contact Us</a>
                </li>
                <?php
                
                if(isset($_SESSION['fname'])){ 

                echo '<li class="nav-item">
                        <a href="ticket.php" class="nav-link adv">My Ticket</a>
                    </li>';

                echo '<li class="nav-item">
                        <a class="nav-link adv" href="logout.php" >Logout</a>
                    </li>';
            }
            else{
              echo '<li class="nav-item">
                        <a class="nav-link adv" href="login1.php">Login</a>
                    </li>';
            }
            
            ?>
            </ul>
          </div>
        </nav>
        <marquee direction="left" scrollamount='10' class="text-light">Welcome to RAILWAY RESERVATION PORTAL</marquee>

    
    <div id = "seats"  class="container box" > 

        <div id='lower_body' class="container" >
            <label class="text-light">Number of Seats&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </label> 
            <select id='no_of_seats' style="width: 40%" onchange="handle_seattype(this)">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select><br><br>
        
         <hr class="bg-light"> 


        </div>

        <form  id='ac_type' class="cont1" style="font-size: 1.8rem;" >

            <label class="text-light">Select  Types</label><br>
            <input onclick="sealect_type(this)"  type="radio" name="AC_NON" value="AC" style="margin-left: 0rem;">
           
            <label class="text-light" >AC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input onchange="sealect_type(this)"  type="radio" name="AC_NON" value="NON_AC" style="margin-left: 0rem;">
           
            <label class="text-light"> NON-AC</label><br>
           
           
        </form>

        <form id='seat_type'  class="cont1" style="font-size: 1.8rem" >

            <label class="text-light">Sleeper(SL) &nbsp;&nbsp; Vs  &nbsp;&nbsp;Seater(ST)</label><br>
            <input id = "sl_type" onclick='sealect_category(this)' type="radio" name="SL_ST" value="SL" style="margin-left: 0rem;">
            <label class="text-light">SL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input id = 'st_type' onclick="sealect_category(this)" type="radio" name="SL_ST" value="ST" style="margin-left: 0rem;">
            <label class="text-light">ST</label>
            
        </form>

        <div id='button_cont'>
            <button class="btn btn-success cont1" id="btn" onclick="select_func()" >Pay and Book</button> 

        </div>


           
    </div>

    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    <script>

        father = document.getElementById('seats');
        type_of_seat = document.getElementById('ac_type');
        category_type = document.getElementById('seat_type');
        ac_selected = false;

        label_element = document.createElement('label');
        label_element.setAttribute('class','text-light');

        



        br_element = document.createElement('br');
        // beart

        function  sealect_type(radio){


            if (radio.checked && radio.value === 'AC')
            {
                ac_type = radio.value;
                ac_selected = true;

            }
            else if (radio.checked && radio.value === 'NON_AC'){

                ac_type = radio.value;
                ac_selected = true;
            }
            
        }

        function sealect_category(radio){

            

            if (radio.checked && radio.value === 'SL')
            {
                
                category_type = radio.value;
                

            }
            else if (radio.checked && radio.value === 'ST'){

                category_type = radio.value;

            }
            
            var seat_option = document.getElementById('no_of_seats');
            var total_seats = seat_option.value;




            if (category_type === 'SL' && total_seats <= 1){


                is_seater = document.getElementById('seater_form');
                is_sleeper = document.getElementById('bearth_form');
                if (is_seater){
                    father.removeChild(is_seater);
                    
                }
                if (is_sleeper){

                    father.removeChild(is_sleeper);
                }
                
                
                
                var parent = document.createElement('form');
                parent.setAttribute('id','bearth_form');
                parent.setAttribute('class','cont1');
                parent.style.fontSize = '1.8rem';


                var bearth_title = document.createTextNode('Select Bearth Type ');


                



                // Lower Radio Button
                var input_lower = document.createElement('input');

                var lower_text = document.createTextNode('Lower');
                input_lower.setAttribute('name','BEARTH');
                input_lower.setAttribute('value','LOWER');
                input_lower.setAttribute('type','radio');

                // Middle Radio Button

                var input_middle = document.createElement('input');

                var middle_text = document.createTextNode('Middle');
                input_middle.setAttribute('name','BEARTH');
                input_middle.setAttribute('value','MIDDLE');
                input_middle.setAttribute('type','radio');
                
                // Upper Radio Button

                var input_upper = document.createElement('input');

                var upper_text = document.createTextNode('Upper ');
                input_upper.setAttribute('name','BEARTH');
                input_upper.setAttribute('value','UPPER');
                input_upper.setAttribute('type','radio');
                                
                label_element = document.createElement('label');
                label_element.setAttribute('class','text-light');
                label_element.appendChild(bearth_title);


                parent.appendChild(label_element);
                parent.appendChild(br_element );

                //Lower
                parent.appendChild(input_lower);
                label_element = document.createElement('label');
                label_element.setAttribute('class','text-light');
                label_element.appendChild(lower_text);

                span = document.createElement('span');
                label_element.appendChild(span);

                span.innerHTML = '&nbsp;&nbsp;&nbsp;';
                parent.appendChild(label_element);
                
                //Middle
                parent.appendChild(input_middle);
                label_element = document.createElement('label');
                label_element.setAttribute('class','text-light');
                label_element.appendChild(middle_text);

                span = document.createElement('span');
                label_element.appendChild(span);

                span.innerHTML = '&nbsp;&nbsp;&nbsp;';

                parent.appendChild(label_element);
                
                //Upper
                parent.appendChild(input_upper);
                label_element = document.createElement('label');
                label_element.setAttribute('class','text-light');
                label_element.appendChild(upper_text);
                span = document.createElement('span');
                label_element.appendChild(span);

                span.innerHTML = '&nbsp;&nbsp;&nbsp;';

                parent.appendChild(label_element);
               // father.appendChild(parent);

                father.insertBefore(parent,document.getElementById('button_cont'));


                }


            

            if (category_type === 'ST' && total_seats <= 1){

                //alert('It is calling the function but something is happenoing');

                is_seater = document.getElementById('seater_form');
                is_sleeper = document.getElementById('bearth_form');
                if (is_seater){
                    father.removeChild(is_seater);
                    
                }
                if (is_sleeper){

                    father.removeChild(is_sleeper);
                }

                var parent = document.createElement('form');
                parent.setAttribute('id','seater_form');
                parent.setAttribute('class','cont1');
                parent.style.fontSize = '1.8rem';


                var seater_title = document.createTextNode('Select Seater Type ');



                // slide Window Radio Button

                var input_side_wndow = document.createElement('input');

                var side_window_text = document.createTextNode('Side Window');
                input_side_wndow.setAttribute('name','SEATER');
                input_side_wndow.setAttribute('value','SIDE_WINDOW');
                input_side_wndow.setAttribute('type','radio');

                // NORMAL Radio Button

                var input_normal_wndow = document.createElement('input');

                var normal_window_text = document.createTextNode('Normal ');
                input_normal_wndow.setAttribute('name','SEATER');
                input_normal_wndow.setAttribute('value','NORMAL_WINDOW');
                input_normal_wndow.setAttribute('type','radio');
                


                label_element = document.createElement('label');
                label_element.setAttribute('class','text-light');
                label_element.appendChild(seater_title);

                parent.appendChild(label_element);
                parent.appendChild(br_element );

                //Side window
                parent.appendChild(input_side_wndow);
                label_element = document.createElement('label');
                label_element.setAttribute('class','text-light');
                label_element.appendChild(side_window_text);

                span = document.createElement('span');
                label_element.appendChild(span);

                span.innerHTML = '&nbsp;&nbsp;&nbsp;';
                parent.appendChild(label_element);
                
                //Middle
                parent.appendChild(input_normal_wndow);
                label_element = document.createElement('label');
                label_element.setAttribute('class','text-light');
                label_element.appendChild(normal_window_text);

                span = document.createElement('span');
                label_element.appendChild(span);

                span.innerHTML = '&nbsp;&nbsp;&nbsp;';
                parent.appendChild(label_element);
                
                //father.appendChild(parent);
                father.insertBefore(parent,document.getElementById('button_cont'));

            }
        }

        function handle_seattype(select_value){

            //alert('Hi')
            if (select_value.value > 1){
            if (document.getElementById('bearth_form')){
                father.removeChild(document.getElementById('bearth_form'));

            }
            else if (document.getElementById('seater_form')){
                father.removeChild(document.getElementById('seater_form'));
            }
            
            }
            else{
                document.getElementById('sl_type').checked = false;
                document.getElementById('st_type').checked = false;
            }
            //alert(select_value.value);


        }

        function select_func(){

            selected = false;
            var bearth_selected ;
            var seater_selected ;

            if (category_type === 'SL'){

                const rbs_sl = document.querySelectorAll('input[name="BEARTH"]');

                

                for (const rb of rbs_sl)
                {
                    if (rb.checked){

                        bearth_selected = rb.value
                        selected = true;
                        break
                    }

                }


            }
            else if (category_type === 'ST'){

                const rbs_st = document.querySelectorAll('input[name="SEATER"]');

                

                for (const rb of rbs_st)
                {
                    if (rb.checked){

                        seater_selected = rb.value
                        selected = true;
                        break
                    }

                }


            }
            
            var seat_option = document.getElementById('no_of_seats');
            var total_seats = seat_option.value;

            //alert(document.getElementById('seat_type').checked);

            if (bearth_selected && ac_selected && total_seats <= 1){
               
                alert("Seat Type is " + ac_type + " " + category_type + "\n" + "Total " + total_seats+" Seats Booked");

                            
            function post(path, parameters) {
                var form = $('<form></form>');

                form.attr("method", "post");
                form.attr("action", path);

                $.each(parameters, function(key, value) {
                    var field = $('<input></input>');

                    field.attr("type", "hidden");
                    field.attr("name", key);
                    field.attr("value", value);

                    form.append(field);
                });

                // Th
                // form.append(field);
                // });

                // The form needs to be a part of the document in
                // order for us to be able to submit it.
                $(document.body).append(form);
                form.submit();

            }
            post("payment.php",{"ac_type":ac_type,"seat_type":category_type,"total_seats":total_seats});
            // window.location.href = 'payment.php';

                
                
            }
            else if (seater_selected && ac_selected && total_seats <= 1) {

            alert("Seat Type is " + ac_type + " " + category_type + "\n" + "Total " + total_seats+" Seats Booked");

                            
            function post(path, parameters) {
                var form = $('<form></form>');

                form.attr("method", "post");
                form.attr("action", path);

                $.each(parameters, function(key, value) {
                    var field = $('<input></input>');

                    field.attr("type", "hidden");
                    field.attr("name", key);
                    field.attr("value", value);

                    form.append(field);
                });

                // Th
                // form.append(field);
                // });

                // The form needs to be a part of the document in
                // order for us to be able to submit it.
                $(document.body).append(form);
                form.submit();

            }
            post("payment.php",{"ac_type":ac_type,"seat_type":category_type,"total_seats":total_seats});
            // window.location.href = 'payment.php';


            }
            else if(ac_selected && ( document.getElementById('sl_type').checked || document.getElementById('st_type').checked )&& total_seats >= 2) {
              //  alert('hello');
            
            alert("Seat Type is " + ac_type + " " + category_type + "\n" + "Total " + total_seats+" Seats Booked"); 
            
            function post(path, parameters) {
                var form = $('<form></form>');

                form.attr("method", "post");
                form.attr("action", path);

                $.each(parameters, function(key, value) {
                    var field = $('<input></input>');

                    field.attr("type", "hidden");
                    field.attr("name", key);
                    field.attr("value", value);

                    form.append(field);
                });
                $(document.body).append(form);
                form.submit();

            }
            post("payment.php",{"ac_type":ac_type,"seat_type":category_type,"total_seats":total_seats});
            // window.location.href = 'payment.php';

            }
            else if (!selected || !ac_selected){

                alert('Please select seat type properly' )
            }

        }

    </script>

</body>