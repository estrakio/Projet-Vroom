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

