"use strict";

function calc_balance() {
  var balance = 0;
  $("#credits-table").children('tbody').children('tr').children('.text-right').each(function(td){
    balance += parseInt($(this).text());
  });
  $("#debits-table").children('tbody').children('tr').children('.text-right').each(function(td){
    balance += parseInt($(this).text());
  });

  return balance;
}

function display_balance(balance){
    var title = $("#balance-title");
    title.text("$" + balance);

    title.removeClass();

    if(balance < 0){
      title.addClass("text-danger");
    }else if(balance > 0){
      title.addClass("text-success");
    }
}

window.onload = function () { display_balance(calc_balance()); }
