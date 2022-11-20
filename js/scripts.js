$(document).ready(function(){
    $('.navTrigger').on('click',function (){
      $(this).toggleClass('active');
      console.log("Clicked menu");
      $("#mainListDiv").toggleClass("show_list");
      $("#mainListDiv").fadeIn();
    });

	$(".titre").removeClass("focus");
	$("#"+findGetParameter("content")).addClass("focus");
	console.log(findGetParameter("content"));
	console.log($("#"+findGetParameter("content")));
  });

  function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search.substr(1).split("&").forEach(function (item) {
          tmp = item.split("=");
          if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}



function setArticleDivEditable (idOfDivToEdit, fieldName, id){
	//if ( destroy )  setDivNoEditable ();
	//if ( editor1 )  return;

	tinymce.init({
	// au minimum ces 2 lignes
	inline: true,
	selector: "#"+idOfDivToEdit,
	menubar: false,
	//forced_root_block : false,

	toolbar: 'undo redo | styleselect | bold italic | link image',
	
	
	init_instance_callback: function(editor) {
			editor.on('change', function(event) {//alert(idOfDivToEdit);
				data = tinymce.get(idOfDivToEdit).getContent(); 
				//alert("---"+$.trim(data)+"---");
				dataChanged = true;
				element = document.getElementById(idOfDivToEdit);
				console.log(element);
				if (!element.classList.contains("titre")) {
					updateArticle(idOfDivToEdit.split("z")[1],idOfDivToEdit.split("z")[0], idOfDivToEdit.split("z")[2], $.trim(data));
				}else{
					champ = idOfDivToEdit.split("z")[0];
					id = idOfDivToEdit.split("z")[1];
					element = document.getElementById("select"+champ+"z"+id);
					console.log(element);
					element.innerHTML = document.getElementById(idOfDivToEdit).innerHTML;
					updateArticle(idOfDivToEdit.split("z")[1],idOfDivToEdit.split("z")[0], idOfDivToEdit.split("z")[2], $.trim(data));
				}
			});
		}
	});
}

function datelistener(id) {
	console.log(id)
	data = $("#"+id).val();
	console.log(data);
	updateArticle(id.split("z")[1],id.split("z")[0], id.split("z")[2], $.trim(data));
}


window.addEventListener('load', function () {

	// deleteArticle(47)

	function myFunction(element, index,) {
		//console.log(index);
		setArticleDivEditable(element.attributes.id.value);
	}
	elements = document.querySelectorAll(".modifiable");
	//console.log(elements);
	elements.forEach(myFunction);
})


function updateArticle(id, tableName, fieldName, data) {	
	// Appel AJAX
	request =
		$.ajax({
			type: "POST", //Méthode à employer POST ou GET
			url: "../ajax/fonction.php", // Page PHP à appeler coté serveur
			data : {id: id, fieldName: fieldName, tableName: tableName, data: data, todo: 'update'}, //cette propriété sert à stocker les données à envoyer
			cache : false, //permet de spécifier si le navigateur doit mettre en cache les pages demandées
			//contentType : false, //permets de préciser le type de contenu à utiliser lors de l'envoi au serveur.
			//processData : false, // définit si les données envoyées doivent être transformées en chaine de requête (ex : ?id=1?login=johnDoe).
			
			success: function(response) {
			},
			beforeSend: function () {
				// Placer ici un éventuel code à exécuter avant l'appel ajax en lui même
			}
		});
		request.done(function (output) { // output : variable qui contient les éventuels affichages générés dans le fichier PHP appelé
			
			//location.reload("http://localhost/formulaire.php?content=liste");
		});
		request.fail(function (error) { // error : variable qui contient l'erreur survenue
			// Placer ici un éventuel code à exécuter en cas d'erreur coté PHP
			alert(error);
		});
		request.always(function () {
			// Placer ici un éventuel code à exécuter quoi qu'il arrive
			//alert("test");
		});
}

function suprimerArticle() {
	console.log($(".activer")[0].attributes.id.value);
	div = $(".activer")[0].attributes.id.value
	id = div.split("z")[2]
	tableName = div.split("z")[1]

	if (tableName === "clients") {
		ask = window.confirm('Voulez-vous vraiment supprimer cette fiche ?')	
		ask = window.confirm("La supréssion d'un clients suprimera egalement tout les rendez vous affiliez, etes vous certain de vouloir le supprimer ?")	
	} else if (tableName === "SocieteExpert") {
		ask = window.confirm('Voulez-vous vraiment supprimer cette fiche ?')	
		ask = window.confirm("La supréssion d'une société d'expert suprimera egalement tout les experts affiliez, etes vous certain de vouloir la supprimer ?")	
		// console.log($(".ap"+id));
		// console.log(document.querySelectorAll(".ap"+id))
		document.querySelectorAll(".ap"+id).forEach(element => element.setAttribute("hidden", "hidden"));
	} else {
		ask = window.confirm('Voulez-vous vraiment supprimer cette fiche ?')
	}
	if (ask) {
		request =
			$.ajax({
				type: "POST", //Méthode à employer POST ou GET
				url: "../ajax/fonction.php", // Page PHP à appeler coté serveur
				data : {id: id, tableName: tableName, todo: 'delete'}, //cette propriété sert à stocker les données à envoyer
				cache : false, //permet de spécifier si le navigateur doit mettre en cache les pages demandées
				//contentType : false, //permets de préciser le type de contenu à utiliser lors de l'envoi au serveur.
				//processData : false, // définit si les données envoyées doivent être transformées en chaine de requête (ex : ?id=1?login=johnDoe).
				
				success: function(response) {
				},
				beforeSend: function () {
					// Placer ici un éventuel code à exécuter avant l'appel ajax en lui même
				}
			});
			request.done(function (output) { // output : variable qui contient les éventuels affichages générés dans le fichier PHP appelé
				$('#'+div).removeClass("activer")
				$('.btnsupr').removeClass("acti")
				$("#footer ").removeClass("descend");
				$("#select"+tableName+"z"+id).hide();
				$("#second").prop('selectedIndex',0);

			});
			request.fail(function (error) { // error : variable qui contient l'erreur survenue
				// Placer ici un éventuel code à exécuter en cas d'erreur coté PHP
				alert(error);
			});
			request.always(function () {
				// Placer ici un éventuel code à exécuter quoi qu'il arrive
				//alert("test");
			});
	}
}