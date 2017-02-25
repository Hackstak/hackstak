"use strict";

function process_new_entry(){
    var name = $('#new-entry-name').val();
    var amount = $('#new-entry-amount').val();

    if(isNaN(amount)) { return; }

    var html =
    '<tr> \
      <td>' + name + '</td> \
      <td class="text-right">' + amount + '</td> \
      <td><span class="icon icon-edit"></span></td> \
    </tr>';

    var amt = parseInt(amount)
    var id = "#credits-table";
    if(amt < 0){
      id = "#debits-table";
    }

    $(id).children('tbody').append(html)

    display_balance(calc_balance());
}

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
