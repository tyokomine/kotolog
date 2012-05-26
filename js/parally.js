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
		content=$(".TileContents",this).text();
		$("#ShowContents").html("<div id='ModalMemoContents'>" + $(".TileContents",this).text() + "</div><span id='ModalMemoCitation'>" + $(".TileCitation", this).text() + "</span><span id='ModalMemoCategory'>" + $(".TileCategory", this).text() + "</span>");
		$("#ShowButtons").html("<a href='#UpdateMemo' data-toggle='modal' onclick ='showUpdateMemoModal("+'"'+ $(".TileContents",this).text() +'","'+$(".TileCitation",this).text() +'","'+$(".TileCategory",this).text() +'"'+ ")' class='btn edit'><i class='icon-pencil'></i> edit</a> <a href='#' class='btn complete'><i class='icon-ok'></i> complete</a> <a href='../php/delete_memo.php?contents=" + $(".TileContents",this).text() + "' class='btn complete'><i class='icon-remove'></i> delete</a>");
		return false;
	});
	$(".Tile2").click(function() {
		$("#glayLayer").show();
		$("#overLayer").fadeIn(400).css({
			marginTop : "-" + $("#overLayer").height() / 2 + "px",
			marginLeft : "-" + $("#overLayer").width() / 2 + "px"
		});
		$("#ShowContents").html("<div id='ModalMemoContents'>" + $(".TileContents",this).text() + "</div><span id='ModalMemoCitation'>" + $(".TileCitation", this).text() + "</span><span id='ModalMemoCategory'>" + $(".TileCategory", this).text() + "</span>");
		$("#ShowButtons").html("<a href='../php/rememo.php?contents=" + $(".TileContents",this).text() + "' class='btn rememo'><i class='icon-pencil'></i> rememo</a> <a href='#' class='btn complete'><i class='icon-ok'></i> complete</a> <a href='../php/delete_memo.php?contents=" + $(".TileContents",this).text() + "' class='btn complete'><i class='icon-remove'></i> delete</a>");
		return false;
	});
	
	$("#rememo").click(function() {
		console.log("hoge");			
	});
	
	if($.browser.msie && $.browser.version < 7) {
		$(window).scroll(function() {
			$("#glayLayer").get(0).style.setExpression("top", "$(document).scrollTop()+'px'");
			$("#overLayer").get(0).style.setExpression("top", "($(document).scrollTop()+$(window).height()/2)+'px'");
		})
	}
});

function rememo(){
	console.log('rememo!');
	console.log( $(this) );
}

function showUpdateMemoModal(content,citaion,category){
	// PHPに値を受け渡し
	// $.post("./php/add_category.php",
	// {
		// "category": $('#category').val()
	// });
	
	// カテゴリ追加モーダルを表示
	$('#ShowContents').hide();
	$('#ShowButtons').hide();
	$('#glayLayer').hide();
	$('#overLayer').hide();
	//console.log($(".TileContents",this).text());
	console.log(content);
	console.log(citaion);
	console.log(category);
	
	
	$("textarea#up_memo_content").text(content);
	console.log($("textarea#memo_content"));
	console.log($("input#up_citaion"));
	$("input#up_citaion").val(citaion);
	
	// PHPに値を受け渡し
	// $.ajax({
		// type:'post',
		// url:'../php/add_modal.php',
		// data:{
			// "contents":$(".TileContents",this).text()
		// }
	// })
	
	// $.post("./php/add_modal.php",
	// {
		// "contents": "aaaaa"
	// });
	// グレー背景を一層追加
	//$("div").addClass("modal-backdrop");
	
	// メモ追加モーダルを表示
	// $('#UpdateMemo').show();
	// $('#glayLayer').css("z-index",1000);
	// $('#UpdateMemo').css("z-index",2000);
// 	
}