function toggleCheckmark(i, j, element){
  element.toggleClass('checked');
  setVisibility(element);
}

function setVisibility(element){
  if(element.hasClass('checked')){
    element.show();
  } else {
    element.hide();
  }
}

window.onload = function(){
  $('.checkable_td_one').each(function(idx){
    onload_build($(this), idx, 0);
  });
  $('.checkable_td_two').each(function(idx){
    onload_build($(this), idx, 1);
  });
  $('.checkable_td_three').each(function(idx){
    onload_build($(this), idx, 2);
  });


}
function onload_build(cont, i, j) {
  var span = cont.children('span');
  cont.click(buildCallback(i, j, span));
  setVisibility(span);
}

function buildCallback(i, j, span){
  var f = function(){
    toggleCheckmark(i, j, span);
  };

  return f;
}
