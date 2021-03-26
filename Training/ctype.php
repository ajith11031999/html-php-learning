<?php
if(ctype_alnum("Hello123")){
   echo"string contains all alphabets or numbers"."<br>";}
if(ctype_alpha("Helloworld")){
   echo" string contains all alphabets"."<br>";}
if(ctype_digit("01234")){
   echo"string contains all digits"."<br>";}
if(ctype_space("\r\n \t")){
   echo"string contains spaces (whitespaces, tab, new line etc)"."<br>";}
if(ctype_lower("helloworld")){
   echo"string contains all lowercase characters"."<br>";}
if(ctype_upper("HELLOWORLD")){
   echo"string contains all uppercase characters"."<br>";}
if(ctype_punct("!@#~*&(){}")){
   echo"string contains all punctuation characters"."<br>";}
if(ctype_xdigit("aaff01290")){
   echo"string contains all hexadecimal digits"."<br>";}
if(ctype_print("Hello world!")){
   echo"string contains all printable characters"."<br>";}
if(ctype_graph("Hello123!@#")){
   echo"string contains all printable characters expect space"."<br>";}
	
?>

