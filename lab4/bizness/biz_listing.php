<?php 
	$db = mysqli_connect("localhost", 'root','maivantien1107','business_service') or die("không thế kết nối");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Business Listings</title>
	<script type="text/javascript">
		function toggleClass(el, className) {
		    if (el.className.indexOf(className) >= 0) {
		        el.className = el.className.replace(className,"");
		        let id = el.id.toString();

		        let list_category = document.getElementsByClassName("category");

		        for(let i=0; i<list_category.length; i++){
		        	let category_member = list_category[i];
		        	if(category_member.textContent.includes(id)){
		        		category_member.parentElement.style.display = 'none';
		        	}
		        }

		    }
		    else {
		        el.className  += className;
		        let id = el.id.toString();

		        let list_category = document.getElementsByClassName("category");

		        for(let i=0; i<list_category.length; i++){
		        	let category_member = list_category[i];
		        	if(category_member.textContent.includes(id)){
		        		category_member.parentElement.style.display = '';
		        	}
		        }
			}

			
		}
	</script>
	<style type="text/css">
        table, th, td {
    border: 1px solid black;
}
		#table-right {
			border-spacing: 15px;
		}
		.container {
            display: inline-block;
            width: 40%;
            margin-left: 5%;
        }
		.gridview .selected, .gridview tbody .selected {
		    background-color: black;
		    color: #fff;
		}
	</style>
</head>
<body>
<div class="container">
<h1>Business Listings</h1> <br /><br />
	<div style="overflow: scroll; width: 80%; height: 150px;"> 
		<table  width="100%" class="gridview">
			<?php 
				$query = "select * from categories";
				
				$result = mysqli_query($db, $query);
				while($row = mysqli_fetch_array($result)){
					$name_category = $row["Title"];
					$id_category = $row["cateID"];
					
			?>
				<tr onclick="toggleClass(this,'selected');" id=<?php echo '"' . strval($id_category) . '"' ?>>
					<td><?php echo $name_category ?></td>
				</tr>
			<?php 
				}
			?>
		</table>		
	</div>
</div>
<div class="container">
	<table >
		<?php 
			$query = "select * from businesses";
			
			$result = mysqli_query($db, $query);

			while($row = mysqli_fetch_array($result)){
				$id = $row["BusinessID"]; 
				$name = $row["Name"]; 
				$adress = $row["Address"];
				$city = $row["City"];
				$telephone = $row["Telephone"];
				$url = $row["URL"];
			
		 ?>
				<tr id=<?php echo '"' . $id . '-business' . '"' ?>>
					<td><?php echo $id ?></td>
					<td><?php echo $name ?></td>
					<td><?php echo $adress?></td>
					<td><?php echo $city ?></td>
					<td><?php echo $telephone ?></td>
					<td><?php echo $url ?></td>
					<td class = "category">
						<?php 
							$sql = "select * from biz_category where BusinessID=" . $id;
							$result_i = mysqli_query($db, $sql);

							while($row = mysqli_fetch_array($result_i)){
								echo $row["cateID"] . " ";
							}
						?>
					</td>
				</tr>

		<?php
			}
		 ?>
	</table>
</div>



<script type="text/javascript">
	let list_category = document.getElementsByClassName("category");

    for(let i=0; i<list_category.length; i++){
    	let category_member = list_category[i];
    	category_member.parentElement.style.display = 'none';
    }
</script>
<?php 
   if($db){
       $db->close();
   }
?>
</body>
</html>