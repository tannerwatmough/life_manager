<?php 
// Start session management
// session_start();

// Get selected action from GET or POST array and set to home if not set.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

$quotes = array(
  1 => 'Use weekends to create the life you want, not to escape the life you have.',
  2 => 'Time will seem to go slower (as it races by as you get older) if you break up your routine and make more memorable memories.',
  3 => 'The grass is greenest where you water it.',
  4 => 'If you have a problem with me, text me, and if you do not have my number, you do not know me well enough to have a problem with me.',
  5 => "I don't *f*eel particularly proud of myself, but when I walk alone in the woods or lie alone in the meadows, all is well. - Franz Kafka",
  6 => "Start with small wins to build trust with yourself that you'll follow through on things. Start with just saying you're going to clean your room and then do it. Get groomed. Read a chapter. This will build trust with yourself that you can do anything you set your mind to.",
  7 => "Imagine watching a movie where the main character sat in their room on their phone all day. That movie would suck, wouldn't it? Go do some memory-making shit.",
  8 => "Ask yourself what's the best that can happen instead of what's the worst that can happen?",
  9 => 'Do the verb instead of trying to be the noun.',
  10 => 'Your bucket list now has a time line. Do as much of your bucket list as you can within the next three year.'
);

// Direct user to page based on link action
switch ($action) {
  default:
    $quote = $quotes[rand(1, 10)];  
    include('view/home_view.php');
    break;
}
?>