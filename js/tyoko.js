var content;

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
		
		console.log("aaaaa");
		content = $(".TileContents",this).text();
		console.log(content);
		$("#ShowContents").html("<div id='ModalMemoContents'>" + $(".TileContents",this).text() + "</div><span id='ModalMemoCitation'>" + $(".TileCitation", this).text() + "</span><span id='ModalMemoCategory'>" + $(".TileCategory", this).text() + "</span>");
		// $("#ShowButtons").html("<a href='#' class='btn rememo'><i class='icon-pencil'></i> rememo</a> <a href='#UpdateMemo' data-toggle='modal' onclick ='showUpdateMemoModal()' class='btn edit'><i class='icon-pencil'></i> edit</a> <a href='#' class='btn complete'><i class='icon-ok'></i> complete</a> <a href='../php/delete_memo.php?contents=" + $(".TileContents",this).text() + "' class='btn complete'><i class='icon-remove'></i> delete</a>");
		$("#ShowButtons").html("<a href='#' class='btn rememo'><i class='icon-pencil'></i> rememo</a> <a href='#UpdateMemo' onclick='showUpdateMemoModal()' data-toggle='modal' class='btn edit'><i class='icon-pencil'></i> edit</a> <a href='#' class='btn complete'><i class='icon-ok'></i> complete</a> <a href='../php/delete_memo.php?contents=" + $(".TileContents",this).text() + "' class='btn complete'><i class='icon-remove'></i> delete</a>");
		return false;
	});
	if($.browser.msie && $.browser.version < 7) {
		$(window).scroll(function() {
			$("#glayLayer").get(0).style.setExpression("top", "$(document).scrollTop()+'px'");
			$("#overLayer").get(0).style.setExpression("top", "($(document).scrollTop()+$(window).height()/2)+'px'");
		})
	}
});

function showUpdateMemoModal(){
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
	
	console.log("aaa");
	console.log(content);
	//$("#ShowEdit").html("<div id='ModalMemoContents'>aaaaaa</div><span id='ModalMemoCitation'>aaaaa</span><span id='ModalMemoCategory'>bbbb</span>");
	//$("#ShowEdit").show();
	// PHPに値を受け渡し
	// $.ajax({
		// type:'post',
		// url:'../php/add_modal.php',
		// data:{
			// // "old_contents":$(".TileContents",this).text()
			// "old_contents":"aaaa"
		// }
	// })
// 	
	// $.post("./php/test.php", { "old_contents" : content }, function(data, status){
		// // callback関数
		// console.log(status);
		// console.log(data);
	// } );
	//グレー背景を一層追加s("modal-backdrop");
	
	// メモ追加モーダルを表示
	// $('#UpdateMemo').show();
	// $('#glayLayer').css("z-index",1000);
	// $('#UpdateMemo').css("z-index",2000);
// 	
}