
$(document).ready(function () {
      $popup = $(".add-form");
  var $btn = $(".addBtn")
  $btn.click(function(e){
    $popup.removeClass('visually-hidden');
  });
  $('.close-btn').click(function(e){
      $popup.addClass('visually-hidden');
    });

        $popupChenge = $(".chenge-form");
    var $chengeBtn = $(".chengeBtn")

    $chengeBtn.click(function(e){
      $popupChenge.removeClass('visually-hidden');
    });
    $('.close-btn').click(function(e){
        $popupChenge.addClass('visually-hidden');
    });
    });


// Чеки анчеки строк
  $('.t-row').click(function(e){
    let self = this;
    console.log(this.childNodes[this.childNodes.length - 1].childNodes[0]);
    let inp = this.childNodes[this.childNodes.length - 1].childNodes[0];
    if(inp.checked == true){
      inp.checked = false;
        $(this).removeClass('active-row');
    }else{
        inp.checked = true;
        console.log(this);
        $(this).addClass('active-row');
    }

  });
  var $otchotBtn = $('.otchot1Btn');
  $otchotBtn.click(function(e){
    console.log("мда");
    $('.otchot1').removeClass('visually-hidden');
    $('.close-btn').click(function(e){
        $('.otchot1').addClass('visually-hidden');
      });
  });
