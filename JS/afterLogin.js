var var1;
var buttonClicked=0;
var count;
function timeoutPage(){
var1=setTimeout(showPage,3000);
}

function showPage(){
document.getElementById("afterLogin").style.display="none";
document.getElementById("head1").style.display="block";
}

function closeNav(){
document.getElementById("downnav").style.height="0px";
document.body.style.backgroundColor="white";
document.getElementById("change").style.marginBottom="0px";
}
function openNav(){
document.getElementById("downnav").style.height="125px";
}
function openSec(evt,secName){
var i,contentSec;
contentSec=document.getElementsByClassName("contentSec");
for(i=0;i<contentSec.length;i++)
{
contentSec[i].style.display="none";
}
document.getElementById(secName).style.display="block";
}

