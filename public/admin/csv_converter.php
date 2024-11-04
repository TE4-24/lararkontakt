<?php
$filename = 'schema.txt';
$track_row = 0;
$track_row_lessons = 0;
$initials = array();
$lessons = array();

function add_minutes_to_time($old_time, $minutes_to_add) {
    $old_time_split = explode(":", $old_time);
    $old_time_minutes = intval($old_time_split[1]);
    $old_time_hours = intval($old_time_split[0]);
    $new_time_minutes = $old_time_minutes + intval($minutes_to_add);
    $new_time_hours = $old_time_hours + intdiv($new_time_minutes, 60);
    $new_time_minutes = $new_time_minutes % 60;
    return sprintf("%02d:%02d", $new_time_hours, $new_time_minutes);
}

$fileContents = file_get_contents($filename);
$lines = explode(PHP_EOL, $fileContents);
foreach ($lines as $i => $line) {
    $line = explode("\t", $line);
    if ($line[0] == 'Teacher (6001)') {
        $track_row = $i;
    }
    if ($i > $track_row) {
        if (strpos($line[0],"Student (7200)") !== false) {
            break;
        }
        if($track_row != 0) {
            $initials[] = $line[0];
        }
    }
}

foreach ($lines as $i => $line) {
    $line = explode("\t", $line);
    print_r($line);
    echo "<br>";
    if ($line[0] == "PK (7100)") {
        $track_row_lessons = $i;
    }
    if ($i > $track_row_lessons) {
        if($track_row_lessons != 0) {
            foreach ($initials as $initial) {
                if ($line[10] == "P2" || $line[10] == ""){
                    if (isset($line[7]) && $line[7] == $initial) {
                        if ($line[2] == "M�ndag") {
                            $line[2] = "Måndag";
                        }
                        $lessons[$initial][] = array(
                                'lesson' => $line[6],
                                'day' => $line[2],
                                'start' => $line[3],
                                'end' => add_minutes_to_time($line[3], $line[4]),
                                'classroom' => $line[9]
                        );
                    }
                }
            }
        }
    }
}

foreach ($initials as $initial) {
    if (!file_exists("teacherSchedules")) {
        mkdir("teacherSchedules", 0777, true);
    }
    if ($initial == "") {
        continue;
    }
    $teacherLessons = fopen("teacherSchedules/" . $initial . ".csv", 'w') or die('Could not open file');
    foreach ($lessons[$initial] as $lesson) {
        fwrite($teacherLessons, $lesson['lesson'] . "," . $lesson['day'] . "," . $lesson['start'] . "," . $lesson['end'] . "," . $lesson['classroom'] . "\n");
    }
}