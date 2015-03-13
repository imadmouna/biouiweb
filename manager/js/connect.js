// JavaScript Document

function update_client(){
	var msg = "";
	
	nom = document.getElementById("nom").value;	
	type_compte = document.getElementById("type_compte").value;	
	sexe = document.getElementById("sexe").value;	
	facturation = document.getElementById("facturation").value;	
	livraison = document.getElementById("livraison").value;	
	date_n = document.getElementById("date_n").value;	
	
	pass1 = document.getElementById("pass1").value;	
	pass2 = document.getElementById("pass2").value;	
	
	tel = document.getElementById("tel").value;	
	fax = document.getElementById("fax").value;	
	ville = document.getElementById("ville").value;	
	cp = document.getElementById("cp").value;	
	
	if(!nom)msg += "Le nom est vide.\n";
	if(!type_compte)msg += "Le type de compte est vide.\n";
	if(!sexe)msg += "Le sexe doit être sélectioné.\n";
	if(!facturation)msg += "L'adresse de facturation est vide.\n";
	if(!livraison)msg += "L'adresse de livraison est vide.\n";
	if(!date_n)msg += "La date de naissance est vide.\n";
	
	if(pass1 && !pass2)msg += "Le mot de passe doit être retapé.\n";
	
	if(!tel)msg += "Le téléphone est vide.\n";
	if(!ville)msg += "La ville est vide.\n";
	if(!cp)msg += "Le code postal est vide.\n";
	
	if(msg == ""){
		//TEST MOT DE PASSE
		if(pass1!=pass2){
			msg += "Les mots de passe doivent être identiques!\n";	
		}
		//TEST DATE
		var regExp = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
		if(!regExp.test(date_n)){
			msg += "Erreur, date érronée ex: 01/01/1970\n";	
		}
		
	}
	
	if(msg == ""){
		document.forms['_form'].submit();
	}else{
		alert(msg);	
	}
	
}