<?php
 function getTimeLeft($time){
    return DateTime::createFromFormat('G:i',$time, new DateTimeZone('Europe/Moscow'))->getTimestamp()-microtime(true);
  }
  $event='22:15';
    if(((getTimeLeft($event<300)&&(getTimeLeft($event)>240))||((getTimeLeft($event)<90)&&(getTimeLeft($event)>30))){
        echo 'hello';
              }
?>
