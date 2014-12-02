<?php

$json = json_encode(
        array(
            0 => array(
                'Inglés' => array(
                    'One',
                    'January'
                ),
                'Francés' => array(
                    'Une',
                    'Janvier'
                )
            )
        )
);
$animal = array(
    array("Perro", "Gato"),
    array("Lombriz", "Burro"),
    array("Murciélago", "Cocodrilo")
);

$data = array(
    array('id' => 1, 'parent_id' => null, 'name' => 'lorem ipsum'),
    array('id' => 2, 'parent_id' => 1, 'name' => 'lorem ipsum1'),
    array('id' => 3, 'parent_id' => 1, 'name' => 'lorem ipsum2'),
    array('id' => 4, 'parent_id' => 2, 'name' => 'lorem ipsum3'),
    array('id' => 5, 'parent_id' => 3, 'name' => 'lorem ipsum4'),
    array('id' => 6, 'parent_id' => null, 'name' => 'lorem ipsum5'),
);

$itemsByReference = array();

// Build array of item references:
foreach($data as $key => &$item) {
   $itemsByReference[$item['id']] = &$item;
   // Children array:
   $itemsByReference[$item['id']]['children'] = array();
   // Empty data class (so that json_encode adds "data: {}" ) 
   $itemsByReference[$item['id']]['data'] = new StdClass();
}

// Set items as children of the relevant parent item.
foreach($data as $key => &$item)
   if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
      $itemsByReference [$item['parent_id']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
foreach($data as $key => &$item) {
   if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
      unset($data[$key]);
}

// Encode:
//$json1= json_encode($data);
echo json_encode($data);
