function openSec(evt,secName){
	var i,contentSec;
	contentSec=document.getElementsByClassName("contentSec");
	for(i=0;i<contentSec.length;i++)
	{
		contentSec[i].style.display="none";
	}
	document.getElementById(secName).style.display="block";
}
