 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ova";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
function validar($string){
	return $string;
}
?>
<?php 
if ((!empty($_GET['id']))&&(!empty($_GET['q']))) {
	$id=intval(validar($_GET['id']));

	$sql="SELECT img_video.titulo as 'titulo', img_video.legenda as 'legenda', CONCAT(RIGHT ( CONCAT('00',DAY(img_video.data_publicacao)), 2),'/',RIGHT ( CONCAT('00',MONTH(img_video.data_publicacao)), 2),'/',RIGHT ( CONCAT('0000',YEAR(img_video.data_publicacao)), 4)) as 'data_publicacao', img_video.tipo_midia as 'tipo_midia', img_video.id_video as 'id_video', albuns.album as 'album', albuns.id as 'id_album' FROM img_video INNER JOIN albuns ON img_video.album = albuns.id WHERE img_video.id =".$id;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $album=utf8_encode($row['album']);
	        $titulo=utf8_encode($row['titulo']);
	        $legenda=str_replace("-fs","'></i>",str_replace("sf-", "<i class='em em-", utf8_encode($row['legenda'])));
	        $data_publicacao=$row['data_publicacao'];
	        $tipo_midia=$row['tipo_midia'];
	        $id_video=utf8_encode($row['id_video']);
	        $id_album=$row['id_album'];
	    }
	} else {
	    echo "Essa imagem ou vídeo não exite";exit();
	}
	if($_GET['q']==1){//imagem
		if(next_img($id,$id_album,$conn)){
			echo "<div style='right: 0;color: #fff;background-color: #000;' class='forwarnext mdl-button mdl-js-button mdl-button--raised mdl-button--colored opacity'><i class='material-icons' onclick='next_midia(".$id.")'>chevron_right</i></div>";
		}
		if(back_img($id,$id_album,$conn)){
    		echo "<div style='left: 0;color: #fff;background-color: #000' class='forwarnext mdl-button mdl-js-button mdl-button--raised mdl-button--colored opacity'><i class='material-icons' onclick='back_midia(".$id.")'>chevron_left</i></div>";
    	}
    	switch ($tipo_midia) {
    		case 1:
    			echo "<img src='images/galery/".$id.".jpg' style='max-width:100%; max-height:100%; width: auto; height: auto;'>";
    			break;
    		case 2:
    			echo "<iframe width='100%' height='100%' src='https://www.youtube.com/embed/".$id_video."' frameborder='0' allowfullscreen></iframe>";
    			break;
    		case 3:
    			echo "<iframe width='100%' height='100%' src='//www.dailymotion.com/embed/video/".$id_video."' frameborder='0' allowfullscreen></iframe>";
    			break;
    	}
    	

	}else{//informações
		$url=rawurlencode("http://www.orquestradevenancioaires.rf.gd/galery?album=".$id_album."&&imgvideo=".$id);
		echo "<div id='share-menu-share'>
          <div style='text-align: right;'><button id='share-menu' class='mdl-button mdl-js-button' style='text-align: right;padding: 0'>Compartilhar <i class='material-icons'>share</i></button></div>
         <ul class='mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect' for='share-menu'>
		  <li class='mdl-menu__item' onclick=\"location.href='https://www.facebook.com/sharer/sharer.php?u=".$url."';\"><i class='fa fa-facebook'> </i> Facebook</li>
          <li class='mdl-menu__item' onclick=\"location.href='https://twitter.com/intent/tweet?text=".$url."&source=webclient';\"><i class='fa fa-twitter'> </i> Twitter</li>
          <li class='mdl-menu__item' onclick=\"location.href='http://pinterest.com/pin/create/button/?url=".$url."&media=".$url."&description=Next%20stop%3A%20Pinterest';\"><i class='fa fa-pinterest-p'> </i> Pinterest</li>
          <li class='mdl-menu__item' onclick=\"location.href='https://www.tumblr.com/widgets/share/tool?canonicalUrl=".$url."';\"><i class='fa fa-tumblr'> </i> Tumbrl</li>
          <li class='mdl-menu__item' onclick=\"location.href='https://plus.google.com/share?url=".$url."';\"><i class='fa fa-google-plus'> </i> Google+</li>
    	 </ul></div>
          <h4 style='text-align: center;font-weight: bold;'>".$titulo."</h4>
          <div style='text-align: right;'>
            <i>Publicação:&nbsp;
              <span>".$data_publicacao."</span>
              <br>Álbum:&nbsp;
              <span>".$album."</span>
            </i>
          </div>
          <div style='padding-top: 16px;'>".$legenda."</div>";
	}//<li class='mdl-menu__item' onclick=\"location.href='".$url."';\"><i class='fa fa-instagram'> </i> Instagram</li> --n aceita compartilhar
}
?>
<?php
function next_img($id,$id_album,$conn){
	$sql="SELECT id FROM img_video WHERE ((id=".($id+1).") and (album=".$id_album."))";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return true;
	} else {
	    return false;
	}
}
function back_img($id,$id_album,$conn){
	$sql="SELECT id FROM img_video WHERE ((id=".($id-1).") and (album=".$id_album."))";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return true;
	} else {
	    return false;
	}
}
?>
<?php $conn->close(); ?>
