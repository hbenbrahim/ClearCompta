function compute(id) {
	qte_string = 'qte_commande'+id;
	pf_string = 'prix_final'+id;
	tt_string = 'total'+id;
	qte_commande = document.getElementById(qte_string);
  	prix_final = document.getElementById(pf_string);
 	totalAff = document.getElementById(tt_string);
 	total = qte_commande.value * prix_final.value ;
 	totalAff.value = Math.round(total * 100) / 100;
 }
 function get_total(){
 	var choices = [];
 	var ttl = 0;
	var els = document.getElementsByName('product[]');
	for (var i=0;i<els.length;i++){
  		if ( els[i].checked ) {
    		choices.push(els[i].value);
    		console.log("els[i].value : " + els[i].value);
  		}
	}
	for (var i=0;i<choices.lenght;i++){
		ttl = ttl + choices[i];
	}
	console.log(ttl);
 }
