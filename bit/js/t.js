
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
function soki(){
    var conn = io.connect('https://socketio.mtgox.com/mtgox');
    conn.on('connect',function(){
    	console.log('connect')

    });
    conn.on('message', function(data) {
        // Handle incoming data object.
        console.log(data)
    });
    conn.on('error',function(data){
    	console.log('error')


    })
    conn.on('disconnect',function(data){
    	console.log('disconnect')


    })
}
soki();
