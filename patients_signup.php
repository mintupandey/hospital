<html>
    <head>
        <title>Sign up</title>
        <style>
            body
            {
                margin: 0px;
                padding: 0px;
                font-family: 'Playfair Display', serif;
                letter-spacing: 1px;
            
            }
           .container{
	              width: 100%;
	              height: 750px;
	             background-image: url(hospital.png);
 	             background-size: 100% 100%  ;
	             background-repeat: no-repeat;

           }
          
            .photo{
                width: 150px;
	            height: 145px;
                margin: -15px 0px 0px 10px;
                padding: 5px 0px 0px 0px;
                outline: none;
            }
            .para
            {
                width: 1100px;
                height: 70px;
                float: left;
	           text-transform: bold;
	            text-shadow: 2px 1px #0a0a0a;
                color: #fffb00;
	            font-size: 66px;   
               max-width: 1200px; 
               margin: -150px 0px 0px 170px; 
               padding: 35px 0px 0px 0px;
            }
            h1{
                font-size: 40px;
                text-align:center;
                color: #29e67b;
                margin:-44px 0px 15px 0px;   
            }
            .form{
                height: 420px;
                width: 500px;
                margin: 0px 150px 0px 450px;
                padding: 55px 0px 0px 10px;
                background: rgba(0,0,0,0.7);
                color:#5df5f0;
                
            }
            .mr{
                padding: 0px 0px 0px 15px;
            }
            #tt{
                padding: 5px 0px 0px 5px;
            }
            #dd{
                margin:0px 0px 0px 155px;
            }
            #aa
            {
                resize:none;
            }
           
            
        </style>
    </head>
    <body>
        <div class="container">
        <div class="logo"><img class="photo" src="logo.png"> </div>  
        <div class="para" <p>Narain Triveni Multispecialty Hospital</p></div>
       
            <div class="form">
<form name="f1" method="POST" onsubmit="return xyz()" enctype="multipart/form-data">
                    <h1>Patient Registration Form</h1>
         <div class="mr">
                   Patient email: &nbsp; &nbsp; &nbsp;
                 <input type="text" name="textemail" placeholder="Enter email @"></div>
                    <br>
         <div class="mr">
                    Patient name:&nbsp;&nbsp; &nbsp; &nbsp;
                     <input type="text" name="textname" placeholder="Enter patient name"></div>
                    <br>
        <div class="mr">
                    Patient address:&nbsp; &nbsp;
                     <textarea class="text" name="textadd" id="aa" placeholder="enter address"></textarea></div>
                    <br>
         <div class="mr">
                    Patient gender: &nbsp;
                     <input type="radio" name="gender" value="Male">Male
                    <input type="radio" name="gender" value="Female">Female
                    <input type="radio" name="gender" value="Trangender">Transgender</div>
                    <br>
         <div class="mr">
                    Patient phone no.:
                    <input type="text" name="textphone" placeholder="+910000000000"></div>
                     <br>
         <div class="mr">
                    Patient Date of birth:&nbsp;
                    <input type="date" name="textdate"></div>
                    <br>
         <div class="mr">
                    Patient photo: &nbsp; &nbsp;&nbsp;
                    <input type="file" name="file" accept="image/*"></div>
                    <br>
        <div class="mr">
                    Patient disease:   &nbsp;&nbsp;
                     <select name="textdisease">
                    <option></option>
                     <option>Arthritis</option>
                     <option>Asthma</option>
                     <option>Autism</option>
                     <option>Birth Defects</option>
                     <option>Cancer</option>
                     <option>Coronavirus Disease 2019 (COVID-19)</option>
                     <option>Diabetes</option> 
                     <option>Ebola (Ebola Virus Disease)</option>
                      <option>Flu </option>
                      <option>Heart Disease</option>
                      <option>Hepatitis</option>
                      <option>HIV/AIDS</option>
                     <option>Kidney Disease (Chronic Kidney Disease)</option>
                     <option>Sexually Transmitted Diseases</option>
                     <option>Stroke</option>
                     <option>Traumatic Brain Injury (TBI)</option>
                     <option>Trichomonas Infection (Trichomoniasis)</option>
                     <option>Tuberculosis (TB)</option>
                     <option>Zika Virus</option>
                    </select>
                    </div>    
                    <br>
         <div class="mr">
                    Patient password:
                    <input type="password" name="textppass" placeholder="**********"></div>
                    <br>
                    <input type="submit" name="btn" id="dd" value="Sign up">
 </form>
            </div>
        </div>

            <?php
               if(isset($_POST["btn"]))
               {
                
                   $a=$_POST["textemail"];
                   $b=$_POST["textname"];
                   $c=$_POST["textadd"];
                   $d=$_POST["gender"];
                   $e=$_POST["textphone"];
                   $f=$_POST["textdate"];
                   $g=$_FILES["file"]["name"];
                   $tmp=$_FILES["file"]["tmp_name"];
                   $folder="pphoto/".$g;
                   move_uploaded_file($tmp,$folder);
                   
                   $h=$_POST["textdisease"];
                   $i=$_POST["textppass"];
      $con=mysqli_connect("localhost","root","","hospitaldb");
    
                     if($con){
                        $q="INSERT INTO `patients` (`pemail`, `pname`, `paddress`, `pgender`, `pphone`, `pdob`, `pphoto`, `pdisease`, `ppassword`) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', ' $g', '$h', '$i');";
                        $r=mysqli_query($con,$q);

                         if($r)
                         {
                             echo"Data added";
                         }
                         else
                         {
                            echo"Data not added";
                         }
                     }
                     else
                     {
                        echo "Not connected";
                     }
                     mysqli_close($con);
               }
            ?>

            <script>
                function xyz()
                {
                    if(document.f1.textemail.value=="")
                    {
                        alert("Patient email should not be blank");
                        return false;
                    }
                    else if(document.f1.textname.value=="")
                    {
                        alert("Patient name should not be blank");
                        return false;
                    }
                    else if(document.f1.textadd.value=="")
                    {
                        alert("Patient address should not be blank");
                        return false;
                    }
                    else if(document.f1.gender.value=="")
                    {
                        alert("Please select any one gender");
                        return false;
                    }
                    else if(document.f1.textphone.value=="")
                    {
                        alert("Patient phone no should not be blank");
                        return false;
                    }
                    else if(document.f1.textdate.value=="")
                    {
                        alert("Select a Date of birth");
                        return false;
                    }
                    else if(document.f1.img.value=="")
                    {
                        alert("Please select a photo");
                        return false;
                    }
                    else if(document.f1.textdisease.value=="")
                    {
                        alert("Choose any one disease");
                        return false;
                    }
                    else if(document.f1.textppass.value=="")
                    {
                        alert("Patient password should not be blank");
                        return false;
                    }
                    else{
                        return true;
                    }
                }
            </script>
    </body>
</html>