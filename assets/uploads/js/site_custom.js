function findAddress(url,id,get_address,tag_list,tag_attr) {
    var ga_id = 'e.'+get_address+'_id';
    var ga_name = 'e.'+get_address+'_name';
    
    $.getJSON(url+'/'+id, function (data) {
        // console.log(data);
        if (data === null) {
            var html = '<'+tag_list+' '+tag_attr+'="0">Seçiniz</'+tag_list+'>';
            $('#'+get_address).html(html);
        }
        var html = '<'+tag_list+' '+tag_attr+'="0">Seçiniz</'+tag_list+'>';
        $.each(data,function(i,e){
            html += '<'+tag_list+' '+tag_attr+'="'+eval(ga_id)+'">'+eval(ga_name)+'</'+tag_list+'>';
        });
        $('#'+get_address).html(html);
    });

}

$(function(){
	var swiper = new Swiper('.site-swiper-slider', {
        pagination: '.sp-slider',
        paginationClickable: true,
        mousewheelControl: true
    });
    var swiper2 = new Swiper('.site-swiper-banner', {
        pagination: '.sp-banner',
        paginationClickable: true,
        mousewheelControl: true
    });
});