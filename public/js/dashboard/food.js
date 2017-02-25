function toggleCheckmark(i, j, element){
  element.toggle();
}

window.onload = function(){
  $('.checkable_td_one').each(function(idx){
    $(this).click(function() { toggleCheckmark(idx, 0, $(this).children('span')); });
  });
  $('.checkable_td_two').each(function(idx){
    $(this).click(function() { toggleCheckmark(idx, 1, $(this).children('span')); });
  });
}
