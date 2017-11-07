$(document).ready(function(){
	// トップへ戻る
	$(".gotop > a").click(function(){$("html,body").animate({ scrollTop: $("body").offset().top }, "normal", "swing"); return false; });
	if( $(window).scrollTop() == 0 )
	{
		$(".gotop").css( "display", "none" );
		$(".gotop").animate({ "opacity": 0 });
	}
	else $(".gotop").animate({ "opacity": 1 }, 500 );
	$(window).scroll(function(){
		$(".gotop").dequeue();
		if( $(window).scrollTop() > 0 )
		{
			$(".gotop").css( "display", "block" );
			$(".gotop").animate({ "opacity": 1 }, 500 );
		}
		else
		{
			$(".gotop").animate({ "opacity": 0 }, 500 );
			$(".gotop").css( "display", "none" );
		}
	});
	// テキスト2行で非表示にする設定
	$('.text_overflow').each(function() {
		var $target = $(this);
		var html = $target.html();
		var $clone = $target.clone();
		$clone
			.css({
				display: 'none',
				position : 'absolute',
				overflow : 'visible'
			})
			.width($target.width())
			.height('auto');
		$target.after($clone);
		while((html.length > 0) && ($clone.height() > $target.height())) {
			html = html.substr(0, html.length - 1);
			$clone.html(html + '...');
		}
		$target.html($clone.html());
		$clone.remove();
	});
});
$(window).load(function(){
//$(".scrollNav").sticky({ topSpacing: 0, center:true, className:"hey" });
});
