<?php include('header.php'); ?>
<main>
    <h2>Add/Edit Item</h2>

    <form action="" method="post" id="aligned">
        <?php
        if ($edit_fl && $goal != NULL) {
            echo "<input type='hidden' name='goal_id' value='".htmlspecialchars($goal['goalId'])."' />";

            echo '<label>Name:</label>';
            echo "<input type='text' name='name' value='".htmlspecialchars($goal['name'])."' />";
            echo '<br />';
                
            echo '<label>Info:</label>';
            echo "<input type='text' name='author' value='".htmlspecialchars($goal['info'])."' />";
            echo '<br />';

            echo '<label>Category:</label>';
            echo '<select name="category">';
            echo "<option value='career'>Career</option>";
            echo "<option value='environment'>Environment</option>";
            echo "<option value='growth'>Growth</option>";
            echo "<option value='health'>Health</option>";
            echo "<option value='life'>Life Management</option>";
            echo "<option value='relations'>Relationships</option>";
            echo '</select>';
            echo '<br />'; 

            echo '<label>Priority:</label>';
            if ($goal['priority'] == 1) {
                echo "<input type='checkbox' name='priority' value='priority' checked />";
            } else {
                echo "<input type='checkbox' name='priority' value='priority' />";
            }
            echo '<br />';

            echo '<label>Due Date:</label>';
            echo "<input type='text' name='due_date' value='".htmlspecialchars($goal['dueDate'])."' />";
            echo '<br />'; 

            echo '<label>Completed Date:</label>';
            echo "<input type='text' name='completed' value='".htmlspecialchars($goal['completedDate'])."' />";
            echo '<br />'; 
                
        } else {
            echo '<label>Name:</label>';
            echo '<input type="text" name="name" />';
            echo '<br />';

            echo '<label>Info:</label>';
            echo '<input type="text" name="info" />';
            echo '<br />';

            echo '<label>Category:</label>';
            echo '<select name="category">';
            echo "<option value='career'>Career</option>";
            echo "<option value='environment'>Environment</option>";
            echo "<option value='growth'>Growth</option>";
            echo "<option value='health'>Health</option>";
            echo "<option value='life'>Life Management</option>";
            echo "<option value='relations'>Relationships</option>";
            echo '</select>';
            echo '<br />'; 

            echo '<label>Priority:</label>';
            echo '<input type="checkbox" name="priority" value="priority" />';
            echo '<br />';

            echo '<label>Due Date:</label>';
            echo '<input type="text" name="due_date" />';
            echo '<br />'; 

            echo '<label>Completed Date:</label>';
            echo '<input type="text" name="completed" />';
            echo '<br />'; 
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