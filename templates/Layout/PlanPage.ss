<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

$Header
<main class="main-content__container" id="main-content__container">

	<!-- Background Image Feature -->
	<% if $BackgroundImage %>
		<% include FeaturedImage %>
    <% end_if %>
    
	<% if not $BackgroundImage %>
		<div class="column row row--plan">
            <div class="main-content__header">
                $Breadcrumbs
				<h1>$Title</h1>
			</div>
		</div>
	<% end_if %>

	$BeforeContent

	<div class="row row--plan column">

		<article class="plan-content">
			$BeforeContentConstrained
			<% if $MainImage %>
				<img class="main-content__main-img" src="$MainImage.ScaleMaxWidth(500).URL" alt="" role="presentation"/>
			<% end_if %>
			<div class="main-content__text">
				
				<div class="plan-intro">
					$Content

					<% if not $HideToc %>
					<div class="plan-sidebar">
				    <h2 class="plan-sidebar__header">Table of Contents</h2>
				    <ul class="plan-sidebar__nav">
				    	<% loop $PlanCategories %>
				        <li class="plan-sidebar__section"><a class="plan-sidebar__link" href="#plan-section-{$ID}">$Title</a>
				        	<% if not $Top.HidePlanItemsFromToc %>
					        	<% if $PlanItems %>
					        		 <ul class="plan-sidebar__nav plan-sidebar__nav--second-level">
					        		<% loop $PlanItems %>
						                <li><a class="plan-sidebar__link plan-sidebar__link--sec-level" href="#plan-item-{$ID}">$Title</a></li>
							        <% end_loop %>
							        </ul>
					            <% end_if %>
				            <% end_if %>
				        </li>
				        <% end_loop %>
				    </ul>
				</div>
				<% end_if %>
<div class="clearfix"></div>
				</div>

				<% loop $PlanCategories %>
				<div class="plan-section__container">
					<h2 class="plan-section__table-label" id="plan-section-{$ID}">$Title</h2>
					<div class="plan-section grid-container full">
						<% if $Content %>
						<div class="plan-section">
							$Content
						</div>
						<% end_if %>
<%-- 						<div class="plan-table">
							<div class="grid-x grid-margin-x">
								 <div class="cell medium-6"><h3 class="plan-table__cell-heading">$Column1Heading</h3></div>
								 <div class="cell medium-6"><h3 class="plan-table__cell-heading">$Column2Heading</h3></div>
							</div>
							<div class="grid-x grid-margin-x">
								<div class="cell medium-6">$Column1Content</div>
								<div class="cell medium-6 plan-table__updates">$Column2Content</div>
							</div>
						</div> --%>
						<% loop $PlanItems %>
						<div class="plan-table <% if not $Column2Heading && not $Column3Heading %> plan-table--white-bg<% end_if %>">
							<div class="grid-x grid-margin-x">
								
								
								<% if $Column3Heading %>
								
								<div class="cell medium-4">
									<h3 id="plan-item-{$ID}" class="plan-table__cell-heading">$Column1Heading</h3>
								$Column1Content </div>
								<div class="cell medium-4 plan-table__updates"><h3 id="plan-item-{$ID}" class="plan-table__cell-heading">$Column2Heading</h3>$Column2Content</div>

								<div class="cell medium-4 plan-table__updates"><h3 id="plan-item-{$ID}" class="plan-table__cell-heading">$Column3Heading</h3>$Column3Content</div>


								<% else_if $Column2Heading %> 

									<div class="cell medium-6">
										<h3 id="plan-item-{$ID}" 
										class="plan-table__cell-heading">$Column1Heading
										</h3>
										$Column1Content 
									</div>
								
									<div class="cell medium-6 plan-table__updates">
										<h3 id="plan-item-{$ID}" 
										class="plan-table__cell-heading">$Column2Heading
										</h3>
										$Column2Content
									</div>

								<% else %>
									<div class="cell medium-12">
										<h3 id="plan-item-{$ID}" 
										class="plan-table__cell-heading">$Column1Heading
										</h3>
										$Column1Content 
									</div>
								<% end_if %>



							
							</div>
						</div>
						<% end_loop %>
						</div>
					</div>
				<% end_loop %>

			$AfterContentConstrained
			$Form
			<% if $ShowChildPages %>
				<% include ChildPages %>
			<% end_if %>
		</article>
	</div>

	$AfterContent

	</main>
