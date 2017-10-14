function Split(myURL) 
{
   var myDir = myURL.substring( 0, myURL.lastIndexOf( "/" ) + 1);
   return myDir;
}
function run(path)
{
   var _path = Split(path);
   var x = document.getElementById("select").selectedIndex;
   strUser = document.getElementsByTagName("option")[x].value;
   if(strUser == "romana" || strUser == "Roumanian" || strUser=="Romana")
   {
     document.location.href = _path + "index.html";
   }
   else
   {
      document.location.href = _path + "index_en.html";
   }
}
