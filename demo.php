<?php
if(isset($_POST['send'])){
    $a = @$_POST['demo'];
    if(!$a){
        echo 'vui lòng nhập a';
    }
    else{
        echo $a;
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <!-- <input type="text" name="demo"> -->
    <input type="radio" name="demo" id="demo" value="demo">
    <label for="demo">demo</label>
    <input type="radio" name="demo" id="demo1" value="demo1">
    <label for="demo1">demo1</label>
    <button type="submit" name="send">gửi</button>
</form>