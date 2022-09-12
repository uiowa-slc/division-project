$Header
<main class="main-content__container" id="main-content__container">
	<!-- Background Image Feature -->
	<% if $BackgroundImage %>
		<% include FeaturedImage %>
	<% end_if %>

    <% include MainContentHeader %>

	$BeforeContent

	<div class="row">

		<article class="main-content main-content--with-padding <% if not $HideLinksToStaffPages %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">


			$BeforeContentConstrained

			<div class="main-content__text">
				$Content
				<div class="stafflist">
				<% if $Teams %>
					<% loop $Teams %>
                        <% if $SortedStaffPages %>
						<h2 class="stafflist__title">$Title</h2>
                        <% if $Name == "Complimentary Appointments" %><p>Complimentary appointments are given to UI staff or faculty who have integral roles in UCS services, including collaborative care for students, research, or training efforts. These individuals have primary appointments in other university departments, but are included as part of UCS staff via complimentary appointments.</p>
                        <% else_if $Name == "Psychology Interns" %>
                            <p>Psychology Interns are doctoral students in applied psychology programs that matched with the University Counseling Service for a year-long, full-time placement.  They perform many of the same roles as the full-time staff.  The psychology internship is the last stage of training before a doctoral degree is conferred and one of the last training opportunities before a psychologist can pursue independent licensure.  Psychology interns are under the supervision of several senior UCS staff members.</p>
                        <% else_if $Name == "Practicum Trainees" %>
                            <p>Practicum Trainees are graduate students in counseling psychology or social work who are under the supervision of a staff therapist.  In their graduate coursework, they are trained in they are trained in evidence-based techniques to provide counseling and other mental health interventions such as facilitating psychoeducational workshops or providing outreach presentations.</p>
                        <% end_if %>
						<ul class="stafflist__list no-bullet row small-up-1 medium-up-2 large-up-3">
						<% if $Up.SortLastName %>
							<% loop $SortedStaffPages.Sort(LastName, ASC) %>
								<% include StaffPageListItem %>
							<% end_loop %>
						<% else %>
							<% loop $SortedStaffPages %>
								<% include StaffPageListItem %>
							<% end_loop %>
						<% end_if %>
						</ul>
                        <% end_if %>
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
		<aside class="sidebar dp-sticky">

			<% if not $HideLinksToStaffPages %>
				<% include SideNav %>
			<% end_if %>
			$Sidebar

		</aside>
	</div>

	$AfterContent

</main>
