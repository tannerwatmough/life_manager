<?php 
    include('header.php'); 

    if ($quote == NULL) {
        $quote = 'No quotes are working.';
    }
?>
<main>
    <h2>Quote of the day</h2>
    <p><?php echo "\"".$quote."\""; ?></p>
</main>
<?php include('footer.php'); ?>