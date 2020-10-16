<?php
$input = explode(", ", readline());

echo formatTemplate($input);

function formatTemplate($input)
{
    $output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $output .= "<quiz>\n";
    for ($i = 0; $i < count($input); $i += 2) {
        $question = $input[$i];
        $answer = $input[$i + 1];
        $output .= "    <question>\n   {$question}\n     </question>\n";
        $output .= "    <answer>\n  {$answer}\n     </answer>\n";
    }
    $output .= "</quiz>";
    return $output;
}
