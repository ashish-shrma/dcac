<?php
include '_database/database.php';

$file_handle = fopen("Data.csv", "r");
function strrevpos($instr, $needle)
{
    $rev_pos = strpos (strrev($instr), strrev($needle));
    if ($rev_pos===false) return false;
    else return strlen($instr) - $rev_pos - strlen($needle);
};
 function before ($this, $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $this));
    };
function after ($this, $inthat)
    {
        if (!is_bool(strpos($inthat, $this)))
        return substr($inthat, strpos($inthat,$this)+strlen($this));
    };
function after_last ($this, $inthat)
    {
        if (!is_bool(strrevpos($inthat, $this)))
        return substr($inthat, strrevpos($inthat, $this)+strlen($this));
    };
 function between ($this, $that, $inthat)
    {
        return before ($that, after($this, $inthat));
    };
 function before_last ($this, $inthat)
    {
        return substr($inthat, 0, strrevpos($inthat, $this));
    };

while (!feof($file_handle) ) {

$line_of_text = fgetcsv($file_handle, 1024);
//$type=gettype($line_of_text[1]);
   // echo $type;
   $prefix= before (' ', $line_of_text[2]);
   $last_name=after_last (' ', $line_of_text[2]);
  // $first_name=between (' ',' ', $line_of_text[2]);
   $first=after (' ', $line_of_text[2]);
   $first_name=before_last (' ', $first);
    
    
    //echo $first_name;
    //echo $prefix;
    //echo $first_name."<br>";
    $sql="INSERT INTO user(user_prefix,user_firstname,user_lastname,user_email,user_username,user_password,user_joindate,user_avatar,user_profession,user_papers) VALUES('$prefix','$first_name','$last_name','$line_of_text[4]','$line_of_text[4]','default_password',CURRENT_TIMESTAMP,'default.jpg','$line_of_text[3]','$line_of_text[1]')";
        mysqli_query($database,$sql)or die(mysqli_error($database));
print $line_of_text[1] .",". $prefix.",".$first_name.",".$last_name.",". $line_of_text[3].",". $line_of_text[4]. "<BR>";
}

?>