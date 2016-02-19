<?php

//set default values to be used when page first loads
$scores = array();
$scores[0] = 70;
$scores[1] = 80;
$scores[2] = 90;
        
$scores_string = '';
$score_total = 0;
$score_average = 0;
$max_rolls = 0;
$average_rolls = 0;

//take action based on variable in POST array
$action = filter_input(INPUT_POST, 'action');
switch ($action) {
    case 'process_scores':
        $scores = $_POST['scores'];
        $score_total = 0;
        // validate the scores - Part 6 of Exercise
        foreach ($scores as $score)
        {
            if (empty($score))
                {
                    $scores_string = 'You must enter three valid numbers for scores.';
                    $score_total = 0;
                    break;
                }
            else
            {
                // Total the scores - Part 5 of Exercise                
                {
                    $score_total += $scores[$i];
                }
            }
        }
        if (empty($scores_string))
        {
            foreach ($scores as $s) {
            $scores_string .= $s . '|';
            }
                
        $scores_string = substr($scores_string, 0, strlen($scores_string)-1);

        // Total the scores - Part 5 of Exercise
        
        for ($i=0;$i<count($scores);$i++)
        {
            $score_total += $scores[$i];
        }
        
        // calculate the average
        $score_average = $score_total / count($scores);
        
        // format the total and average
        $score_total_f = number_format($score_total, 2);
        $score_average_f = number_format($score_average, 2);

        }
        break;
    case 'process_rolls':
        $number_to_roll = filter_input(INPUT_POST, 'number_to_roll', 
                FILTER_VALIDATE_INT);

        $total = 0;
        $count = 0;
        $max_rolls = -INF;

        // TODO: convert this while loop to a for loop
        
        for ($count=0;$count<10000;$count++)
        {
            $rolls = 1;
            while (mt_rand(1, 6) !=6)
            {
                $rolls++;
            }
            $total += $rolls;
            $count++;
            $max_rolls = max($rolls, $max_rolls);
        }
        $average_rolls = $total / $count;
        
        /*
        while ($count < 10000) {
            $rolls = 1;
            while (mt_rand(1, 6) != 6) {
                $rolls++;
            }
            $total += $rolls;
            $count++;
            $max_rolls = max($rolls, $max_rolls);
        }
        $average_rolls = $total / $count;
*/
        break;
}
include 'loop_tester.php';
?>