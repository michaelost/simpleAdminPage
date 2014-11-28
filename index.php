<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link href="http://hayageek.github.io/jQuery-Upload-File/uploadfile.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://hayageek.github.io/jQuery-Upload-File/jquery.uploadfile.min.js"></script>

	<script>
		$(document).ready(function()
						{
							$("#fileuploader").uploadFile({
								url:"YOUR_FILE_UPLOAD_URL",
								fileName:"myfile"
						});
});
</script>

	<script>
	$(document).ready(function(){
	String.prototype.toInt=function(){
    return parseInt(this.replace(/\D/g, ''),10);
}
			$(".edit").click(function(){				
				if($(this).siblings('div').css('display')=='none')
					$(this).siblings('div').css('display','block');
				else $(this).siblings('div').css('display','none');
			});

			$("input#change").click(function(){				
				var name = $(this).siblings('input.name').val(),
				parent = $(this).siblings('input.parent').val(),
				id = $(this).parent().siblings(".id").text().toInt();
				$.post('script.php',{
					name: name,
					parent_id: parent,
					id: id
				}				
				);
			});
		$('.menu_block').click(function(){
			$('.edit_menu_block').toggle(500);
		});

		$('.show_topic').click(function(){
			$('.show_topic_block').toggle(500);
		});

		$('.show_users').click(function(){
			$('.show_users_block').toggle(500);
		});

		$('.add_topic').click(function(){
			$('.add_topic_block').toggle(500);
		});

		$('#insert').click(function(){
			console.log($(this).siblings('input.name').val());
			console.log($(this).siblings('input.parent').val());
			
			$.post('insert_menu.php',{
				name: $(this).siblings('input.name').val(),
				parent_id: $(this).siblings('input.parent').val()
			},
			yea()
			);
			function yea () {
					$("#insert").attr('value','added');
					setTimeout($("#insert").attr('value','insert'),1000);
					
			}
		});

		$('.add_element').click(function(){
			$('.add_element_block').toggle(500);
		});
		$('input.bun').click(function(){
			var _id = $(this).siblings('.id').text().toInt();
			$.post("ban.php",{
				id: _id,
				ban: 1
			},
				yea()
			);
		function yea(){
			console.log("banned");
		}
		});
		$('input.unbun').click(function(){
				var _id = $(this).siblings('.id').text().toInt();
			
			$.post("ban.php",{
				id: _id,
				ban: 0
			},
				yea()
			);
		function yea(){
			console.log("unbanned");
		}
			});
		
		$("#add_theme").click(function(){
			console.log($(".add_topic_block > .topic_by ").val());
			console.log($(".add_topic_block > .parent_id ").val());
			console.log($(".add_topic_block > .title ").val());
			console.log($(".add_topic_block > .body ").val());
			$.post('add_topic.php',{
				topic_by: $(".add_topic_block > .topic_by ").val(),
				parent_id: $(".add_topic_block > .parent_id ").val(),
				title: $(".add_topic_block > .title ").val(),
				body: $(".add_topic_block > .body ").val()
			},yea()); 
			function yea(){ 
				$("#add_theme").attr('value','added');
				$(".add_topic_block > input").val("");
				$(".add_topic_block > textarea").val("");
				
					setTimeout($("#add_theme").attr('value','add theme'),1000);
			}

		});

		$(".change_topic").click(function(){
		
		});

		$(".change2").click(function(){
			var topic_by = $(this).siblings('.topic_by').val(),
				parent_id = $(this).siblings('.parent_id').val(),
				title = $(this).siblings('.title').val(),
				body = $(this).siblings('.body').val(),
				topic_id = $(this).siblings('.topic_id').val();
				$.post('change_topic.php',{
					topic_by: topic_by,
					parent_id: parent_id,
					title: title,
					body: body,
					topic_id: topic_id
				},yea());
				function yea(){
					console.log('changed');
				}
			
			
		});


	});

	</script>
<style>
	
	div#opa{
		background-color: rgba(255,255,255,0.4); 
		margin-top: 10px;
	}
	div#opa:hover{
		background-color: rgba(255,255,255,0.6);
	}
	.name{
	font-size: 25px;
	}
	.id{
font-size: 25px;
	}
	.parent{
	font-size: 25px;
	}
	.edit{
		color:#FA5858;
		font-size: 26px;
		cursor: pointer;
	}

	body{
		background-image: url("body_bg_new.jpg");
	}
	input{
		font-size: 20px;
	}
	.fr{
		display: none;
	}
.menu_block,.add_element,.show_users,.add_topic,.show_topic{
	cursor: pointer;
	background-color: rgba(255,255,255,0.5);
}
.add_topic_block{
text-align: center;
}
.add_element_block,.add_topic_block,.show_topic_block{
	font-size: 25px;
	background-color: rgba(255,255,255,0.5);
	display: none;
}
.dir{
	font-size: 25px;
	background-color: rgba(255,255,255,0.5);
	display: block;

}

.edit_menu_block,.show_users_block{
	display:none;
}
input#insert{
	outline: none;
	border:0;
	font-size: 20px;
	color:white;
	background-color: black;
	padding: 10px;
	border-radius: 10px;
	cursor: pointer;
}
input#insert:hover{
	transition:0.5s;
	background-color: white;
	color:black;
}
input[type='text']{
border-radius: 10px;
margin-top: 5px;
}
</style>
</head>
<body>	
<?php
 $db = mysql_connect ("localhost","root","123qweasdzxcv");
 mysql_select_db("laba",$db);
 	echo '<div class="menu_block">';
   echo "<h1>edit menu</h1>";
   echo '</div>';
   echo '<div class="add_element">';
   echo "<h1>add element to menu</h1>";
   echo '</div>';
   echo '<div class="show_users">';
   echo "<h1>show_users</h1>";
   echo '</div>';   
   echo '<div class="add_topic">';
   echo "<h1>add_topic</h1>";
   echo '</div>'; 
   echo '<div class="show_topic">';
   echo "<h1>show_topic</h1>";
   echo '</div>'; 
$query = "SELECT * FROM category";
$result = mysql_query($query,$db);
$query2 = "SELECT * FROM users";
$result2 = mysql_query($query2,$db);
$query3 = "SELECT * FROM topic";
$result3 = mysql_query($query3,$db);

echo mysql_num_rows($result);
if(mysql_num_rows($result) !=0){
	echo '<div class="edit_menu_block">';
	for($i = 0; $i<mysql_num_rows($result);$i++){		
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
			echo "<div id='opa'>";
			echo "<span class='name'>name:  ".$row['name']."</span><br>";
			echo "<span class='id'>".$row['category_id']."</span><br>";
			echo "<span class='parent'>parent_id:  ".$row['parent']."</span><br>";
			echo "<span class='edit'>edit</span>";
			
				echo "<div class='fr'>";
					echo "name:   <input class='name' type='text' value=".$row['name'].">";
					echo "<br>";
					echo "parent:<input  class='parent' type='text' value=".$row['parent'].">";
					echo "<input  type='button' id='change' value='change' name='change'>";
				echo "</div>";
			echo "</div>";			
	}
 echo '</div>';
					echo "<div class='add_element_block'>";
					echo "name: <input class='name' type='text' >";
					echo "<br>";
					echo "parent:<input  class='parent' type='text'></br>";
					echo "<input  type='button' id='insert' value='insert' name='insert'>";
					echo "</div>";

}
						//show all users
						echo "<div class='show_users_block'>";
						for($i = 0; $i<mysql_num_rows($result2);$i++){
 			
						$row2 = mysql_fetch_array($result2,MYSQL_ASSOC);
							echo "<div id='opa'>";
								echo "<span class='id'>id:  ".$row2['id']."</span><br>";
								echo "<span class='login'>login:".$row2['login']."</span><br>";
								echo "<span class='password'>password:  ".$row2['password']."</span><br>";
								echo "<span class='email'>email:  ".$row2['email']."</span><br>";
								echo "<span class='isbanned'>isbanned:  ".$row2['isbanned']."</span><br>";
								echo "<input type='button' class='bun' value='ban' />";
								echo "<input type='button' class='unbun' value='unban'/>";	
								echo "</div>";
						}	
						echo "</div>";	
						//add_topic
					echo "<div class='add_topic_block'>";
					echo "topic_author_id: <input class='topic_by' type='text' >";					
					echo "parent_id: <input class='parent_id' type='text' >";					
					echo "title:<input  class='title' type='text'></br>";
					echo "text:<br><textarea class='body' rows='10' cols='150' class='title'></textarea></br>";					 
					echo "<input  type='button' id='add_theme' value='add theme' name='add_theme'>";
					echo "</div>";


					//all topic

					echo "<div class='show_topic_block'>";
						for($i = 0; $i<mysql_num_rows($result3);$i++){
 			
						$row3 = mysql_fetch_array($result3,MYSQL_ASSOC);
							echo "<div id='opa'>";
								echo "<span class='topic_id'>topic_id:  ".$row3['topic_id']."</span><br>";
								echo "<span class='parent_id'>paremt_id:".$row3['parent_id']."</span><br>";
								echo "<span class='topic_by'>topic_by:  ".$row3['topic_by']."</span><br>";
								echo "<span class='title'>title:  ".$row3['title']."</span><br>";
								echo "<span class='body'>isbanned:  ".$row3['body']."</span><br>";
								
									

								echo "<div class='fr2'>";
								echo "id:   <input class='topic_id' type='text' value=".$row3['topic_id']."></br>";
								echo "<br>";
								echo "parent:<input  class='parent_id' type='text' value=".$row3['parent_id']."></br>";
								echo "topic_by:<input  class='topic_by' type='text' value=".$row3['topic_by']."></br>";
								echo "title:<input  class='title' type='text' value=".$row3['title']."></br>";
								echo "body:<textarea  class='body'>".$row3['title']."</textarea></br>";
								
								echo "<input  type='button' class='change2' value='change2' name='change2'>";
								echo "</div>";



								echo "</div>";
						}	
						echo "</div>";	





							echo "<div class='dir'>";
							if ($handle = opendir('.')) {
    						while (false !== ($entry = readdir($handle))) {
        					if ($entry != "." && $entry != "..") {
        					echo "<h3>";
            				echo "$entry\n";
            				echo "<input type='button' class='delete_file' value='delete' >";
            				echo "</h3>";
        						}
   						 	}
    						closedir($handle);
							}
							echo "</div>";

 ?>
</body>
</html>
