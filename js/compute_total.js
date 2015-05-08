function compute(id) {
		console.log(id);
		qte_string = 'qte_commande'+id;
		pf_string = 'prix_final'+id;
		tt_string = 'total'+id;
		console.log(qte_string);
		console.log(tt_string);
		console.log(pf_string);
  		qte_commande = document.getElementById(qte_string);
    	prix_final = document.getElementById(pf_string);
  		totalAff = document.getElementById(tt_string);
  		total = qte_commande.value * prix_final.value ;
  		console.log(total);
  		totalAff.value = Math.round(total * 100) / 100;
  	}