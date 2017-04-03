<h2>Featured topics:</h2>
  <ul class="large-block-grid-3 featured-topic-grid">
  <% loop $BlogPosts.Sort('RAND()').Limit(3) %>
    <li>
      <a href="$Link">
      <h3><i class="fa fa-file-text-o fa-lg fa-fw"></i>$Title</h3>
      <p>$Content.LimitCharacters(100)</p>
      </a>
    </li>
  <% end_loop %>
  </ul>