

$(function(){
    get_data();
});

function get_data(){
    $.ajax({
        type:"get",
        url:"/cook/get/orders",
        dataType:"json"
    }).done((res)=>{
        
        $('.order-list-container').find('.order-list').remove();
        $.each(res,function(index,value){
            
        
    html =  
        `
        <div class="order-list">
        <h2>商品名:${value.name}</h2>
        <h2>数量:${value.quantity}</h2>
        <h3>シート番号:${value.seat_num}</h3>
        <a href="/slip/list/${value.slip_num}">伝票番号:${value.slip_num}</a>
        <a href="">レシピを見る</a>
                </div>
                `
                
        $('.order-list-container').append(html);
            });
            
        }).fail((error)=>{
            console.log(error);
        });

    setTimeout("get_data()",1000);

}
    