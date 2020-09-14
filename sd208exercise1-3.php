<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD208Exercises</title>
</head>
<body>
    <?php
        //
        $cleanSentence = preg_replace("/[,.!?]/"," ","a set of words that is complete in itself, typically containing a subject and predicate, conveying a statement, question, exclamation, or command, and consisting of a main clause and sometimes one or more subordinate clauses.");
        
        $wordArr = explode(" ",$cleanSentence);
        $uniqueWords = array();
        foreach ($wordArr as $word){
            if(!array_key_exists(strtolower($word),$uniqueWords)){
                if($word != ""){
                    echo $word." ".CountExists($word,$wordArr)."<br>";
                    $uniqueWords[strtolower($word)]= CountExists($word,$wordArr);   
                }
            }
        }
    
    function CountExists($value,$arr){
        $count = 0;
        foreach ($arr as $val){
            if($val == $value){
                $count++;
            }
        }
        return $count;
    }
    ?>
</body>
</html>