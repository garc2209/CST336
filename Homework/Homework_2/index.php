<!DOCTYPE html>s
<html>
    <head>

		<meta charset="utf-8">

		<meta name="author" content="Jose Garcia" />



		<title>Califonia Lottery Numbers</title>

		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> 




	</head>



	<body>

		<div id="wrapper">

			<img class="ca-logo" src="img/calottery.png" alt="The California Lottery Logo with a letter L in the middel of the sun" />

			

			<?php

			include_once './functions/functions.php';

		

			//Make the $superLotto array global

			global $Lotto;

			//Sort the array

			sort($Lotto);

			

			echo "<table class='lottoTable' border='0''>";

			echo "<tr>

			      <th colspan='5'>Your Lottery Numbers</th>

			      <th>MEGA</th>

			      </tr>";

			

			echo "<tr>";

			



			//Print the lottery number to the screen

			for ($i =0; $i < count($Lotto) + 1; $i++) {



				if ($i == 5) {

					echo "<td id='power'>";

					echo rand(1, 27);

				}else{

					echo "<td>";

					echo $Lotto[$i];

				}

				

				echo "</td>";

			}

			

			?>

			

			</tr>

			</table>



			<!-- Footer section -->

			<footer>

				<hr />

				<figure >

					<img class="footerLogoImage" src="img/csumb-logo.png"

					alt="Image of Otter and first letters of the university, which are M & B" />

				</figure>

			 
           CST 336 Internet Programming. 2017&copy; Garcia 
           <strong>Dislcaimer:</strong> The information in this webpage is fictitous. 
            It is used for academic purposes only.
             
            

			</footer>

		</div><!-- end of wrapper div -->

	</body>
</html>