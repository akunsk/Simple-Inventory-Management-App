<?php
	// Horizontal menu
	require_once 'include.php';
	$home_page = (Utilisateur::getUtilisateurConnecte()->isAdmin()) ? 'admin.php' : 'other.php';
?>
<div id='cssmenu'>
	<ul>
		<li><a href='<?php echo $home_page; ?>'><span>Home</span> </a></li>
		<li class='has-sub'><a href='manage_ranges/'><span>Ranges</span> </a>
			<ul>
				<li><a href='manage_ranges/add_range.php'><span>Add</span></a></li>
				<li><a href='manage_ranges/search_range.php'><span>Search</span></a></li>
				<li class='last'><a href='manage_ranges/display_range.php?n=1'><span>Display (<?php echo Range::count(); ?>)</span> </a></li>
			</ul>
		</li>
		<li class='has-sub'><a href='manage_articles/'><span>Articles</span>
		</a>
			<ul>
				<li><a href='manage_articles/add_article.php'><span>Add</span></a></li>
				<li><a href='manage_articles/search_article.php'><span>Search</span></a></li>
				<li class='last'><a href='manage_articles/display_article.php?n=1'><span>Display (<?php echo Article::count(); ?>)</span> </a></li>
			</ul>
		</li>
		<li class='has-sub'><a href='manage_gadgets/'><span>Gadgets</span> </a>
			<ul>
				<li><a href='manage_gadgets/add_gadget.php'><span>Add</span></a></li>
				<li><a href='manage_gadgets/search_gadget.php'><span>Search</span></a></li>
				<li class='last'><a href='manage_gadgets/display_gadget.php?n=1'><span>Display(<?php echo Gadget::count(); ?>)</span></a></li>
			</ul>
		</li>
<!--
  <li class='has-sub'><a href='#'><span>Entries</span></a>
    <ul>
      <li><a href='#'><span>Add</span></a></li>
      <li><a href='#'><span>Search</span></a></li>
      <li class='last'><a href='#'><span>Display (#)</span></a></li>
    </ul>
  </li>
  <li class='has-sub'><a href='#'><span>Exits</span></a>
    <ul>
      <li><a href='#'><span>Add</span></a></li>
      <li><a href='#'><span>Search</span></a></li>
      <li class='last'><a href='#'><span>Display (#)</span></a></li>
    </ul>
  </li>
-->
		<li class='has-sub'><a href='manage_clients'><span>Clients</span> </a>
			<ul>
				<li><a href='manage_clients/add_client.php'><span>Add</span></a></li>
				<li><a href='manage_clients/search_client.php'><span>Search</span></a></li>
				<li class='last'><a href='manage_clients/display_client.php?n=1'><span>Display (<?php echo Client::count(); ?>)</span> </a></li>
			</ul>
		</li>
		<li class='has-sub last'><a href='stock_management'><span>Stock Management</span>
		</a>
			<ul>
				<li><a href='stock_management/reception.php'><span>Reception</span> </a></li>
				<li><a href='stock_management/delivery.php'><span>Delivery</span> </a></li>
				<li class='last'><a href='stock_management/consultation.php'><span>Consultation (<?php echo Mouvement::count(); ?>)</span></a></li>
			</ul>
		</li>
	</ul>
</div>

