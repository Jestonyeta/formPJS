<!DOCTYPE>
<html>
<head>
<script src="formp.js?s=<?php echo uniqid();?>"></script>
<title>FormPJS</title>
<style>
input,select,submit {
display:block;
margin:10px 20px;
padding:2px 10px;
}
</style>
</head>
<body>
<form id="form">
<input type="radio" name="radio" value="female">
<input type="checkbox" name="agree">
<input type="text" placeholder="url" name="name">
<input type="text" placeholder="Email" name="email">
<input type="file" name="images" multiple>
<input type="file" name="musics">
<select name="sel">
<option value="ssssss">1</option>
<option value="aaaassss">2</option>
</select>
<textarea name="desc"></textarea>
<input type="submit" value="Submit" id="submit">
</form>
<script type="text/javascript">
var options = {
				   action:'action.php',
				   required:{
				      images:{
                           minSize:1000
					  }
				   },
				   submit:function(){
				      document.getElementById('submit').disabled=true;
				   },
				   validation:function(data){
				       document.getElementById('submit').disabled=false;
                       console.log(data);
				   },
				   files:{
				        fileDest:'s',
						uniqname:true,
						chunkUpload:{
						   size:1000000,
						   reciever:'uploadscript.php'
						},
					    progress:function(e){
						   console.log((e.loaded / e.total) * 100);
						}
				   },
				   success:function(data){
				     document.getElementById('submit').disabled=false;
				     alert(data + ' success');
				   },
				   error:function(data){
				      document.getElementById('submit').disabled=false;
				      console.log(data + 'error');
				   }
			  }
var form = new FormPJS(document.getElementById('form'),options);
</script>
</body>
</html>