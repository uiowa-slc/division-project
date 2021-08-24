<% with $BackgroundImage %>
    <div class="background-image" data-interchange="[$FocusFill(768,400).URL, small], [$FocusFill(1024,350).URL, medium], [$FocusFill(1600,500).URL, large]" style="background-position: {$PercentageX}% {$PercentageY}%">
<% end_with %>
    <div class="row column">
        <div class="background-image__header">
            $Breadcrumbs
            <h1 class="background-image__title">$Title</h1>
        </div>
    </div>
</div>
