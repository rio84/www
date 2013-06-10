$(function main(){

	checkhost();
	checkpage();
})

function checkhost(){
	var h=location.host.match(/\.([\d\w]+)\.com/);
	//debugger;
	if(h&&h.length>=2)h=h[1];
	switch(h){
		case "momofox":
		case "lifanghui":
		break;
		default:
		h="momofox";
		break;
	}
	sethost(h);

}

function checkpage(){
	var hash=location.hash.replace(/#/g,"");
	ld(hash||'index');
}

