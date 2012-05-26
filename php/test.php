<?php
echo "aaaaaaaaaaaaaaaaaaaaaaaaaa";
?>
<!-- <div id='ModalMemoContents'>aaaa</div><span id='ModalMemoCitation'>bbb</span><span id='ModalMemoCategory'>ggg</span>

<div class="modal-header">
	<a class="close" data-dismiss="modal">x</a>
	<h3>メモを編集</h3>
</div>
<form id="UpdateForm" method="post" name = "updateForm" action = "./php/update_memo.php">
	<div class="modal-body">
		<div class="clearfix">
			<?php
			error_reporting(1);
			session_start();

			require_once 'php/config.php';
			require_once 'php/commons.php';

			//セッションからid取得
			$id = $_SESSION["id"];
			$old_contents = $_POST["old_contents"];
			// echo "<script language=javascript>sample_function(".$id.")</script>";
			// echo "old = ".$old_contents;
			echo '<textarea name = "contents" class="xxlarge span6" id="memo_content" rows="5">' . $old_contents . '</textarea>';
			?>
			<textarea name = "contents" class="xxlarge span6" id="memo_content" rows="5"></textarea>
		</div>
		<div class="clearfix">
			<label for="citation">引用元 :</label>
			<div class="input">
				<input type="text" class="xlarge" id="citation" name="citation">
			</div>
		</div>
		<div class="clearfix">
			<label for="category">カテゴリ :</label>
			<select name="category"	id="category">
				<?php
				error_reporting(1);
				session_start();

				require_once 'php/config.php';
				require_once 'php/commons.php';

				//セッションからid取得
				$id = $_SESSION["id"];
				//DBからカテゴリ取得
				$category_sql = "select distinct category_name from category where category_member_id =" . r($id) . "";
				$category_result = mysql_query($category_sql);

				while ($category = mysql_fetch_assoc($category_result)) {
					echo '<option>' . $category["category_name"] . '</option>';
				}
				?>
			</select>
			
		</div>
		<div class="actions">
			<input name = "update_memo" type="submit" value="Update Memo" class="btn btn-primary">
			<button type="reset" class="btn" data-dismiss="modal">
				Cancel
			</button>
		</div>
	</div>
</form> -->