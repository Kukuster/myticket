<?php


if (isset($_POST['pdf_text']) && !empty($_POST['pdf_text'])){
    $pdf_text = $_POST['pdf_text'];
} else {
    die();
}


$download_page = get_page('download-file');

$redirect_url = $_POST['redirect_url'];

$filename = $_POST['filename'];



?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h1>Thank you for using our service!</h1>

<h2>Buy more tickets!!!</h2>


<script>
setTimeout(function(){ 
    window.location.href = "<?php echo $redirect_url; ?>";
}, 4000);
</script>


<form id="redirect_form" action="<?php echo $download_page->get_url(); ?>" method="post">
    
    <input type="hidden" name="pdf_text" value="<?php echo htmlentities($pdf_text); ?>">
    <input type="hidden" name="filename" value="<?php echo htmlentities($filename); ?>">
    
</form>
<script type="text/javascript">
    document.getElementById('redirect_form').submit();
</script>


</body>
</html>


<?php 

