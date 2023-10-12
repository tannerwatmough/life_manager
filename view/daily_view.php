<?php
include('header.php');

// Checks if the $habits array is populated.
$habits = filter_input(INPUT_POST, 'habits');
if ($habits == NULL) {
  $habits = filter_input(INPUT_GET, 'habits');
}
// If habits array still unpopulated, run database query to get habits.
if ($habits == NULL) {
  require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/habit_database.php");
  $habits = get_all_habits();
}
?>
<main>
  <button type="button" class="collapsible heading-large active">Daily Routines</button>

  <button type="button" class="collapsible heading-medium">Morning Routine</button>

  <section class="collapse">
    <table>
      <tr>
        <th>Habit</th>
        <th>Description</th>
        <th>Current Streak</th>
        <th>Longest Streak</th>
        <th>Start Date</th>
        <th>Last Completed Date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($habits as $habit) : 
        // Populates morning routine table with all habits where categoryId is 1
        // which corresponds to a morning routine. 
        // TO DO: Likely should be a variable which is associated with category 
        // name to category id. 
        if ($habit['category'] == 1) {
          ?>
          <tr>
            <td><?php echo htmlspecialchars($habit['name']); ?></td>
            <td><?php echo htmlspecialchars($habit['info']); ?></td>
            <td><?php echo htmlspecialchars($habit['currStreak']); ?></td>
            <td><?php echo htmlspecialchars($habit['maxStreak']); ?></td>
            <td>
              <!-- Formats time properly for table -->
              <?php echo htmlspecialchars(date('n/j/Y', strtotime($habit['startDate']))); ?>
            </td>
            <td>
              <?php 
                // If lastDate is NULL, it will set date to 1970, so instead null.
                if ($habit['lastDate'] == NULL) {
                  echo 'null';
                } else {
                  echo htmlspecialchars(date('n/j/Y', strtotime($habit['lastDate'])));
                }
              ?>
            </td>
            <td>
              <!-- Absolute path to ensure user can reach controller without error -->
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <!-- Hidden action to pass commands. Decrement here. -->
                <input type="hidden" name="action" 
                  value="decrement_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="-" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <!-- Hidden action to pass commands. Increment here. -->
                <input type="hidden" name="action" 
                  value="increment_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="+" onClick="window.location.reload()" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <!-- Hidden action to pass edit command. -->
                <input type="hidden" name="action" 
                  value="edit" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="Edit" />
              </form>
            </td>
          </tr>
          <?php } else {continue;} endforeach; ?>
    </table>
  </section>

  <!-- Give paragraphs IDs so you can return to where you were on page refresh after
       incrementing or decrementing a habit. -->
  <button type="button" class="collapsible heading-medium" id="health_rout">Health Routine</button>

  <section class="collapse">
    <table class="collapse">
      <tr>
        <th>Habit</th>
        <th>Description</th>
        <th>Current Streak</th>
        <th>Longest Streak</th>
        <th>Start Date</th>
        <th>Last Completed Date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($habits as $habit) : 
        // Populates Health Routine. TO DO: Category name instead of ID. 
        if ($habit['category'] == 3) {
          ?>
          <tr>
            <td><?php echo htmlspecialchars($habit['name']); ?></td>
            <td><?php echo htmlspecialchars($habit['info']); ?></td>
            <td><?php echo htmlspecialchars($habit['currStreak']); ?></td>
            <td><?php echo htmlspecialchars($habit['maxStreak']); ?></td>
            <td>
              <?php echo htmlspecialchars(date('n/j/Y', strtotime($habit['startDate']))); ?>
            </td>
            <td>
              <?php 
                if ($habit['lastDate'] == NULL) {
                  echo 'null';
                } else {
                  echo htmlspecialchars(date('n/j/Y', strtotime($habit['lastDate'])));
                }
              ?>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="action" 
                  value="decrement_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="hidden" name="location" value="#health_rout" />
                <input type="submit" value="-" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="action" 
                  value="increment_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="hidden" name="location" value="#health_rout" />
                <input type="submit" value="+" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#health_rout" />
                <input type="hidden" name="action" 
                  value="edit" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="Edit" />
              </form>
            </td>
          </tr>
          <?php } else {continue;} endforeach; ?>
    </table>
  </section>

  <button type="button" class="collapsible heading-medium" id="learn_rout">Learning Routine</button>

  <section class="collapse">
    <table>
      <tr>
        <th>Habit</th>
        <th>Description</th>
        <th>Current Streak</th>
        <th>Longest Streak</th>
        <th>Start Date</th>
        <th>Last Completed Date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($habits as $habit) : 
        // Populates Learning Routine. TO DO: Category name instead of ID. 
        if ($habit['category'] == 2) {
          ?>
          <tr>
            <td><?php echo htmlspecialchars($habit['name']); ?></td>
            <td><?php echo htmlspecialchars($habit['info']); ?></td>
            <td><?php echo htmlspecialchars($habit['currStreak']); ?></td>
            <td><?php echo htmlspecialchars($habit['maxStreak']); ?></td>
            <td>
              <?php echo htmlspecialchars(date('n/j/Y', strtotime($habit['startDate']))); ?>
            </td>
            <td>
              <?php 
                if ($habit['lastDate'] == NULL) {
                  echo 'null';
                } else {
                  echo htmlspecialchars(date('n/j/Y', strtotime($habit['lastDate'])));
                }
              ?>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#learn_rout" />
                <input type="hidden" name="action" 
                  value="decrement_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="-" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#learn_rout" />
                <input type="hidden" name="action" 
                  value="increment_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="+" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#learn_rout" />
                <input type="hidden" name="action" 
                  value="edit" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="Edit" />
              </form>
            </td>
          </tr>
          <?php } else {continue;} endforeach; ?>
    </table>
    <p>
      Note: Current course work includes Software Engineering, Networking, Network Security, Web Development, Data Structures and Algorithms, CompTIA A+, and other courses.
    </p>
  </section>
          
  <button type="button" class="collapsible heading-medium" id="clean_rout">Cleaning Routine</button>

  <section class="collapse">
    <table>
      <tr>
        <th>Habit</th>
        <th>Description</th>
        <th>Current Streak</th>
        <th>Longest Streak</th>
        <th>Start Date</th>
        <th>Last Completed Date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($habits as $habit) : 
        // Populates Cleaning Routine. TO DO: Category name instead of ID. 
        if ($habit['category'] == 4) {
          ?>
          <tr>
            <td><?php echo htmlspecialchars($habit['name']); ?></td>
            <td><?php echo htmlspecialchars($habit['info']); ?></td>
            <td><?php echo htmlspecialchars($habit['currStreak']); ?></td>
            <td><?php echo htmlspecialchars($habit['maxStreak']); ?></td>
            <td>
              <?php echo htmlspecialchars(date('n/j/Y', strtotime($habit['startDate']))); ?>
            </td>
            <td>
              <?php 
                if ($habit['lastDate'] == NULL) {
                  echo 'null';
                } else {
                  echo htmlspecialchars(date('n/j/Y', strtotime($habit['lastDate'])));
                }
              ?>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#clean_rout" />
                <input type="hidden" name="action" 
                  value="decrement_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="-" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#clean_rout" />
                <input type="hidden" name="action" 
                  value="increment_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="+" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php" 
                method="post">
                <input type="hidden" name="location" value="#clean_rout" />
                <input type="hidden" name="action" 
                  value="edit" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="Edit" />
              </form>
            </td>
          </tr>
          <?php } else {continue;} endforeach; ?>
    </table>
  </section>

  <button type="button" class="collapsible heading-medium" id="night_rout">Night Routine</button>

  <section class="collapse">
    <table>
      <tr>
        <th>Habit</th>
        <th>Description</th>
        <th>Current Streak</th>
        <th>Longest Streak</th>
        <th>Start Date</th>
        <th>Last Completed Date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($habits as $habit) : 
        // Populates Night Routine. TO DO: Category name instead of ID. 
        if ($habit['category'] == 5) {
          ?>
          <tr>
            <td><?php echo htmlspecialchars($habit['name']); ?></td>
            <td><?php echo htmlspecialchars($habit['info']); ?></td>
            <td><?php echo htmlspecialchars($habit['currStreak']); ?></td>
            <td><?php echo htmlspecialchars($habit['maxStreak']); ?></td>
            <td>
              <?php echo htmlspecialchars(date('n/j/Y', strtotime($habit['startDate']))); ?>
            </td>
            <td>
              <?php 
                if ($habit['lastDate'] == NULL) {
                  echo 'null';
                } else {
                  echo htmlspecialchars(date('n/j/Y', strtotime($habit['lastDate'])));
                }
              ?>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php" 
                method="post">
                <input type="hidden" name="location" value="#night_rout" />
                <input type="hidden" name="action" 
                  value="decrement_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="-" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#night_rout" />
                <input type="hidden" name="action" 
                  value="increment_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="+" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#night_rout" />
                <input type="hidden" name="action" 
                  value="edit" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="Edit" />
              </form>
            </td>
          </tr>
          <?php } else {continue;} endforeach; ?>
    </table>
  </section>
</main>
<?php include('footer.php'); ?>