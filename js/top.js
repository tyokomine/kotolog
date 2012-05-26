function print_error() {
	console.log("aaa");
	$('#error').html("IDかパスワードが間違っています。");
}

function login() {
	//alert("click login!");
	var mail = $('#name').val();
	var pass = $('#pass').val();

	// PHPに値を受け渡し
	$.post("./index.php", {
		action : "login",
		mail : mail,
		password : pass
	}, function(data, status) {
		if(status == "success") {
			// 成功した時の処理
			// sample.phpに移動
			console.log( typeof data );
			console.log( data );
			data = data.slice(0, data.length-1);
			console.log( data );
			var a="ok_signin";
			console.log( data == a );
			if( data == "ok_signin"){
				console.log("SIGN IN!");
				location.href="sample.php";
			}else if(data == "ok_login"){
				console.log("LOG IN!!");
				location.href="sample.php";
			}else if(data == "error"){
				console.log("LOG IN ERROR!");
				print_error();
			}else{
				console.log("surusareta.");
			}
			
		} else {
			// 失敗した時の処理
			// パスワードが間違っていますと表示
		}
	}, "text");
}

function hideAddMemoModal() {
	// グレー背景を一層除去
	$("div").removeClass("modal-backdrop");
	// メモ追加モーダルを隠す
	$('#addMemo').hide();
}

function showAddMemoModal() {
	// グレー背景を一層追加
	$("div").addClass("modal-backdrop");

	// PHPに値を受け渡し
	$.post("./php/add_category.php", {
		"category" : $('#category').val()
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
		$('#delBoard').css('top', $(this).position().top + 2).css('left', 130);
		delBoardName = $(this).text();
		delBoardName = jQuery.trim(delBoardName);
	}, function() {;
	});
});
function deleteBoard() {
	//alert('delete -> ' + delBoardName + ' : '+ delBoardName.length );

	// PHPに値を受け渡し
	$.post("./php/delete_category.php", {
		category : delBoardName
	}, function() {
		location.href = "index.php";
	});
}