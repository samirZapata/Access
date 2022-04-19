<?php

function inputElement($icon, $placeholder, $name, $value)
{

    
$ele = "

    <div class=\"input-group mb-2\">
        <div class=\"input-group-propend\">
        </div>
        <input type=\"input\" name='$name' value='$value' autocomplete=\"off\" placeholder='$placeholder' class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"Username\">
    </div>";

    echo $ele;
}

function buttonElement($btnid, $btnStyle, $btnText, $btnName, $btnattr)
{
    $btn = "

    <button name='$btnName''$btnattr' class='$btnStyle' id='$btnid'>$btnText</button>";
    echo $btn;
}

//<div class=\"input-group-text \">$icon</div>