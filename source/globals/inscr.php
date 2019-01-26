<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 15/01/19
 * Time: 11:17 AM
 */

session_start();
include("condb.php");

$date = getdate();
$_SESSION['day'] = $date['mday'];
$_SESSION['mon'] = $date['month'];
$_SESSION['year'] = $date['year'];

$newre = $_POST['newreg'];
$transf = $_POST['trans'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$slname = $_POST['secondname'];
$dob = $_POST['dateb'];
$sgrade = $_POST['grade'];
$sname = $_POST['schoolname'];
$sexs = $_POST['sexs'];
$adss = $_POST['address'];
$numext = $_POST['numext'];
$numint = $_POST['numint'];
$col = $_POST['colony'];
$city = $_POST['city'];
$state = $_POST['state'];
$pcode = $_POST['pcode'];
$lada = $_POST['lada'];
$phome = $_POST['phonehome'];
$bst = $_POST['betweenst'];
$andst = $_POST['andst'];
$ksp = $_POST['keysp'];
$kmt = $_POST['keymt'];
$advocacy = $_POST['advocacy'];
$fnamemg = $_POST['firstnamemg'];
$phonemg = $_POST['phonemg'];
$cellemg = $_POST['cell'];
$inter = $_POST['inter'];
$ads = $_POST['ads'];
$artc = $_POST['art'];
$revw = $_POST['rvw'];
$pubext = $_POST['pubext'];
$tesfa = $_POST['tstfa'];
$tesfr = $_POST['tstfr'];
$testsc = $_POST['tstsc'];
$otmd = $_POST['othermed'];
$bestc = $_POST['bestcal'];
$gradesp = $_POST['gradesup'];
$bestapt = $_POST['bestapt'];
$tesfar = $_POST['famrea'];
$tesfrr = $_POST['frirea'];
$testscr = $_POST['schrea'];
$othr = $_POST['otherrea'];
$bestcs = $_POST['bestcals'];
$crtb = $_POST['createb'];
$incnc = $_POST['incremconc'];
$getagilcal = $_POST['getagilcal'];
$crtapt = $_POST['createapt'];
$incast = $_POST['incremautost'];
$othrsl = $_POST['otherresl'];
$date = $_POST['date'];

//$dates = "$_SESSION[day]-$_SESSION[mon]-$_SESSION[year]";


$stu = "INSERT INTO students_data(id_enrolment,keysp,keymt,firstname,lastname,sltname,dateofbirth,dateofregistry,schoolgrade,schoolname,sex,address,numberext,                              numberint,colony,city,state,postalcode,lada,phonehome,betweenstreet,andstreet,advocacym,newregi,transfered)
     VALUE('4032553150121','$ksp','$kmt','$fname','$lname','$slname','$dob','$dates','$sgrade','$sname','$sexs','$adss','$numext','$numint','$col','$city','$state',
              '$pcode','$lada','$phome','$bst','$andst','$advocacy','$newre','$transf')";
if(mysqli_query($con,$stu)){
    $idstu = "SELECT stdt.id_students FROM students_data as stdt WHERE stdt.id_students = (SELECT MAX(id_students) FROM students_data)";

    $result = mysqli_query($con,$idstu);

    if($result->num_rows > 0){
        while ($row = $result->fetch_array()){
            $idstus = $row['id_students'];
        }
    }else{
        echo "Error ID students";
    }

}else{
    echo "Error Fatal";
}

foreach (array_keys($_POST['firstnamet']) as $key){

    $fnamet = $_POST['firstnamet'][$key];
    $lnamet = $_POST['lastnamet'][$key];
    $sltnamet = $_POST['sltnamet'][$key];
    $email = $_POST['email'][$key];
    $phonf = $_POST['phoneof'][$key];
    $ocupation = $_POST['ocupation'][$key];

    $tutor = "INSERT INTO tutor_information(firstnametutor,lastnametutor,sltsnametutor,email,phoneoffice,ocupation)
     VALUE('$fnamet','$lnamet','$sltnamet','$email','$phonf','$ocupation')";
    if(mysqli_query($con,$tutor)){
        $idtu = "SELECT  tdt.id_tutor FROM tutor_information as tdt WHERE tdt.id_tutor = (SELECT MAX(id_tutor) FROM tutor_information)";

        $result = mysqli_query($con,$idtu);

        if($result->num_rows > 0){
            while ($row = $result->fetch_array()){
                $idtus = $row['id_tutor'];
                global $idstus;
                $sql = "INSERT INTO student_tutor(idstudtrs,idtutorst) VALUE('$idstus','$idtus')";
                if(mysqli_query($con,$sql)){
                    echo "";
                }else{
                    echo "Erro Fatal Insert tutor";
                }
            }
        }else{
            echo "Error ID tutor";
        }
    }else{
        echo "Error Fatal1";
    }
}

 $emerg = "INSERT INTO emergency(firstnameamer,phoneofem,cellphone) 
     VALUE('$fnamemg','$phonemg','$cellemg')";
if(mysqli_query($con,$emerg)){
    $ideme = "SELECT emer.id_emergency FROM emergency as emer WHERE emer.id_emergency = (SELECT MAX(id_emergency) FROM emergency)";

    $result = mysqli_query($con,$ideme);

    if($result->num_rows > 0){
        while ($row = $result->fetch_array()){
            $idemes = $row['id_emergency'];
            global $idstus;
            $sql = "INSERT INTO student_emergency(idstudmg,idemerst) VALUE('$idstus','$idemes')";
            if(mysqli_query($con,$sql)){
                echo "";
            }else{
                echo "Erro Fatal Insert emergency";
            }
        }
    }else{
        echo "Error ID emergency";
    }
}else{
    echo "Error Fatal1";
}

$meet = "INSERT INTO meets(internet,ad,articule,review,publiext,testimonialfa,testimonialfr,testimonialsc,othermed) 
 VALUE('$inter','$ads','$artc','$revw','$pubext','$tesfa','$tesfr','$testsc','$otmd')";
if(mysqli_query($con,$meet)){
    $idmet = "SELECT mets.id_meets FROM meets_kumon as mets WHERE mets.id_meets = (SELECT MAX(id_meets) FROM meets_kumon)";

    $result = mysqli_query($con,$idmet);

    if($result->num_rows > 0){
        while ($row = $result->fetch_array()){
            $idmts = $row['id_meets'];
            global $idstus;
            $sql = "INSERT INTO student_meets(idstudmts,idmetst) VALUE('$idstus','$idmts')";
            if(mysqli_query($con,$sql)){
                echo "";
            }else{
                echo "Erro Fatal Insert meets";
            }
        }
    }else{
        echo "Error ID meets";
    }
}else{
    echo "Error Fatal1";
}

$reason = "INSERT INTO registry_reason(bestcalmat,gradesuppr,bestaptsc,testimonialfa,testimonialfr,testimonialsc,otherrea) 
 VALUE('$bestc','$gradesp','$bestapt','$tesfar','$tesfrr','$testscr','$othr')";
if(mysqli_query($con,$reason)){
    $idre = "SELECT reason.id_reason FROM registry_reason as reason WHERE reason.id_reason = (SELECT MAX(id_reason) FROM registry_reason)";

    $result = mysqli_query($con,$idre);

    if($result->num_rows > 0){
        while ($row = $result->fetch_array()){
            $idrsn = $row['id_reason'];
            global $idstus;
            $sql = "INSERT INTO student_reasons(idstudrsn,idrsnst) VALUE('$idstus','$idrsn')";
            if(mysqli_query($con,$sql)){
                echo "";
            }else{
                echo "Erro Fatal Insert reason";
            }
        }
    }else{
        echo "Error ID reason";
    }
}else{
    echo "Error Fatal1";
}


$wresult = "INSERT INTO waited_results(bestcalsch,createsoldmat,icremetconce,agilcalmental,createaptstudy,incremetautost,otherresul) 
     VALUE('$bestcs','$crtb','$incnc','$getagilcal','$crtapt','$incast','$othrsl')";
if(mysqli_query($con,$wresult)){
    $idres = "SELECT result.id_result FROM waited_results as result WHERE result.id_result = (SELECT MAX(id_result) FROM waited_results)";

    $result = mysqli_query($con,$idres);

    if($result->num_rows > 0){
        while ($row = $result->fetch_array()){
            $idrsl = $row['id_result'];
            global $idstus;
            $sql = "INSERT INTO student_results(idstudrsl,idrslst) VALUE('$idstus','$idrsl')";
            if(mysqli_query($con,$sql)){
                echo "";
            }else{
                echo "Erro Fatal Insert result";
            }
        }
    }else{
        echo "Error ID result";
    }
}else{
    echo "Error Fatal1";
}
echo "Registered";
?>