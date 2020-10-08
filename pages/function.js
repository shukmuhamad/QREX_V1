
$('.decimal').keypress(function(evt){
    return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
});

function isNumberKey(evt)
{
            if ((e.KeyChar >= 48 && e.KeyChar <= 57) || e.KeyChar == 46)
            {
                e.Handled = false;
            }
            else
            {
                e.Handled = true;
            }
        }


function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

document.onkeypress = stopRKey;

$(function(){

    $().mask('#,###.##',{reverse : true});
    var total_minor=function(){
        var sum=0;
        $('.amount').each(function(){
                var num =$(this).val().replace(',','');

                if(num !=0){
                    sum+=parseInt(num);
                }
        });
        $('#total_minor').val(sum);
    }
    $('.amount').keyup(function(){
        total_minor();
    });


    $().mask('#,###.##',{reverse : true});
    var total_major=function(){
    var sum=0;
    $('.amount2').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
    });
    $('#total_major').val(sum);
    }
    $('.amount2').keyup(function(){
    total_major();
    });


    $().mask('#,###.##',{reverse : true});
    var total_critical=function(){
    var sum=0;
    $('.amount3').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
    });
    $('#total_critical').val(sum);
    }
    $('.amount3').keyup(function(){
    total_critical();
    });


    $().mask('#,###.##',{reverse : true});
    var total_holes1=function(){
    var sum=0;
    $('.amount4').each(function(){
        var num =$(this).val().replace(',','');
        if(num !=0){
            sum+=parseInt(num);
        }
    });
    $('#total_holes1').val(sum);
    }
    $('.amount4').keyup(function(){
    total_holes1();
    });


    $().mask('#,###.##',{reverse : true});
    var total_holes2=function(){
    var sum=0;
    $('.amount5').each(function(){
        var num =$(this).val().replace(',','');
        if(num !=0){
            sum+=parseInt(num);
        }
    });
    $('#total_holes2').val(sum);
    }
    $('.amount5').keyup(function(){
    total_holes2();
    });


    $().mask('#,###.##',{reverse : true});
    var total_holes3=function(){
    var sum=0;
    $('.amount6').each(function(){
        var num =$(this).val().replace(',','');
        if(num !=0){
            sum+=parseInt(num);
        }
    });
    $('#total_holes3').val(sum);
    }
    $('.amount6').keyup(function(){
    total_holes3();
    });
    
});
