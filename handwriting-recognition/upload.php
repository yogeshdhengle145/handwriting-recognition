<?php

require "vendor/autoload.php";
use Google\Cloud\Vision\VisionClient;
echo "<link rel='stylesheet' type='text/css' href='mystyle.css' />";

if(isset($_FILES['image'])) {
	$file_name = $_FILES['image']['name'];
	$file_tmp = $_FILES['image']['tmp_name'];
	echo "<div class='container'>";
		echo "<div class='success-msg'>";
			echo "<h3>Image Upload Success</h3>";
		echo "</div>";
		echo "<div class='home-page'>";
			echo "<a href='/handwriting-recognition'> &lt Go to Home";
		echo "</div>";
		echo "<div class='float-container'>";
			echo "<div class='float-child'><h4>Image:</h4>";
				echo "<div class='content-image'>";
					echo '<img src=/handwriting-recognition/'.$file_name.' class="responsive">';
				echo "</div>";
			echo "</div>";
			//Get authentication json file
			$vision = new VisionClient(['keyFile' =>json_decode(file_get_contents("../my-project-12052-276416-d6984df8233e.json"), true) ]);

			$familyPhotoResource = fopen("file:///C:/xampp/htdocs/handwriting-recognition/".$file_name,'r');
			$image = $vision->image($familyPhotoResource, ['DOCUMENT_TEXT_DETECTION']);
			$result = $vision->annotate($image);

			$document = $result->fullText();
			$text = $document->text();
			echo "<div class='float-child-right'>";
				echo "<div class='image-text'><h4>Image Text:</h4></div>";
				echo "</br>";
				echo $text;
			echo "</div>";
		echo "</div>";
	echo "</div>";
}
?>
