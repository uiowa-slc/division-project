<% if $FeedbackText || $FeedbackLink %>
<div class="topic-content topic-feedback">
	$FeedbackText
	<% if $FeedbackLink %><a href="$FeedbackLink" class="button">Submit feedback or information</a><% end_if %>
</div>
<% end_if %>
