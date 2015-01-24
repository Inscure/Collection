[![Build Status](https://travis-ci.org/Inscure/Collection.svg?branch=master)](https://travis-ci.org/Inscure/Collection)

# Collection
Objective implementation of arrays in PHP

# Installation

## Composer

```json
{
    "require": {
        "inscure/collection": "1.2.1"
    }
}
```

# Usages

```php
<?php

$array = new Collection\Collection(array(1, 2, 3, 4, 5));

echo $array->get(4); // 5 

echo count($array);  // 5

foreach($array as $key => $value) {
    echo $key . '=>' . $value . '<br />';
}

// 0 => 1
// 1 => 2
// 2 => 3
// 3 => 4
// 4 => 5

$array[0] = null;

foreach($array as $key => $value) {
    echo $key . '=>' . $value . '<br />';
}

// 0 => 
// 1 => 2
// 2 => 3
// 3 => 4
// 4 => 5
```
