function findAddress(url,id,get_address) {
    // url         : http://localhost/ci-projects/address/json_xxx -> xxx istenilen city,county,district veya neighborhood
    // id          : city,county,district veya neighborhood ait oldugu id
    // get_address : city,county,district veya neighborhood istenilen adresin aynı olması lazım
    var ga_id = 'e.'+get_address+'_id';
    var ga_name = 'e.'+get_address+'_name';
    
    $.getJSON(url+'/'+id, function (data) {
        // console.log(data);
        if (data === null) {
            var html = '<option value="0">Seçiniz</option>';
            $('#'+get_address).html(html);
        }
        var html = '<option value="0">Seçiniz</option>';
        $.each(data,function(i,e){
            html += '<option value="'+eval(ga_id)+'">'+eval(ga_name)+'</option>';
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