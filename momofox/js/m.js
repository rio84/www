
function ld(name){//debugger
	if(!ld.container)ld.container=$("#content");
	var name=name||"index"
	$.get("pages/"+name+".htm",function(html){

			ld.container.html(html);
	})

}


function redir(){


}