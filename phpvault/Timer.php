

<?php

    print('<form method="post">
                <label>
                    Select date & time:
                    <input type="datetime-local" id="dateInput" name="dateInput">
                </label>
                <button type="submit">Set Date</button>
                </form>');

?>

<?php
    date_default_timezone_set("Europe/Helsinki");
    if (! empty($_POST['dateInput'])) {
    calculate_date();
    }

    function calculate_date()
    {

    $dateCurrent = new DateTime();
    $dateInput   = new DateTime($_POST['dateInput']);

    $datediff = $dateCurrent->diff($dateInput);

    $result = [
        'Days'    => $datediff->days,
        'Hours'   => $datediff->h,
        'Minutes' => $datediff->i,
    ];

     print('<div id="datereturn">');
     
    if($dateInput< $dateCurrent){
        print("<p id='incorrect'>Please input a future date</p>");
     }
        else {
            print($result["Days"]. "days, ".$result["Hours"]." hours, ".$result["Minutes"]." minutes");
        }
    print("</div>");
    }
    
?>

