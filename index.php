<?php
/**
 * Test file for the trip sorter. 
 */

    echo "<br/>" . 'Trip Sort Test Result' . "<br/>";
    echo '==============================' . "<br/>";
   
    require_once __DIR__ . '/lib/TripSorter.php';
   
  /**
   * The array for the trips
   */
  $test_tickets = array(
    array(
        "source" => "Stockholm",
        "destination" => "New York",
        "vehicle" => "Plane",
        "vehiclenumber" => "SK22",
        "seat" => "7B",
        "gate" => "22"
    ),
    array(
        "source" => "Madrid",
        "destination" => "Barcelona",
        "vehicle" => "Train",
        "vehiclenumber" => "78A",
        "seat" => "45B",
//        "gate" => "",
//        "baggage" => ""
    ),
    array(
        "source" => "Gerona Airport",
        "destination" => "Stockholm",
        "vehicle" => "Plane",
        "vehiclenumber" => "SK455",
        "seat" => "3A",
        "gate" => "45B",
        "baggage" => "334"
    ),
    array(
        "source" => "Barcelona",
        "destination" => "Gerona Airport",
        "vehicle" => "Bus",
//        "vehiclenumber" => "",
//        "seat" => "",
//        "gate" => "",
//        "baggage" => ""
    )
  );
   
    $sortedTickets = \Application\TripSorter::sort($test_tickets);
    
    

  echo "<br/>" . 'Test Results:' . "<br/>";
  
  for ($i=0; $i < count($sortedTickets); $i++) { 
        $nextArray = isset($sortedTickets[$i+1]) ? (object) $sortedTickets[$i+1] : null;
        $currentArray = (object) $sortedTickets[$i];
        $next = isset($nextArray) ? $nextArray->source : $currentArray->destination;

        echo 'PASS: ' . $currentArray->source . ' to ' . $currentArray->destination . ' by ' . $currentArray->vehicle;
        echo isset($currentArray->vehiclenumber) ? ', flight number ' . $currentArray->vehiclenumber : '';
        echo isset($currentArray->gate) ? ', gate ' . $currentArray->gate : '';
        echo isset($currentArray->seat) ? ', seat ' . $currentArray->seat : '';
        echo isset($currentArray->baggage) ? ', pick up baggage at counter ' . $currentArray->baggage : '';
        echo "<br/>";
        if ($i == count($sortedTickets) -1 ) {
          echo 'PASS: You arrived to final destination.' . "<br/>";
          break;
        }
  }
