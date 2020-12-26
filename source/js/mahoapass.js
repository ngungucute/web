<html>
<head>
<script language="javascript">
function randStrings(howMany, howLong) {
var characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ"+
"abcdefghiklmnopqrstuvwxyz";
for (var i=0;i<howMany;i++)
{
var word="";
for (var j=0;j<howLong;j++)
{
var rand = Math.floor(Math.random() * characters.length);
word += characters.substring(rand,rand+1);
}
document.writeln(word);

}
//return word;
}
</Script>
</head>