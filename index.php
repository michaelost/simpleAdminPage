<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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

		$('.show_users').click(function(){
			$('.show_users_block').toggle(500);
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

.menu_block,.add_element,.show_users{
	cursor: pointer;
	background-color: rgba(255,255,255,0.5);

}

.add_element_block{
	font-size: 25px;
	background-color: rgba(255,255,255,0.5);
	display: none;
}

.edit_menu_block,.show_users_block{
	display: none;
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
   
$query = "SELECT * FROM category";
$result = mysql_query($query,$db);

$query2 = "SELECT * FROM users";
$result2 = mysql_query($query2,$db);

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
								echo "<span class='name'>id:  ".$row2['id']."</span><br>";
								echo "<span class='id'>login:".$row2['login']."</span><br>";
								echo "<span class='parent'>password:  ".$row2['password']."</span><br>";
								echo "<span class='parent'>email:  ".$row2['email']."</span><br>";
								echo "</div>";
						}	
						
						echo "</div>";	


 ?>

</body>
</html>
