var HOST="momofox";
function ld(name){//debugger
	if(!ld.container)ld.container=$("#content");
	var name=name||"index"
	$.get(HOST+"/"+name+".htm",function(html){

			ld.container.html(html);
	})

}
function sethost(h){

	HOST=h||HOST;
}

function redir(){


}