$(function main(){

	//checkhost();
	checkpage();
})


function checkpage(){
	var hash=location.hash.replace(/#/g,"");
	ld(hash||'index');
}

