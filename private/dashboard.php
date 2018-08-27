<?php include_once "../configuration.php"; 
if(!isset($_SESSION["a"])){
	header("location: " . $pathAPP . "logout.php");
}

?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
	<?php include_once "../template/head.php"; ?>
</head>
<body>
	
	<div class="grid-container full">
		<div class="grid-x">
			<?php include_once "../template/sidebar.php" ?>
			<div class="cell large-10 medium-7">
				<div id="dashboard-main">
					<h1>Dashboard</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus elit eu velit vestibulum dictum. Sed sollicitudin risus quis diam aliquet, quis eleifend nunc rhoncus. Aenean efficitur dapibus porttitor. Nunc accumsan, lacus a rutrum maximus, purus mi rhoncus velit, ac dapibus sem mauris a risus. Nam felis lectus, tristique vel purus a, egestas scelerisque metus. Vestibulum congue viverra mauris, in porttitor dolor. Sed venenatis, erat ut scelerisque fringilla, felis erat vehicula augue, ut finibus nunc mauris lobortis nisi. Phasellus venenatis varius rhoncus. Curabitur eget nunc sed metus volutpat fringilla in ut nisl. Nam malesuada aliquet felis, a porta nulla pellentesque in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi id sodales risus, quis congue mi. Pellentesque tincidunt velit porttitor dictum consectetur.

					Praesent dolor diam, maximus quis aliquam id, congue et nunc. Morbi sollicitudin rutrum est sit amet laoreet. Sed aliquam nisi non magna lacinia, id pellentesque leo dignissim. Cras porttitor justo mi, ut ullamcorper dolor porttitor ac. Nam facilisis libero vel ex fringilla, ac vulputate mi dapibus. Duis ante odio, condimentum in ultricies sit amet, tempor ac eros. Phasellus aliquam augue dui, et dignissim elit interdum quis. Proin dolor lacus, accumsan ac nibh ac, ultricies ornare dolor. Duis ornare, sapien et vehicula rhoncus, risus lectus tempor metus, ut faucibus massa eros ac nunc. Morbi elementum sit amet leo ut malesuada. Morbi sed magna ac turpis tempus ultricies. Ut condimentum mattis mollis. Morbi porttitor fringilla arcu, ut consequat sem feugiat in.

					Mauris sollicitudin ultricies interdum. Phasellus vehicula orci sit amet sagittis pharetra. Vestibulum ac felis sit amet nibh aliquet ultrices. Nulla consectetur odio eu vulputate molestie. Suspendisse mollis tempus sem a mattis. Phasellus vitae augue at nulla aliquam aliquam sed eu lorem. Vestibulum dictum est eu ligula finibus, a sagittis nibh tincidunt. Maecenas et eleifend lectus. Nam aliquet ex vestibulum erat faucibus faucibus. Mauris eget magna tristique, feugiat nibh a, sollicitudin nunc. Etiam accumsan turpis vitae ligula lacinia pellentesque sit amet at mauris. Suspendisse venenatis vehicula dui. Nam nibh arcu, suscipit vitae malesuada vel, tincidunt vel massa. Suspendisse tincidunt vehicula felis, vitae efficitur odio ultrices ac.

					Suspendisse vitae pellentesque quam, at ultrices neque. In rutrum massa vel urna dapibus fringilla. Curabitur eu nulla cursus, aliquet est nec, dapibus nisi. Curabitur non enim id sapien sagittis scelerisque eu eget tellus. Aliquam non risus nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean pretium suscipit nisi. Nam congue erat tortor, sed ultricies mi tempor vehicula. Suspendisse et ligula eleifend, laoreet tortor in, tincidunt tortor. In ut nunc eleifend, feugiat ipsum et, tristique nibh. Donec ullamcorper lectus sed tincidunt molestie. Aenean vehicula feugiat mi, non egestas eros venenatis vitae. Donec sodales, nisi finibus vestibulum consectetur, neque nisi iaculis odio, at tincidunt sem nulla eget magna. Suspendisse dictum dapibus nulla. Etiam eget tellus ac metus tincidunt lacinia. Morbi ex magna, posuere ut hendrerit vitae, volutpat non nibh.

					Integer eget ipsum euismod, malesuada orci et, lobortis nisi. Mauris eleifend magna ex, ut gravida nisl vestibulum vitae. Morbi vitae sagittis ante, in facilisis nisi. Proin rutrum lobortis odio id molestie. Duis enim felis, suscipit et mattis ac, commodo id elit. Nunc commodo metus a nisi bibendum, vehicula mollis elit aliquet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc condimentum cursus dui a interdum. Suspendisse sed mi nec eros venenatis maximus. Fusce eu metus et ipsum malesuada hendrerit. Vivamus feugiat turpis sem, ut consectetur arcu pretium a. Aliquam ultricies nulla in sapien fringilla varius. Quisque congue fringilla libero vel hendrerit. Duis eu efficitur ipsum. Pellentesque et placerat enim.</p>
				</div>
			</div>
		</div>
	</div> 

	<?php include_once "../template/scripts.php"; ?>
</body>
</html>
