<?php

    function WriteMoney($num)
    {
        if ($num == 0) return 0;

        $total = (string)$num;
        $total = strrev($total);

        $total = str_split($total);


        $result = [];
        for ($i = 0; $i < count($total); $i++) {
            if ($i % 3 == 0 && $i != 0) {
                array_push($result, ".");
            }
            array_push($result, $total[$i]);

        }
        $totalString = implode("", $result);
        $totalString = strrev($totalString);

        return $totalString;

    }


