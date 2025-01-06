$(document).ready( function () {
  amountFormat();
  
  $("#table").DataTable({
    responsive: true,
  });

  $("#table-detail").DataTable({
      responsive: true,
    pageLength : 3,
  });
});



$(function() {

  'use strict';

  $('.js-menu-toggle').click(function(e) {

  	var $this = $(this);

  	if ( $('body').hasClass('show-sidebar overflow-hidden') ) {
  		$('body').removeClass('show-sidebar overflow-hidden');
  		$this.removeClass('active');
  	} else {
  		$('body').addClass('show-sidebar overflow-hidden');
  		$this.addClass('active');
  	}

  	e.preventDefault();

  });

  // click outisde offcanvas
	$(document).mouseup(function(e) {
    var container = $(".sidebar");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      if ( $('body').hasClass('show-sidebar overflow-hidden') ) {
				$('body').removeClass('show-sidebar overflow-hidden');
				$('body').find('.js-menu-toggle').removeClass('active');
			}
    }
	}); 

    

});

// $(".menu li").click(function() {
//     $(".menu li").removeClass('active');
//     $(this).addClass('active');
// });

var str = document.title;
title = str.substring(0, str.indexOf(' '));
$("."+title).addClass('active');

function deleteData(id, url){

    const formDelete = document.querySelector('#form-delete');
  
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            formDelete.setAttribute('action', `/` + url + `/` + id);
            formDelete.submit();
            return;
        }
      });
      
};

function amountFormat(){
    
  let amount;
  const element = $(".amount");
  
  for(i=0; i<element.length; i++){
  
      let a = element[i].innerHTML / 12;
      
      if(Number.isInteger(a) == false){
          let b = a - Math.floor(a);
          let c = Math.round(b * 12);
          // amount = Math.floor(a) + " dz " + c + " ps";
          amount = element[i].innerHTML + " ps";
      }else{
          amount = a + " dz";
      }
  
      element[i].innerHTML = amount;
  }
}