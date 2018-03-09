<?php 


$urlArray = $_GET;;


//GET THE CURRENT URL
$uri = $_SERVER['REQUEST_URI'];
//echo $uri; // Outputs: URI
 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// echo $url; // Outputs: Full URL
 
$queryString = $_SERVER['QUERY_STRING'];
//echo $queryString; // Outputs: Query String





if ( $urlArray ) {
?>
<nav aria-label="Pagination">

  <ul class="pagination text-right">

    <li class="pag-home-link"><a href="/dg-sellsheets"><<</a></li>

    <?php
    $pageCounter = 1;
    foreach ($urlArray as $key => $value) {

      $stringUrl = $value . '?' .  $queryString;

      if ( $url == $stringUrl ) {
      echo '<li class="current">' . $pageCounter . '</li>';
      } else {
      echo '<li><a href="' . $stringUrl . '">' . $pageCounter . '</a></li>';
      }

    //echo $value;
    $pageCounter++;
    }

    ?>
      </ul>
    </nav>
<?php
}
?>



