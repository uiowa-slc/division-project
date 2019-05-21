	
<style>
@media print { 

 a[href]:after {
	content: "";
	}
}
.main-content__text a{
	text-decoration: none;
}
.stafflist__name a{
	text-decoration: none;
	
	
}
.stafflist__name{
	font-size:17px;
	color: black;
}
.stafflist__position{
	font-size:13px
}
.stafflist__title{
	text-align:left;
}
.stafflist__email{
	color: black;
	font-size:12px;
	line-height:10px;
}
.stafflist__phone{
	font-size:12px;
}
.stafflist__border{
	background:#ffcd07;
	height:12px;
	margin-bottom:20px;
	
}
.staffpage__printbreak{
	font-size:12px;
}

</style>
	$BeforeContent

	<div class="row">

		<article role="main" class="main-content main-content--with-padding main-content--full-width">


			$BeforeContentConstrained

			<div class="main-content__text">
				<h2>$Title</h2>
				<div class="stafflist">
					
				<% if $Teams %>
					<% loop $Teams %>
						<h2 class="stafflist__title">$Title</h2>
						<div class="stafflist__border"></div>
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
					<% end_loop %>
				<% else %><%-- end if teams --%>
					<ul class="stafflist__list no-bullet row small-up-1 medium-up-2 large-up-3">
						<% loop $Children %>
							<% include StaffPageListItem %>
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