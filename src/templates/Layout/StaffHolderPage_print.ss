	
<style>
@media print { 

 a[href]:after {
	content: "";
	}
}
.main-content__text a{
	text-decoration: none;
}


h1{
	margin-top: 0;
	margin-bottom: 5px;
	font-size: 22px;
	text-align: center;
	text-transform: uppercase;
}

h2{
	font-size: 18px;
	margin-top: 10px;
}

h3{
	margin-top: 5px;
	margin-bottom: 3px;
	font-size: 14px;
}

.stafflist__team{
	page-break-inside: avoid;
}
.stafflist__item{
	margin-bottom: 0;
}

.stafflist__list{
	margin-bottom: 0;
}

.stafflist__name a{
	text-decoration: none;
	
	
}

.stafflist__text{
	font-size:12px

}

.stafflist__position{
	display: block;
	font-size:9px;
	line-height: 1.4;
}
.stafflist__title{
	text-align:left;
	border-bottom: 8px solid #ffcd07;
	line-height: 1.4;
	display: block;
}
.stafflist__email{
	color: black;
	font-size:8px;
	line-height: 1.4;
	display: block;
}
.stafflist__phone{
	font-size:8px;
	line-height: 1.4;
	display: block;
}
</style>
	$BeforeContent

	<div class="row">

		<article role="main" class="main-content main-content--full-width">


			$BeforeContentConstrained

			<div class="main-content__text">
				<h1>$SiteConfig.Title - $Title</h1>
				<div class="stafflist">
					
				<% if $Teams %>
					<% loop $Teams %>
						<div class="stafflist__team">
						<h2 class="stafflist__title">$Title</h2>
						<ul class="stafflist__list no-bullet row small-up-1 medium-up-2 large-up-5">
						<% if $Up.SortLastName %>
							<% loop $SortedStaffPages.Sort(LastName, ASC) %>
								<% include StaffPageListItem_print %>
							<% end_loop %>
						<% else %>
							<% loop $SortedStaffPages %>
								<% include StaffPageListItem_print %>
							<% end_loop %>
						<% end_if %>
						</ul>
						</div>
					<% end_loop %>
				<% else %><%-- end if teams --%>
					<ul class="stafflist__list no-bullet row small-up-1 medium-up-2 large-up-3">
						<% loop $Children %>
							<% include StaffPageListItem_print %>
						<% end_loop %>
					</ul>
				<% end_if %>
				</div><%-- end stafflist --%>
			</div>
			$AfterContentConstrained
			$Form
		</article>
	</div>

	$AfterContent

</main>