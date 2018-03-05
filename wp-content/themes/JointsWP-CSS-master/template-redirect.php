<?php
/*
Template Name: Redirect Page
*/







$keys = array_keys($_GET);
$key = $keys[0];
$value = $_GET[$key];
echo $value;

$queryString = $_SERVER['QUERY_STRING'];

if ( $queryString ) {
echo $queryString; // Outputs: Query String
	
}
	?>
<!-- 		<script>window.location.replace("<?php echo $value . '?' .$_SERVER['QUERY_STRING'] ?>");</script>

<?php } else { ?>

		<script>window.location.replace("/");</script>

<?php } ?>



 -->