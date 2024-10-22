<?php

namespace App\Controllers;

class ScheduleController
{
    public function fetchSchedule()
    {
        $selectedTeacher = $_GET['selectedTeacher'] ?? 'default_teacher';
        $dayOfWeek = $_GET['dayOfWeek'] ?? (date("w") - 1);
        $currentTime = $_GET['currentTime'] ?? date("H:i");

        $schedule = $this->getSchedule($selectedTeacher, $dayOfWeek, $currentTime);
        if ($schedule != ""){
            echo $schedule;
        }
        else{ echo "Har ingen lektion just nu"; }
        
    }

    private function getSchedule($selectedTeacher, $day, $currentTime)
    {
        $output = '';
        $csvFile = getcwd() . "/admin/teacherSchedules/$selectedTeacher.csv";
        
        if (file_exists($csvFile) && ($csvHandle = fopen($csvFile, "r")) !== FALSE) {
            while (($scheduleData = fgetcsv($csvHandle, 1000, ",")) !== FALSE) {
                if (isset($scheduleData[1]) && strtolower($scheduleData[1]) === strtolower($this->getDayName($day))) {
                    $lesson = $scheduleData[0];
                    $startTime = $scheduleData[2];
                    $endTime = $scheduleData[3];
                    $classroom = $scheduleData[4];
                    
                    if ($currentTime >= $startTime && $currentTime <= $endTime) {
                        $output .= "$startTime-$endTime: $lesson | Sal $classroom\n";
                    }
                }
            }

            fclose($csvHandle);
        } else {
            $output = "unable to open csv file";
        }
        return $output;
    }

    private function getDayName($dayIndex)
    {
        $days = ["Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag", "Söndag"];
        return $days[$dayIndex] ?? 'Unknown day';
    }
}
