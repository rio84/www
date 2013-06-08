
var Uri={
	
	ticker:'http://data.mtgox.com/api/2/BTCUSD/money/ticker',
	trade:''
};
function toget(api,cb){
	$.getJSON('toget.php?api='+api,function(res){
		if(res.result=="success"){
			cb(res.data);
		}
	});
}
function ticker(){
	toget(Uri.ticker,function(data){
		//alert(json.result);
		//var hight
	});
}

