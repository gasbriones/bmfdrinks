$(document).ready(function(){

    //$("#site").css('height',$(window).height() + 'px');
    $('.bxslider').bxSlider({
        slideWidth: 230,
        minSlides: 2,
        maxSlides: 4,
        slideMargin: 10,
        pager: false

    });

    $('.pop-up').click(function(){
        var $this = $(this);
        $.fancybox({
            type:'ajax',
            href:$this.attr('href')
        });
        return false;
    });

    $(".gallery").fancybox({
        beforeShow: function () {
            this.title += '<a href="http://www.facebook.com/sharer/sharer.php?u=http://bmfdrinks.com/tienda" class="share-item"><img src="images/compartir.png"/></a>';
        },
        afterShow:function(){
            $this = this;
            $('.share-item').click(function(){
                var meta = $('meta[name="og:image"]').attr("content","http://bmfdrinks.com/tienda/" + $this.href);
                window.open($(this).attr('href'),'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
                return false;
            });
        },
        helpers : {
            title : {
                type: 'inside'
            }
        }
    });








})