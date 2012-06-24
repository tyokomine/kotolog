//$(document).ready(function(){
	// $("#addMemoForm").submit(function(){
		 // var name = $("#board_name").val();
		 // $("#boards").append($("<li><a href=\"#"+name+"\">"+name+"</li>"));
		 //$("#createNewBoard").hide();
		// $("div").removeClass("modal-backdrop");
		 
		 //return false;
	// });
// });


function hideAddMemoModal(){
	// グレー背景を一層除去
	$("div").removeClass("modal-backdrop");
	// メモ追加モーダルを隠す
	$('#addMemo').hide();
}

function showAddMemoModal(){
	// グレー背景を一層追加
	$("div").addClass("modal-backdrop");
	
	// PHPに値を受け渡し
	$.post("./php/add_category.php",
	{
		"category": $('#category').val()
	});
	
	// カテゴリ追加モーダルを表示
	$('#createNewBoard').hide();
	// メモ追加モーダルを表示
	$('#addMemo').show();
	
}

$(function() {
	// [▶]にマウスを乗せた時
	$('#side-bar-cursor').hover(function() {
		// [▶]ボタンを左から"marginLeft"のところまでヒョイっと出す.
		$(this).stop().animate({
			'marginLeft' : '170px'
		}, 200);
		// 表示する文字を[◀]に変更する.
		$('cursor-icon').removeClass('icon-chevron-right').addClass('icon-chevron-left');
		// [リーダーシップ]等のボード一覧をヒョイっと出す.
		$('#side-bar').stop().animate({
			'marginLeft' : '0px'
		}, 200);
	},
	// [◀]からマウスを外した時
	function() {
		// [◀]ボタンを右から"marginLeft"のところまでヒョイっとしまう.
		$(this).stop().animate({
			'marginLeft' : '0px'
		}, 200);
		// 表示する文字を[◀]に変更する.
		$('cursor-icon').removeClass('icon-chevron-left').addClass('icon-chevron-right');
		// [リーダーシップ]等のボード一覧をヒョイっとしまう.
		$('#side-bar').stop().animate({
			'marginLeft' : '-170px'
		}, 200);
	});
});
/* 隠れサイドメニューの動き([リーダーシップ]等のボード一覧にマウスオーバー) */
$(function() {
	// [ボード一覧]にマウスを乗せた時
	$('#side-bar').hover(function() {
		// [ボード一覧]ボタンを左から"marginLeft"のところまでヒョイっと出す.
		$(this).stop().animate({
			'marginLeft' : '0px'
		}, 200);
		// 表示する文字を[◀]に変更する.
		$('#cursor-icon').removeClass('icon-chevron-right').addClass('icon-chevron-left');
		// [▶]をヒョイっと出す.
		$('#side-bar-cursor').stop().animate({
			'marginLeft' : '170px'
		}, 200);
	},
	// [ボード一覧]からマウスを外した時
	function() {
		// [ボード一覧]を右から"marginLeft"のところまでヒョイっとしまう.
		$(this).stop().animate({
			'marginLeft' : '-170px'
		}, 200);
		// 表示する文字を[▶]に変更する.
		$('#cursor-icon').removeClass('icon-chevron-left').addClass('icon-chevron-right');
		// [ボード一覧]をヒョイっとしまう.
		$('#side-bar-cursor').stop().animate({
			'marginLeft' : '0px'
		}, 200);
	});
});

var delBoardName;
// カテゴリにマウスを載せた時、削除ボタン[☓]を表示する
$(function() {
	$('.side_item').hover(function() {
		//alert('you just hover!');
		//alert($(this).position().top+', '+$(this).position().left);
		$('#delBoard').css('display', 'block');
		$('#delBoard').css('top', $(this).position().top+2).css('left', 130);
		delBoardName = $(this).text();
		delBoardName = jQuery.trim(delBoardName);
	},
	function() {;});
});

function deleteBoard(){
	//alert('delete -> ' + delBoardName + ' : '+ delBoardName.length );
	
	// PHPに値を受け渡し
	$.post("./php/delete_category.php", { category: delBoardName }, function(){
		location.href="index.php";
	} );
}
