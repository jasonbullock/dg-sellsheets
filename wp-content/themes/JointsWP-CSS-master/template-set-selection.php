<?php
/*
Template Name: Set Selection
*/
$int = 9000000000000;
  // setcookie("name", "Jason Bullock", time()+3600, "/","", 0);
  // setcookie("age", "43", time()+3600, "/", "",  0);
//setcookie("saved_url","asdfasdf.com/asfasf",time()+$int);
/*name is your cookie's name
value is cookie's value
$int is time of cookie expires*/


// unset($_COOKIE["name"]);
// unset($_COOKIE["age"]);
/*Or*/
setcookie("name","Jason Bullock",time()-1);
setcookie("age", "43",time()-1);
/*it expired so it's deleted*/



?>
<script>window.location.replace("/");</script>
