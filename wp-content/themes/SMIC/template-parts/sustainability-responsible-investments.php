
<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>


<section class="smph-wrapper responsible-investments-tabs-container wow fadeIn">
	<div class="smph-inner-subcontainer">
		<ul class="communities-list">
			<li><a href="#" data-text="SM Retail" data-target="smRetail" class="active">SM Retail</a></li>
			<li><a href="#" data-text="THE SM STORE" data-target="theSmStore">THE SM STORE</a></li>
			<li><a href="#" data-text="SM Markets" data-target="smMarkets">SM Markets</a></li>
			<li><a href="#" data-text="SM Prime" data-target="smPrime">SM Prime</a></li>
			<li><a href="#" data-text="BDO" data-target="bdo">BDO</a></li>
			<li><a href="#" data-text="China Bank" data-target="chinaBank">China Bank</a></li>
			<li><a href="#" data-text="Equity Investments" data-target="equity">Equity Investments</a></li>
		</ul>
	</div>
</section>

<section class="smph-wrapper responsible-investments-tabs-content pt-0 pb-0">

	<?php include('responsible-investments/sm_retail.php'); ?>

	<?php include('responsible-investments/sm_store.php'); ?>

	<?php include('responsible-investments/sm_markets.php'); ?>

	<?php include('responsible-investments/sm_prime.php'); ?>

	<?php include('responsible-investments/bdo.php'); ?>

	<?php include('responsible-investments/chinabank.php'); ?>

	<?php include('responsible-investments/equity.php'); ?>

		

</section>