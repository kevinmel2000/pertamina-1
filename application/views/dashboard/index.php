<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>



<!DOCTYPE html>

<html>

<head>

  <title>Welcome | Aplikasi Peminjaman Barang</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php $this->load->view('component/src');?>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">



<div class="container" style="background-color:#ffffff;color:#fff;height:90px;">

   <img src="<?php echo base_url(); ?>asset/images/mainlogo.png" width="150px" style="margin:20px;">

</div>



<?php $this->load->view('component/navbar1');?>



<?php $this->load->view('component/slide');?>



<div id="borrow">

  <?php $this->load->view('dashboard/borrow');?>

</div>



<div id="data">

  <?php $this->load->view('dashboard/data');?>

</div>



<div id="profile">

  <?php $this->load->view('dashboard/profile');?>

</div>



<?php $this->load->view('component/footer');?>



</body>

<script>

$(document).ready(function(){

  $('[data-toggle="tooltip"]').tooltip(); 

  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    if (this.hash !== "") {

      event.preventDefault();

      var hash = this.hash;

      $('html, body').animate({

        scrollTop: $(hash).offset().top

      }, 900, function(){

        window.location.hash = hash;

      });

    }

  });



  //Process tab button

  $('.btn-circle').on('click',function(){

   $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');

   $(this).addClass('btn-info').removeClass('btn-default').blur();

 });



 $('.next-step, .prev-step').on('click', function (e){

   var $activeTab = $('.tab-pane.active');



   $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');



   if ( $(e.target).hasClass('next-step') )

   {

      var nextTab = $activeTab.next('.tab-pane').attr('id');

      $('[href="#'+ nextTab +'"]').addClass('btn-info').removeClass('btn-default');

      $('[href="#'+ nextTab +'"]').tab('show');

   }

   else

   {

      var prevTab = $activeTab.prev('.tab-pane').attr('id');

      $('[href="#'+ prevTab +'"]').addClass('btn-info').removeClass('btn-default');

      $('[href="#'+ prevTab +'"]').tab('show');

   }

 });





$(".image-checkbox").each(function(){

    if($(this).find('input[type="checkbox"]').first().attr("checked")){

        $(this).addClass('image-checkbox-checked');

    }else{

        $(this).removeClass('image-checkbox-checked');

    }

});



// sync the input state

$(".image-checkbox").on("click", function(e){

    $(this).toggleClass('image-checkbox-checked');

    var $checkbox = $(this).find('input[type="checkbox"]');

    $checkbox.prop("checked",!$checkbox.prop("checked"));

  

    e.preventDefault();

});







$('.btn-number').click(function(e){

    e.preventDefault();

    

    fieldName = $(this).attr('data-field');

    type      = $(this).attr('data-type');

    var input = $("input[name='"+fieldName+"']");

    var currentVal = parseInt(input.val());

    if (!isNaN(currentVal)) {

        if(type == 'minus') {

            

            if(currentVal > input.attr('min')) {

                input.val(currentVal - 1).change();

            } 

            if(parseInt(input.val()) == input.attr('min')) {

                $(this).attr('disabled', true);

            }



        } else if(type == 'plus') {



            if(currentVal < input.attr('max')) {

                input.val(currentVal + 1).change();

            }

            if(parseInt(input.val()) == input.attr('max')) {

                $(this).attr('disabled', true);

            }



        }

    } else {

        input.val(0);

    }

});

$('.input-number').focusin(function(){

   $(this).data('oldValue', $(this).val());

});

$('.input-number').change(function() {

    

    minValue =  parseInt($(this).attr('min'));

    maxValue =  parseInt($(this).attr('max'));

    valueCurrent = parseInt($(this).val());

    

    name = $(this).attr('name');

    if(valueCurrent >= minValue) {

        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')

    } else {

        alert('Sorry, the minimum value was reached');

        $(this).val($(this).data('oldValue'));

    }

    if(valueCurrent <= maxValue) {

        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')

    } else {

        alert('Sorry, the maximum value was reached');

        $(this).val($(this).data('oldValue'));

    }

    

    

});

$(".input-number").keydown(function (e) {

        // Allow: backspace, delete, tab, escape, enter and .

        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||

             // Allow: Ctrl+A

            (e.keyCode == 65 && e.ctrlKey === true) || 

             // Allow: home, end, left, right

            (e.keyCode >= 35 && e.keyCode <= 39)) {

                 // let it happen, don't do anything

                 return;

        }

        // Ensure that it is a number and stop the keypress

        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {

            e.preventDefault();

        }

    });



//range day

var slider = document.getElementById("myRange");

var output = document.getElementById("demo");

output.innerHTML = slider.value;



slider.oninput = function() {

  output.innerHTML = this.value;

}

})

</script>

</html>







