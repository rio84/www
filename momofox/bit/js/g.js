function g(id){
	return document.getElementById(id)
};
//buy sell都是以本人行为，与市场上买卖相反
function ExchangeAgency(buyRate,sellRate){

	this.buyRate=buyRate;
	this.sellRate=sellRate;
}
ExchangeAgency.prototype={

	buy:function(rmb){
		return rmb/this.buyRate;
	},
	sell:function(usd){

		return usd*this.sellRate;
	}
};
function TradeCenter(depositFee,tradeFee,withdrawFee,withdrawBTCCost,buyPrice,sellPrice){

	this.depositFee=depositFee/100;
	this.tradeFee=tradeFee/100;
	this.withdrawFee=withdrawFee/100;
	this.withdrawBTCCost=withdrawBTCCost;
	this.buyPrice=buyPrice||800;
	this.sellPrice=sellPrice||800;
}
TradeCenter.prototype={
	deposit:function(money){
		return money*(1-this.depositFee);
	},
	buy:function(money){
		return money/this.buyPrice*(1-this.tradeFee);

	},
	sell:function(btc){

		return btc*this.sellPrice*(1-this.tradeFee);
	},
	withdraw:function(money){
		return money*(1-this.withdrawFee);
	},
	withdrawBtc:function(btc){

		return btc-this.withdrawBTCCost;
	},
	moneyInBTCOut:function(money){

		return this.withdrawBtc(this.buy(this.deposit(money)));
	},
	BTCInMoneyOut:function(btc){
		return this.withdraw(this.sell(btc));
	}
};
