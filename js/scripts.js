$(document).ready(function(){
    $('.navTrigger').on('click',function (){
      $(this).toggleClass('active');
      console.log("Clicked menu");
      $("#mainListDiv").toggleClass("show_list");
      $("#mainListDiv").fadeIn();
  
    });
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

console.log(findGetParameter("content"))


function setArticleDivEditable (idOfDivToEdit, fieldName, id){
	//if ( destroy )  setDivNoEditable ();
	//if ( editor1 )  return;

	tinymce.init({
	// au minimum ces 2 lignes
	inline: true,
	selector: "#"+idOfDivToEdit,
	menubar: false,
	toolbar: 'undo redo | styleselect | bold italic | link image',
	
	
	init_instance_callback: function(editor) {
			editor.on('change', function(event) {//alert(idOfDivToEdit);
				data = tinymce.get(idOfDivToEdit).getContent(); 
				// alert("---"+$.trim(data)+"---");
				dataChanged = true;
				if (dataChanged = true) {
					alert("test");//updateArticle(idOfDivToEdit.split("z")[1],idOfDivToEdit.split("z")[0], $.trim(data));
				}
			});
		}
	});
}



window.addEventListener('load', function () {

	// deleteArticle(47)

	function myFunction(element, index,) {
		console.log(index);
		setArticleDivEditable(element.attributes.id.value, "contenu", index + 1);
	}
	elements = document.querySelectorAll(".modifiable");
	//console.log(elements);
	elements.forEach(myFunction);

})

