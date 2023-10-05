<?php include('header.php'); ?>
<main>
    <nav>
        <h2>Error View</h2>

        <p><?php echo $error_message; ?></p>

        <ul>
            <li><a href="?action=collections">Collections</a></li>
            <li><a href="?action=tasks">Tasks</a></li>
            <li><a href="?action=goals">Goals</a></li>
            <li><a href="?action=daily">Daily View</a></li>
        </ul>
    </nav>
</main>
<?php include('footer.php'); ?>