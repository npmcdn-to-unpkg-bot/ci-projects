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
function blog_comments(){
    var blog_comments_name = $('input[name="blog_comments_name"]').val();
    var blog_comments_surname = $('input[name="blog_comments_surname"]').val();
    var blog_comments_email = $('input[name="blog_comments_email"]').val();
    var blog_comments_title = $('input[name="blog_comments_title"]').val();
    var blog_comments_content = $('textarea[name="blog_comments_content"]').val();
    var blog_comments_id = $('input[name="blog_id"]').val();
    var user_id = $('input[name="user_id"]').val();

    $.ajax({
        type:   'POST',
        url:    'comments/blog_comments_add',
        data:   'user_id='+user_id+'&blog_id='+blog_comments_id+'&name='+blog_comments_name+'&surname='+blog_comments_surname+'&email='+blog_comments_email+'&title='+blog_comments_title+'&content='+blog_comments_content,
        success: function(res){
            $('.blog_comments_message').html(res);
            if ($('div').hasClass('success')) {
                $('input[name="blog_comments_name"]').val("");
                $('input[name="blog_comments_surname"]').val("");
                $('input[name="blog_comments_email"]').val("");
                $('input[name="blog_comments_title"]').val("");
                $('textarea[name="blog_comments_content"]').val("");
            }
        }
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