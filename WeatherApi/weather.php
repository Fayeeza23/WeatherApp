<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>WeatherApp</title>
</head>
<style>
    @media only screen and (max-width: 900px) {
  /* For mobile phones: */
[class*="col-"] {
    width: 100%;
}
}
    body{
    background-color:#d7e3fc;
    background-image: url("https://images.unsplash.com/photo-1563999931474-c89a6072740c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1974&q=80");
    background-size: cover;
    font-family:'Times New Roman', Times, serif;
}
#button{
    background-color:#012a4a ;
    color: #edf2fb;
}
#show :hover{
    background-color:#1780a1 ;
}
#two{
    background-color: #f5f3f4;
    opacity: 1.2;
    color:black;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
#heading{
    background-color:#d8f3dc;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

}
#time{
    font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
}
#day{
font-family: cursive;
}
#weathercondition{
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
#temp{
    font-family: Georgia, 'Times New Roman', Times, serif;
}
</style>
<body>
    <div class="container-fluid ">
    <div class="container-fluid pt-5 mt-5 mx-auto d-flex justify-content-center">
    <form class="row" method="POST">
    <div class="col-auto">
        <label for="city" class="form-label fs-2"><b>Enter location: </b></label>
        <input type="search" id="city" name="city" placeholder="City Name" class="form-control pe-5 fs-4" ></div>
        <div class="col-auto pt-5 mt-2" id="show"><button class="btn fs-4" type="submit" name="submit" id="button">Show</button></div>
    </form>
    </div><br><br>
<div class=" container-fluid pb-3 mb-5 py-5 pt-5">
    <div class="col pb-5 mb-5 py-5" >
<?php
    if(isset($_POST['submit'])){
        $cityname=$_POST['city'];
    $url="https://api.openweathermap.org/data/2.5/forecast?q=".$cityname."&units=metric&cnt=30&appid=8ed05bb1456f074f76f54515eae8f3ff";
    echo"<h1 class='fs-1 d-flex justify-content-center mx-3 my-3 shadow-lg rounded-circle' id='heading'><b>".$cityname." </b></h1>";
$contents=file_get_contents($url);
$data=json_decode($contents, true);
echo "<div class='hstack gap-3 overflow-visible shadow-lg rounded-lg'>";
    foreach($data['list'] as $day => $value) {
    echo" <div class='col-2 fs-4 shadow-lg rounded'id='two'>
    <span class='fs-2' id='day'><b>".date('D', strtotime($value['dt_txt']))."</b><br></span>
    <b id='time'>".$value['dt_txt']."</b><br>
    Temperature:<b id='temp'> " .$value['main']['temp'] ." °C </b><br>";
    echo "Max:  <b id='temp'> " . $value['main']['temp_max']. " °C </b><br>";
    echo "Min:  <b id='temp'> " . $value['main']['temp_min'] . " °C </b><br>";
    echo "Humidity: <b id='temp'> " . $value['main']['humidity'] . " % </b><br>";
    echo "Wind:<b id='temp'> " . $value['wind']['speed'] . "  km/h </b><br>";
    echo  "Condition: <span id='weathercondition'><b> " . $value['weather'][0]['description']  . " </b></span><br></div>";
    
}
"</div></div></div>";
    }

?>
</div>
<br><br><br><br>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>