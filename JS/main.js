var var1;
var buttonClicked=0;
function timeoutPage(){
var1=setTimeout(showPage,000);
}

function showPage(){
document.getElementById("loader").style.display="none";
document.getElementById("head1").style.display="block";
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
