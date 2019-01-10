function openSec(evt,secName){
	var i,contentSec;
	contentSec=document.getElementsByClassName("contentSec");
	for(i=0;i<contentSec.length;i++)
	{
		contentSec[i].style.display="none";
	}
	document.getElementById(secName).style.display="block";
	if(secName=="ChangePass" || secName=="RemAcc")
	{
		document.getElementById("staffimg").style.display="none";
	}
	else {
		document.getElementById("staffimg").style.display="block";
	}
}
