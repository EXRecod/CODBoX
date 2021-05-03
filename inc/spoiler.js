function show_match(id){
	now=document.getElementById('match_sub'+id).style.display;
	if(now=='block')
		document.getElementById('match_sub'+id).style.display='none';
	else
		document.getElementById('match_sub'+id).style.display='block';
}
