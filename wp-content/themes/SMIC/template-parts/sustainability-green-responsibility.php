<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>


<?php if($fields['second_stack']): ?>
<section class="smph-wrapper second-stack parallax" style="background-image: url('<?= get_template_directory_uri().'/assets/images/sustainability//trees.jpg'; ?>')">
	<div class="overlay"></div>
	<div class="smph-inner-subcontainer">
		<div class="second-stack-container row">
			<div class="left-content col-md-6">
				<h3 class="title"><?= $fields['second_stack']['left_content']['title']; ?></h3>
				<p class="desc"><?= $fields['second_stack']['left_content']['description']; ?></p>
			</div>
			<div class="right-content col-md-6">
				<h3 class="title"><?= $fields['second_stack']['right_content']['title']; ?></h3>
				<p class="desc"><?= $fields['second_stack']['right_content']['description']; ?></p>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<section class="smph-wrapper third-stack green-responsibility-wrapper">
	<div class="smph-inner-subcontainer">
		<div class="third-stack-container row">
			<div class="col-md-6">
				<h3 class="title">Managing Our Energy Consumption</h3>
				<p>We implement energy efficiency programs that directly help reduce our consumption and our emissions.</p>
				<p>SM Prime engaged an Energy Savings Company (ESCO) which introduced EBASTM, a building management enhancement system which allows remote and dynamic control of air-conditioning systems to ensure energy efficiency in the malls. We also invested in renewable energy sources with 10 of our malls having rooftop solar energy panels with a 9.2 MW capacity.</p>
				<p>Another critical factor is our use of fuels and chemicals. We use diesel for our generators, while SM Supermalls utilizes LPG for its food tenants’ requirements. Meanwhile, our businesses utilize diesel, gasoline and compressed natural gas for its company-owned vehicles. To ensure that 2GO's shipping vessels run on fuel-efficient engines, its fleet undergoes regular dry-docking.</p>
			</div>
			<div class="col-md-6 d-flex align-items-center">
				<div class="slick-here">
					<img src="<?= get_template_directory_uri().'/assets/images/sustainability/fuel-consumption-within-organization.png'; ?>" alt="" class="infographics-img">
					<img src="<?= get_template_directory_uri().'/assets/images/sustainability/electricity-consumption-within-organization.png'; ?>" alt="" class="infographics-img">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="smph-wrapper fourth-stack green-responsibility-wrapper">
	<div class="smph-inner-subcontainer">
		<div class="fourth-stack-container row">
			<div class="col-md-6">
				<h3 class="title">Minimizing Our Greenhouse Gas (GHG) Emissions*</h3>
				<p>We aim to minimize our GHG emissions, doing our share to limit the global temperature increase to 1.5ºC as we align with the Paris Agreement and adhere to RA8749 or the Clean Air Act standards. We seek innovative solutions and technologies as part of our air quality management initiatives, in support of the Integrated Air Quality Improvement Framework enacted by the Department of Environment and Natural Resources (DENR). </p>
			</div>
			<div class="col-md-6">
				<img src="<?= get_template_directory_uri().'/assets/images/sustainability/greenhouse-gas.png'; ?>" alt="" class="infographics-img mt-0 mb-0">
			</div>
			<div class="col-md-12">
				<div class="scopes-wrapper">
					<div class="scope">
						<div class="box-wrapper">
							<div class="box scope-1"></div>
							<p><strong>Scope 1 <span>-</span></strong></p>	
						</div>
						<p>Emissions arising from the use of diesel, gasoline, liquefied petroleum and compressed natural gas in facilities fully owned and controlled by the company including generator sets and company-owned vehicles</p>
					</div>
					<div class="scope">
						<div class="box-wrapper">
							<div class="box scope-2"></div>
							<p><strong>Scope 2 <span>-</span></strong></p>	
						</div>
						<p>Emissions arising from our use of purchased electricity in facilities that are fully controlled and operated by the company</p>
					</div>
					<div class="scope">
						<div class="box-wrapper">
							<div class="box scope-3"></div>
							<p><strong>Scope 3 <span>-</span></strong></p>	
						</div>
						<p>Emissions arising from sources that are neither owned nor controlled by the company such as third party transportation and use of sold or leased products, services and property</p>
					</div>
					<p class="note">* Calculated following the operational approach of the Greenhouse Gas Protocol. Moreover, Scope 2 emissions were computed using the 2015-2017 National Grid Emission Factors provided by the Department of Energy.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="smph-wrapper avg-water-container parallax" style="background-image: url('<?= get_template_directory_uri().'/assets/images/sustainability/4-Water-BG-Full.jpg'; ?>')">
	<div class="overlay"></div>
	<div class="smph-inner-subcontainer">
		<div class="paralllax-content">
			<div class="title-wrapper">
				<h4 class="title">Average Percentage of Water Recycled</h4>
			</div>
			<div class="body-wrapper">
				<div class="water-wrapper">
					<p class="count counter">33.6%</p>
					<p class="description">SM Prime</p>
				</div>
				<div class="water-wrapper">
					<p class="count counter">55%</p>
					<p class="description">Atlas Mining</p>
				</div>
				<div class="water-wrapper">
					<p class="count counter">2,031</p>
					<p class="description">Olympic-size pools</p>
				</div>
				<div class="water-wrapper">
					<p class="count counter">3,376</p>
					<p class="description">Olympic-size pools</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="smph-wrapper fifth-stack green-responsibility-wrapper">
	<div class="smph-inner-subcontainer">
		<div class="fifth-stack-container row">
			<div class="col-md-6">
				<h3 class="title">Responsible Use of Water</h3>
				<p>SM Prime, our property group, installed Sewage Treatment Plants (STPs) that treat and recycle water for our non-potable operational water requirements. We strictly follow the guidelines of the Philippine Clean Water Act on effluent quality parameters set by DENR.</p>
			</div>
			<div class="col-md-6 d-flex align-items-center">
				<div class="slick-here">
					<div class="img-wrapper">
						<img src="<?= get_template_directory_uri().'/assets/images/sustainability/by-water-source.png'; ?>" alt="">
					</div>
					<div class="img-wrapper">
						<img src="<?= get_template_directory_uri().'/assets/images/sustainability/total-water-consumption.png'; ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="smph-wrapper fourth-stack green-responsibility-wrapper">
	<div class="smph-inner-subcontainer">
		<div class="fourth-stack-container row">
			<div class="col-md-6">
				<h3 class="title">Adhering to Proper Waste Management</h3>
				<p>We adhere to the standards set by the Republic Act Disposal Method 9003 or the Ecological Solid Waste Management Act, adopting a systematic, comprehensive and ecological waste management program to ensure the protection of public health and the environment through proper segregation, collection, transport, storage, treatment and disposal of solid waste.</p>
			</div>
			<div class="col-md-6 d-flex align-items-center">
				<div class="slick-here">
					<div class="img-wrapper">
						<img src="<?= get_template_directory_uri().'/assets/images/sustainability/disposal-method.png'; ?>" alt="">
					</div>
					<div class="img-wrapper">
						<img src="<?= get_template_directory_uri().'/assets/images/sustainability/solid-waste-generated.png'; ?>" alt="">
					</div>
					<div class="img-wrapper">
						<img src="<?= get_template_directory_uri().'/assets/images/sustainability/hazardous-waste.png'; ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="smph-wrapper bdo-sustainable-energy-finance green-responsibility-wrapper">
	<div class="smph-inner-subcontainer">
		<div class="section-title">
			<h3 class="title">BDO Sustainable Finance</h3>
			<p class="text-center">BDO is leading in instituting sustainable finance in the Philippines banking industry and is a pioneer in issuing Green Bonds. Sustainable Finance is financing and investing in business activities which integrate environmental, social, and governance considerations. BDO Sustainable Finance is leading renewable energy development in the country.</p>
		</div>
	</div>
</section>

<section class="smph-wrapper parallax bdo-sustainable-energy-finance-parallax" style="background-image: url('<?= get_template_directory_uri().'/assets/images/sustainability/bdo-windmill-parallax.jpg'; ?>')">
	<div class="overlay"></div>
	<div class="smph-inner-subcontainer">
		<div class="row">
			
			<div class="col-md-3 bdo-energy-finance-wrapper">
				<p class="count counter">PHP43.4bn</p>
				<p class="description">Total BDO Funding for <br/>renewable energy projects with</p>
			</div>
			
			<div class="col-md-3 bdo-energy-finance-wrapper">
				<p class="count counter">2,168 MW</p>
				<p class="description">total installed capacity</p>
			</div>
			
			<div class="col-md-3 bdo-energy-finance-wrapper">
				<p class="count counter">45</p>
				<p class="description">projects funded to date</p>
			</div>
			
			<div class="col-md-3 bdo-energy-finance-wrapper">
				<p class="count counter">3.9M</p>
				<p class="description">Tonnes of CO<sub>2</sub>e avoided per year</p>
			</div>
			
		</div>
	</div>
</section>


<?php include('more-on/more-on-sustainability.php'); ?>