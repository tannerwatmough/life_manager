<?php include('header.php'); ?>
<main>
    <h2>Add/Edit Collections</h2>

    <form action="" method="post" id="aligned">

        <?php if($book_fl) {
            if ($edit_fl && $book != NULL) {
                echo "<input type='hidden' name='book_id' value='".htmlspecialchars($book['bookId'])."' />";

                echo '<label>Name:</label>';
                echo "<input type='text' name='name' value='".htmlspecialchars($book['name'])."' />";
                echo '<br />';
                
                echo '<label>Author:</label>';
                echo "<input type='text' name='author' value='".htmlspecialchars($book['author'])."' />";
                echo '<br />';

                echo '<label>Genre:</label>';
                echo "<input type='text' name='genre' value='".htmlspecialchars($book['genre'])."' />";
                echo '<br />'; 

                echo '<label>Platform:</label>';
                echo "<input type='text' name='platform' value='".htmlspecialchars($book['platform'])."' />";
                echo '<br />';

                echo '<label>Priority:</label>';
                if ($book['priority'] == 1) {
                    echo "<input type='checkbox' name='priority' value='priority' checked />";
                } else {
                    echo "<input type='checkbox' name='priority' value='priority' />";
                }
                echo '<br />';

                echo '<label>Completed Date:</label>';
                echo "<input type='text' name='completed' value='".htmlspecialchars($book['completedDate'])."' />";
                echo '<br />'; 

                echo '<label>Summary:</label>';
                echo "<textarea name='summary' rows='20' cols='50'>".htmlspecialchars($book['summary'])."</textarea>";
                echo '<br />';
                
            } else {
                echo '<label>Name:</label>';
                echo '<input type="text" name="name" />';
                echo '<br />';

                echo '<label>Author:</label>';
                echo '<input type="text" name="author" />';
                echo '<br />';

                echo '<label>Genre:</label>';
                echo '<input type="text" name="genre" />';
                echo '<br />'; 

                echo '<label>Platform:</label>';
                echo '<input type="text" name="platform" />';
                echo '<br />';

                echo '<label>Priority:</label>';
                echo '<input type="checkbox" name="priority" value="priority" />';
                echo '<br />';

                echo '<label>Completed Date:</label>';
                echo '<input type="text" name="completed" />';
                echo '<br />'; 

                echo '<label>Summary:</label>';
                echo '<textarea name="summary" rows="20" cols="50"></textarea>';
                echo '<br />';
            }
            
        } else if ($course_fl) {
            if ($edit_fl && $course != NULL) {
                echo "<input type='hidden' name='course_id' value='".htmlspecialchars($course['courseId'])."' />";

                echo '<label>Name:</label>';
                echo "<input type='text' name='name' value='".htmlspecialchars($course['name'])."' />";
                echo '<br />';
                
                echo '<label>Area:</label>';
                echo "<input type='text' name='area' value='".htmlspecialchars($course['area'])."' />";
                echo '<br />';

                echo '<label>Location:</label>';
                echo "<input type='text' name='url' value='".htmlspecialchars($course['url'])."' />";
                echo '<br />'; 

                echo '<label>Completed Date:</label>';
                echo "<input type='text' name='completed' value='".htmlspecialchars($course['completedDate'])."' />";
                echo '<br />'; 

                echo '<label>Summary:</label>';
                echo "<textarea name='summary' rows='20' cols='50'>".htmlspecialchars($course['notes'])."</textarea>";
                echo '<br />';
                
            } else {
                echo '<label>Name:</label>';
                echo '<input type="text" name="name" />';
                echo '<br />';

                echo '<label>Area:</label>';
                echo '<input type="text" name="area" />';
                echo '<br />';

                echo '<label>Location:</label>';
                echo '<input type="text" name="location" />';
                echo '<br />'; 

                echo '<label>Completed Date:</label>';
                echo '<input type="text" name="completed" />';
                echo '<br />'; 

                echo '<label>Summary:</label>';
                echo '<textarea name="summary" rows="20" cols="50"></textarea>';
                echo '<br />';
            }

        } else if ($game_fl) {
            if ($edit_fl && $game != NULL) {
                echo "<input type='hidden' name='game_id' value='".htmlspecialchars($game['gameId'])."' />";

                echo '<label>Name:</label>';
                echo "<input type='text' name='name' value='".htmlspecialchars($game['name'])."' />";
                echo '<br />';
                
                echo '<label>Platform:</label>';
                echo "<input type='text' name='platform' value='".htmlspecialchars($game['platform'])."' />";
                echo '<br />';

                echo '<label>Length:</label>';
                echo "<input type='text' name='length' value='".htmlspecialchars($game['length'])."' />";
                echo '<br />'; 

                echo '<label>Recording URL:</label>';
                echo "<input type='text' name='recording' value='".htmlspecialchars($game['url'])."' />";
                echo '<br />';

                echo '<label>Completed Date:</label>';
                echo "<input type='text' name='completed' value='".htmlspecialchars($game['completedDate'])."' />";
                echo '<br />'; 

                echo '<label>Notes:</label>';
                echo "<textarea name='summary' rows='20' cols='50'>".htmlspecialchars($game['notes'])."</textarea>";
                echo '<br />';
                
            } else {
                echo '<label>Name:</label>';
                echo '<input type="text" name="name" />';
                echo '<br />';

                echo '<label>Platform:</label>';
                echo '<input type="text" name="platform" />';
                echo '<br />';

                echo '<label>Length:</label>';
                echo '<input type="text" name="length" />';
                echo '<br />'; 

                echo '<label>Recording URL:</label>';
                echo '<input type="text" name="recording" />';
                echo '<br />';

                echo '<label>Completed Date:</label>';
                echo '<input type="text" name="completed" />';
                echo '<br />'; 

                echo '<label>Notes:</label>';
                echo '<textarea name="summary" rows="20" cols="50"></textarea>';
                echo '<br />';
            }
        } else {
            echo '<p>Error. No flag set.</p>';
        }
        ?>

        <?php 
            if ($edit_fl) {
                echo '<input type="hidden" name="action" value="edit" />';
            } else {
                echo '<input type="hidden" name="action" value="add" />';
            }
        ?>

        <label>&nbsp;</label>
        <input type="submit" value="Submit" /><br />
    </form>
</main>
<?php include('footer.php'); ?>