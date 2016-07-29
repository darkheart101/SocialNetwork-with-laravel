function statusBody(elem){
	var value = elem.parentNode.parentNode.childNodes[1].innerHTML;
	$( "#editstatus" ).html( value );
	var postid = elem.parentNode.parentNode.childNodes;
	$( "#postide" ).val( postid[7].value );
}