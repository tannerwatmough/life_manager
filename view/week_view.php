<?php
include('header.php');

// Checks if the $habits array is populated.
$weeklies = filter_input(INPUT_POST, 'weeklies');
if ($weeklies == NULL) {
  $weeklies = filter_input(INPUT_GET, 'weeklies');
}
// If habits array still unpopulated, run database query to get habits.
if ($weeklies == NULL) {
  require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/task_database.php");
  $weeklies = get_all_weekly();
}
?>
<main>
    <div class="container">
        <a href="/life_manager/controller/day_controller.php">Daily Tasks</a>
        <a href="/life_manager/controller/week_controller.php">Weekly Tasks</a>
        <a href="/life_manager/controller/month_controller.php">Monthly Tasks</a>
        <a href="/life_manager/controller/seasonal_controller.php">Seasonal Tasks</a>
    </div>

    <h2>Weekly Routines</h2>
    
    <button type="button" class="collapsible heading-medium active">Cleaning</button>

    <section class="collapse">
        <table>
        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Current Streak</th>
            <th>Longest Streak</th>
            <th>Start Date</th>
            <th>Last Completed Date</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($weeklies as $weekly) : 
            // Populates weekly cleaning table with all weeklies where categoryId is 6
            // which corresponds to a cleaning routine. 
            // TO DO: Likely should be a variable which is associated with category 
            // name to category id. 
            if ($weekly['category'] == 6) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($weekly['name']); ?></td>
                <td><?php echo htmlspecialchars($weekly['info']); ?></td>
                <td><?php echo htmlspecialchars($weekly['currStreak']); ?></td>
                <td><?php echo htmlspecialchars($weekly['maxStreak']); ?></td>
                <td>
                <!-- Formats time properly for table -->
                <?php echo htmlspecialchars(date('n/j/Y', strtotime($weekly['startDate']))); ?>
                </td>
                <td>
                <?php 
                    // If lastDate is NULL, it will set date to 1970, so instead null.
                    if ($weekly['lastDate'] == NULL) {
                    echo 'null';
                    } else {
                    echo htmlspecialchars(date('n/j/Y', strtotime($weekly['lastDate'])));
                    }
                ?>
                </td>
                <td>
                <!-- Absolute path to ensure user can reach controller without error -->
                <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Decrement here. -->
                    <input type="hidden" name="action" 
                    value="decrement_value" />
                    <input type="hidden" name="week_id" 
                    value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="-" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Increment here. -->
                    <input type="hidden" name="action" 
                    value="increment_value" />
                    <input type="hidden" name="week_id" 
                    value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="+" onClick="window.location.reload()" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit" />
                    <input type="hidden" name="week_id" 
                    value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } else {continue;} endforeach; ?>
        </table>
    </section>

    <button type="button" class="collapsible heading-medium active" id="health">Health</button>

    <section class="collapse">
        <table>
        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Current Streak</th>
            <th>Longest Streak</th>
            <th>Start Date</th>
            <th>Last Completed Date</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($weeklies as $weekly) : 
            // Populates weekly cleaning table with all weeklies where categoryId is 6
            // which corresponds to a cleaning routine. 
            // TO DO: Likely should be a variable which is associated with category 
            // name to category id. 
            if ($weekly['category'] == 7) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($weekly['name']); ?></td>
                <td><?php echo htmlspecialchars($weekly['info']); ?></td>
                <td><?php echo htmlspecialchars($weekly['currStreak']); ?></td>
                <td><?php echo htmlspecialchars($weekly['maxStreak']); ?></td>
                <td>
                <!-- Formats time properly for table -->
                <?php echo htmlspecialchars(date('n/j/Y', strtotime($weekly['startDate']))); ?>
                </td>
                <td>
                <?php 
                    // If lastDate is NULL, it will set date to 1970, so instead null.
                    if ($weekly['lastDate'] == NULL) {
                    echo 'null';
                    } else {
                    echo htmlspecialchars(date('n/j/Y', strtotime($weekly['lastDate'])));
                    }
                ?>
                </td>
                <td>
                <!-- Absolute path to ensure user can reach controller without error -->
                <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Decrement here. -->
                    <input type="hidden" name="location" value="#health" />
                    <input type="hidden" name="action" 
                    value="decrement_value" />
                    <input type="hidden" name="week_id" 
                    value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="-" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Increment here. -->
                    <input type="hidden" name="location" value="#health" />
                    <input type="hidden" name="action" 
                    value="increment_value" />
                    <input type="hidden" name="week_id" 
                    value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="+" onClick="window.location.reload()" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="location" value="#health" />
                    <input type="hidden" name="action" 
                    value="edit" />
                    <input type="hidden" name="week_id" 
                    value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } else {continue;} endforeach; ?>
        </table>
    </section>

    
    <button type="button" class="collapsible heading-medium active" id="relationships">Relationships</button>

    <section class="collapse">
        <table>
        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Current Streak</th>
            <th>Longest Streak</th>
            <th>Start Date</th>
            <th>Last Completed Date</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($weeklies as $weekly) : 
            // Populates weekly cleaning table with all weeklies where categoryId is 6
            // which corresponds to a cleaning routine. 
            // TO DO: Likely should be a variable which is associated with category 
            // name to category id. 
            if ($weekly['category'] == 8) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($weekly['name']); ?></td>
                <td><?php echo htmlspecialchars($weekly['info']); ?></td>
                <td><?php echo htmlspecialchars($weekly['currStreak']); ?></td>
                <td><?php echo htmlspecialchars($weekly['maxStreak']); ?></td>
                <td>
                <!-- Formats time properly for table -->
                <?php echo htmlspecialchars(date('n/j/Y', strtotime($weekly['startDate']))); ?>
                </td>
                <td>
                <?php 
                    // If lastDate is NULL, it will set date to 1970, so instead null.
                    if ($weekly['lastDate'] == NULL) {
                    echo 'null';
                    } else {
                    echo htmlspecialchars(date('n/j/Y', strtotime($weekly['lastDate'])));
                    }
                ?>
                </td>
                <td>
                <!-- Absolute path to ensure user can reach controller without error -->
                <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Decrement here. -->
                    <input type="hidden" name="action" 
                    value="decrement_value" />
                    <input type="hidden" name="location" value="#relationships" />
                    <input type="hidden" name="week_id" 
                    value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="-" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Increment here. -->
                    <input type="hidden" name="action" 
                    value="increment_value" />
                    <input type="hidden" name="location" value="#relationships" />
                    <input type="hidden" name="week_id" 
                    value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="+" onClick="window.location.reload()" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit" />
                    <input type="hidden" name="location" value="#relationships" />
                    <input type="hidden" name="week_id" 
                    value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } else {continue;} endforeach; ?>
        </table>
    </section>

    <button type="button" class="collapsible heading-medium active" id="life">Life Management</button>

    <section class="collapse">
        <table>
            <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Current Streak</th>
            <th>Longest Streak</th>
            <th>Start Date</th>
            <th>Last Completed Date</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            </tr>

            <?php foreach ($weeklies as $weekly) : 
            // Populates weekly cleaning table with all weeklies where categoryId is 6
            // which corresponds to a cleaning routine. 
            // TO DO: Likely should be a variable which is associated with category 
            // name to category id. 
            if ($weekly['category'] == 9) {
                ?>
                <tr>
                <td><?php echo htmlspecialchars($weekly['name']); ?></td>
                <td><?php echo htmlspecialchars($weekly['info']); ?></td>
                <td><?php echo htmlspecialchars($weekly['currStreak']); ?></td>
                <td><?php echo htmlspecialchars($weekly['maxStreak']); ?></td>
                <td>
                    <!-- Formats time properly for table -->
                    <?php echo htmlspecialchars(date('n/j/Y', strtotime($weekly['startDate']))); ?>
                </td>
                <td>
                    <?php 
                    // If lastDate is NULL, it will set date to 1970, so instead null.
                    if ($weekly['lastDate'] == NULL) {
                        echo 'null';
                    } else {
                        echo htmlspecialchars(date('n/j/Y', strtotime($weekly['lastDate'])));
                    }
                    ?>
                </td>
                <td>
                    <!-- Absolute path to ensure user can reach controller without error -->
                    <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Decrement here. -->
                    <input type="hidden" name="location" value="#life" />
                    <input type="hidden" name="action" 
                        value="decrement_value" />
                    <input type="hidden" name="week_id" 
                        value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="-" />
                    </form>
                </td>
                <td>
                    <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Increment here. -->
                    <input type="hidden" name="location" value="#life" />
                    <input type="hidden" name="action" 
                        value="increment_value" />
                    <input type="hidden" name="week_id" 
                        value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="+" onClick="window.location.reload()" />
                    </form>
                </td>
                <td>
                    <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="location" value="#life" />
                    <input type="hidden" name="action" 
                        value="edit" />
                    <input type="hidden" name="week_id" 
                        value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="Edit" />
                    </form>
                </td>
                </tr>
                <?php } else {continue;} endforeach; ?>
        </table>
    </section>


    <button type="button" class="collapsible heading-medium active" id="career">Career</button>

    <section class="collapse">
        <table>
        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Current Streak</th>
            <th>Longest Streak</th>
            <th>Start Date</th>
            <th>Last Completed Date</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($weeklies as $weekly) : 
            // Populates weekly cleaning table with all weeklies where categoryId is 6
            // which corresponds to a cleaning routine. 
            // TO DO: Likely should be a variable which is associated with category 
            // name to category id. 
            if ($weekly['category'] == 10) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($weekly['name']); ?></td>
                <td><?php echo htmlspecialchars($weekly['info']); ?></td>
                <td><?php echo htmlspecialchars($weekly['currStreak']); ?></td>
                <td><?php echo htmlspecialchars($weekly['maxStreak']); ?></td>
                <td>
                <!-- Formats time properly for table -->
                <?php echo htmlspecialchars(date('n/j/Y', strtotime($weekly['startDate']))); ?>
                </td>
                <td>
                <?php 
                    // If lastDate is NULL, it will set date to 1970, so instead null.
                    if ($weekly['lastDate'] == NULL) {
                    echo 'null';
                    } else {
                    echo htmlspecialchars(date('n/j/Y', strtotime($weekly['lastDate'])));
                    }
                ?>
                </td>
                <td>
                <!-- Absolute path to ensure user can reach controller without error -->
                <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Decrement here. -->
                    <input type="hidden" name="action" 
                    value="decrement_value" />
                    <input type="hidden" name="location" value="#career" />
                    <input type="hidden" name="week_id" 
                    value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="-" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Increment here. -->
                    <input type="hidden" name="action" 
                    value="increment_value" />
                    <input type="hidden" name="location" value="#career" />
                    <input type="hidden" name="week_id" 
                    value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="+" onClick="window.location.reload()" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/week_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit" />
                    <input type="hidden" name="location" value="#career" />
                    <input type="hidden" name="week_id" 
                    value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } else {continue;} endforeach; ?>
        </table>
    </section>

    <!-- Give paragraphs IDs so you can return to where you were on page refresh after
       incrementing or decrementing a habit. -->

       <button type="button" class="collapsible heading-medium active" id="growth">Growth</button>

        <section class="collapse">
            <table>
                <tr>
                <th>Task</th>
                <th>Description</th>
                <th>Current Streak</th>
                <th>Longest Streak</th>
                <th>Start Date</th>
                <th>Last Completed Date</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>

                <?php foreach ($weeklies as $weekly) : 
                // Populates weekly cleaning table with all weeklies where categoryId is 6
                // which corresponds to a cleaning routine. 
                // TO DO: Likely should be a variable which is associated with category 
                // name to category id. 
                if ($weekly['category'] == 11) {
                    ?>
                    <tr>
                    <td><?php echo htmlspecialchars($weekly['name']); ?></td>
                    <td><?php echo htmlspecialchars($weekly['info']); ?></td>
                    <td><?php echo htmlspecialchars($weekly['currStreak']); ?></td>
                    <td><?php echo htmlspecialchars($weekly['maxStreak']); ?></td>
                    <td>
                        <!-- Formats time properly for table -->
                        <?php echo htmlspecialchars(date('n/j/Y', strtotime($weekly['startDate']))); ?>
                    </td>
                    <td>
                        <?php 
                        // If lastDate is NULL, it will set date to 1970, so instead null.
                        if ($weekly['lastDate'] == NULL) {
                            echo 'null';
                        } else {
                            echo htmlspecialchars(date('n/j/Y', strtotime($weekly['lastDate'])));
                        }
                        ?>
                    </td>
                    <td>
                        <!-- Absolute path to ensure user can reach controller without error -->
                        <form action="https://localhost/life_manager/controller/week_controller.php"
                        method="post">
                        <!-- Hidden action to pass commands. Decrement here. -->
                        <input type="hidden" name="location" value="#growth" />
                        <input type="hidden" name="action" 
                            value="decrement_value" />
                        <input type="hidden" name="week_id" 
                            value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                        <input type="submit" value="-" />
                        </form>
                    </td>
                    <td>
                        <form action="https://localhost/life_manager/controller/week_controller.php"
                        method="post">
                        <!-- Hidden action to pass commands. Increment here. -->
                        <input type="hidden" name="location" value="#growth" />
                        <input type="hidden" name="action" 
                            value="increment_value" />
                        <input type="hidden" name="week_id" 
                            value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                        <input type="submit" value="+" onClick="window.location.reload()" />
                        </form>
                    </td>
                    <td>
                        <form action="https://localhost/life_manager/controller/week_controller.php"
                        method="post">
                        <!-- Hidden action to pass edit command. -->
                        <input type="hidden" name="location" value="#growth" />
                        <input type="hidden" name="action" 
                            value="edit" />
                        <input type="hidden" name="week_id" 
                            value="<?php echo htmlspecialchars($weekly['weeklyId']); ?>" />
                        <input type="submit" value="Edit" />
                        </form>
                    </td>
                    </tr>
                    <?php } else {continue;} endforeach; ?>
            </table>
        </section>

</main>
<script>
  // Script from https://www.w3schools.com/howto/howto_js_collapsible.asp
  // Toggles the table to display or not. 
  var collapsible = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < collapsible.length; i++) {
    collapsible[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.display === "none") {
        content.style.display = "block";
      } else {
        content.style.display = "none";
      }
    });
  }
</script>
<?php include('footer.php'); ?>