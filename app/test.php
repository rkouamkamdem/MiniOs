<?php
array(3)
{ 
    [0]=> array(3) 
    { 
        [0]=> array(2) 
        { 
            [0]=> array(4) 
            { 
                ["nom"]=> string(5) "Kouam" ["prenom"]=> string(6) "Roméo" ["email"]=> string(21) "rkouamkamdem@yahoo.fr" ["description"]=> string(12) "Fiche roméo" 
            } 
            [1]=> array(5) 
            { 
                ["name"]=> array(1) { ["photo"]=> string(13) "victoire.jpeg" } 
                ["type"]=> array(1) { ["photo"]=> string(10) "image/jpeg" } 
                ["tmp_name"]=> array(1) { ["photo"]=> string(25) "/opt/lampp/temp/phpQEA1iD" }
                ["error"]=> array(1) { ["photo"]=> int(0) } 
                ["size"]=> array(1) { ["photo"]=> int(5534) } 
            } 
        }   
        [1]=> array(4) 
        { 
            ["nom"]=> string(8) "Guianing" ["prenom"]=> string(5) "Nelly" ["email"]=> string(15) "nezlly@yahoo.fr" ["description"]=> string(11) "Fiche Nelly" 
        } 
        [2]=> array(5)
        { 
            ["name"]=> array(1) { ["photo"]=> string(10) "index.jpeg" } 
            ["type"]=> array(1) { ["photo"]=> string(10) "image/jpeg" } 
            ["tmp_name"]=> array(1) { ["photo"]=> string(25) "/opt/lampp/temp/phpxeJAMG" }
            ["error"]=> array(1) { ["photo"]=> int(0) } 
            ["size"]=> array(1) { ["photo"]=> int(3958) } 
        } 
    } 
    [1]=> array(4) 
    { 
        ["nom"]=> string(8) "Liananha" ["prenom"]=> string(5) "Jimmy" ["email"]=> string(14) "jimmy@yahoo.fr" ["description"]=> string(11) "Fiche Jimmy" 
    } 
    [2]=> array(5)
    { 
        ["name"]=> array(1) { ["photo"]=> string(27) "SNCF_PORTAI_MAINTENANCE.png" } 
        ["type"]=> array(1) { ["photo"]=> string(9) "image/png" }
        ["tmp_name"]=> array(1) { ["photo"]=> string(25) "/opt/lampp/temp/phpTzXBOa" }
        ["error"]=> array(1) { ["photo"]=> int(0) } 
        ["size"]=> array(1) { ["photo"]=> int(521313) } 
    } 
}
----------------------------------------------------------------------------------------------------------------------------
[
    [
        [
            {"nom":"Kouam","prenom":"Rom\u00e9o","email":"rkouamkamdem@yahoo.fr","description":"Fiche rom\u00e9o"},
            {"name":{"photo":"victoire.jpeg"},"type":{"photo":"image\/jpeg"},"tmp_name":{"photo":"\/opt\/lampp\/temp\/phpQEA1iD"},"error":{"photo":0},"size":{"photo":5534}}
        ],
            {"nom":"Guianing","prenom":"Nelly","email":"nezlly@yahoo.fr","description":"Fiche Nelly"},
            {"name":{"photo":"index.jpeg"},"type":{"photo":"image\/jpeg"},"tmp_name":{"photo":"\/opt\/lampp\/temp\/phpxeJAMG"},"error":{"photo":0},"size":{"photo":3958}}
    ],
            {"nom":"Liananha","prenom":"Jimmy","email":"jimmy@yahoo.fr","description":"Fiche Jimmy"},
            {"name":{"photo":"SNCF_PORTAI_MAINTENANCE.png"},"type":{"photo":"image\/png"},"tmp_name":{"photo":"\/opt\/lampp\/temp\/phpTzXBOa"},"error":{"photo":0},"size":{"photo":521313}}
]


 // implode keys of $array...
   $sql .= " (`".implode("`, `", array_keys($array))."`)";

   // implode values of $array...
   $sql .= " VALUES ('".implode("', '", $array)."') ";
