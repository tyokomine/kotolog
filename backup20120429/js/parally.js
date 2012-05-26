$(function() {
	$("#glayLayer").click(function() {
		$(this).hide();
		$("#overLayer").hide();
	});
	$(".Tile").click(function() {
		$("#glayLayer").show();
		$("#overLayer").fadeIn(400).css({
			marginTop : "-" + $("#overLayer").height() / 2 + "px",
			marginLeft : "-" + $("#overLayer").width() / 2 + "px"
		});
		$("#ShowContents").html("<div id='ModalMemoContents'>" + $(".TileContents",this).text() + "</div><span id='ModalMemoCitation'>" + $(".TileCitation", this).text() + "</span><span id='ModalMemoCategory'>" + $(".TileCategory", this).text() + "</span>");
		$("#ShowButtons").html("<a href='#' class='btn rememo'><i class='icon-pencil'></i> rememo</a> <a href='#' class='btn edit'><i class='icon-pencil'></i> edit</a> <a href='#' class='btn complete'><i class='icon-ok'></i> complete</a> <a href='../php/delete_memo.php?contents=" + $(".TileContents",this).text() + "' class='btn complete'><i class='icon-remove'></i> delete</a>");
		return false;
	});
	if($.browser.msie && $.browser.version < 7) {
		$(window).scroll(function() {
			$("#glayLayer").get(0).style.setExpression("top", "$(document).scrollTop()+'px'");
			$("#overLayer").get(0).style.setExpression("top", "($(document).scrollTop()+$(window).height()/2)+'px'");
		})
	}
});
