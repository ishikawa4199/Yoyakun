
var num = 2;

function add(){
    checkNum();
    $('input[name="quantity"]').val(num);
    $('#quantity').text(num);
    num = num + 1;



}

function decrease(){
    checkNum();
    $('.quantity').val(num);
    $('#quantity').text(num);
    num = num - 1;

}


function checkNum(){
    if(num >= 11){
        num = 1;
    }
    
    if(num < 1){
        num = 10;
    }
}

function submit(){
    $('#submit').submit();
}

window.onload=function(){
    $('#text').focus();

};



$('#text').keyup(function(e){
   
    var val = $('#text').val().length;
    var text = $('#text').val();
    if(e.keyCode == 13){
        if(val == 13){
            console.log("読み取りました");
            $('#text').val('');
            $('#ptag').text(text);


        }

    }
})

   