			<nav class="navbar navbar-inverse navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php">Quick Cooking</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">

							<?php
							foreach($pages as $page_name => $subpage):

								if (!is_array($subpage)):

									$class = '';
									if ($current_page == $subpage) {
										$class = 'active';
									}
							?>
							<li class="<?= $class ?>"><a href="<?= $subpage ?>"><?= $page_name ?></a></li>
							<?php else: ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $page_name ?> <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<?php foreach($subpage as $subpage_name => $subpage_url): ?>
									<li><a href="<?= $subpage_url ?>"><?= $subpage_name ?></a></li>
									<?php endforeach ?>
								</ul>
							</li>
							<?php
								endif;

							endforeach;
							?>

						</ul>
						<form class="navbar-form navbar-right" action="search.php" method="GET">
							<div class="input-group">
								<input name="search" type="text" class="form-control" placeholder="Recherche rapide...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit">
										<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
									</button>
								</span>
							</div>
						</form>
					</div>
				</div>
			</nav>