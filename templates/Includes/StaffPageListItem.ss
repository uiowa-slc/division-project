<li>
      <% if $Photo %>
      <a href="$Link" class="staff-link">
            <img src="$Photo.CroppedImage(350,234).URL" alt="$FirstName $LastName" class="staff-img">
      </a>
      <% else %>
      <a href="$Link" class="staff-link">
            
            <img src="division-project/images/dosl.png" alt="$FirstName $LastName" class="staff-img">
      </a>
      <% end_if %>
      <p class="staff-name">
            <a href="$Link">$FirstName $LastName</a>
            <% if $Position %><small class="staff-position">$Position</small><% end_if %>
      </p>
</li>