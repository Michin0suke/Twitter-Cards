/*function OnFileSelect( inputElement ){
	
	// ファイルリストを取得
	var fileList = inputElement.files;
	
	// FileReaderを生成
	var fileReader = new FileReader();
	
	// ファイルを取得
	var file = fileList[0];
	
	// 読み込み完了時↓
	fileReader.onload = function(){
		
		// タグの生成
		var insertLetter = "<li><img src=\"" + this.result + "\" /></li>\r\n";
		
		// タグの書き込み
		document.getElementById("twitter-instance-picture").innerHTML = insertLetter;
		
		// ファイルの読み込み(Data URI Schemeの取得)
		fileReader.readAsDataURL(file);
	};
}*/

$(function () {
  $('.image_file').change(function () {
    // 画像の情報を取得
    var file = this.files[0];
    var img_tag_id = $(this).data('imageTagId');

    // 指定の拡張子以外の場合はアラート
    var permit_type = ['image/jpeg', 'image/png', 'image/gif'];
    if (file && permit_type.indexOf(file.type) == -1) {
      alert('この形式のファイルはアップロードできません');
      $(this).val('');
      $(img_tag_id).attr('src', '');
      return
    }

    // 読み込んだ画像を取得し、フォームの直後に表示させる
    var reader = new FileReader()
    reader.onload = function () {
      $(img_tag_id).attr('src', reader.result);
      $(img_tag_id + '_prev').attr('src', '');
    }

    // 画像の読み込み
    reader.readAsDataURL(file);
  });
});