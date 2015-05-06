<% if $ClassName != "HomePage" %>
	<% if $allVersions.Count > 2 %>
		<p class="last-edit">This page was updated on $LastEdited.Format("M j, Y") by  <a href="information/">{$allVersions.First.Author.Name}. </p>
	<% else %>
			<p class="last-edit">This page was created on $Created.Format("M j, Y") by  <a href="information/">{$allVersions.First.Author.Name}. </p>			
	<% end_if %>
<% end_if %>
