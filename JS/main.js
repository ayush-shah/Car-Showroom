var buttonClicked=0;
function loader(){
var var1=document.readyState;
if(var1=='complete')
{
	setTimeout(function(){
		document.getElementById("loader").style.display="none";
		document.getElementById("head1").style.display="block";
	},2000);
}
else{
	document.getElementById("head1").style.display="block";
}
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
