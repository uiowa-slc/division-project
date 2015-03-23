<div class="module">
    <div class="media">
    <% if $YouTubeEmbed %>
    	$YouTubeEmbed
    <% else %>
    <% if $ExternalLink %>
      <a href="$ExternalLink" target="_blank">
    <% else %>
        <a href="$AssociatedPage.Link">
    <% end_if %>
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPoAAACvCAIAAABbzVQuAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo3QkU4OTA5OEI5MkQxMUU0OEUzOThEQTY2MDVENzZFNCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo3QkU4OTA5OUI5MkQxMUU0OEUzOThEQTY2MDVENzZFNCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkY3MkZFRkZGQjkyNTExRTQ4RTM5OERBNjYwNUQ3NkU0IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkY3MkZGMDAwQjkyNTExRTQ4RTM5OERBNjYwNUQ3NkU0Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+uN1YoQAABGFJREFUeNrs3WFqG0EQROER1P1v6Xskv2JiYjuSZ2Gn6/MB3ja9r4sIUtLj7e1tbfp7PB7rsr9L4UcPD/7/8HDR8D3wcBG8Bx4uGr4HHi6C98DDRcP3wMNF8B54uMiYHni4CN4DDxcZ0wMPF8F74OEiY3rg4SJ4DzxcZEwPPFwE74GHi4zpgYeL4D3w2AtjeuDhIngPPPbCmB54uAjeA4+9MKYHrpoNXgRXzWZMEVw1G7wIrpoNXgRXzQYvgqtmg6tmcxF8Ilw1G7wIHnsB74GrZoMXwWMv4D1w1WzwInjsBbwHrpoNXgSPvYD3wFWzwYvgqtngFfClmg3eBlfNBp8f6v/4qCrUwcfDVbPB54f6Zt2FOvgR8NgL+PhQ36O7UAc/Cx57AR8f6j/SXaiDHwqPvYCPD/VXdBfq4KfDYy/g40P9Cd2FOvgYeOwFfHyof6+7UAefB4+9gI8P9U91F+rgg+GxF/Dxof5Rd6EO3gCPvYCPD/V33e0dvAceewEfH+qq2eCN8NgL+PhQv0R3LxX85vDYC/j4UN+pu5cKfgo89gI+PtQ36O6lgh8Hj72A9/wXEtVs8CJ47AW8Z3jVbPCiQ4qlg/cMr5oNXnRIsXTwnuFVs8GLDimWDt4zvGo2eNEhxdLBe4ZXzQYvOqQLq9neKBfvNrxqNnjRIcXSwXuGV80GLzqkWDp4z/Cq2eBFhxRvFLxneNVs8KJDijcK3jO8aja4arY3ysWJw6tmgxcNH2+Uiz3Dq2aDFw0fb5SLPcOrZoMXDR9vlIs9w6tmgxcNH2+Uiz3Dq2aDFw3vZ4S5WDR8LB28Z3g/I8zF+cOv634kno5cvO3wfkaYi/NDfb/udOTi/Yf3M8JcnB/q23SnIxdvNfy67psIfL8kF8/iq2aDzw/1H+ku1Ll4KF81m4vzQ/0V3Q/dCxeF+nO6i0YuHh3qT+gu1Lk4hq+azcX5of697kKdi/P4qtlcnB/qn+rOGC4O5qtmc3F+qH/UnTFcbOCrZnNxfqh/9VHV0sGn8lWzuTg/1P/wVbPB5/PXFd9EQBehfvP9qGaDzw/1nbrTRaifsh/VbPD5ob5Bd7oI9eP2o5oNPj/UX9edLkL93P2oZjuk+aH+tO50EeoD9qOa7ZCKbil04WIPXzXbIRX9Ayl04WIPXzXbIRV96g1duNjDV812SPND/S/d6cLFEr5qtkOaH+pffVTlIhen8lWzHdL8UL9Kdy7i3/mWVLMd0vxQX3u/iYCL+Efckmo2UeaH+h7duYh/1i2pZhNlfqj/SHcu4h96S6rZRJkf6q/ozkX8029JNZuIq+cR4SJ+zy2pZhOx6BGhC9d7bkk1m4hFjwhduN5zS6rZRCx6ROjC9Z5bUs0mYtEj4kfWud5zS6rZRCx6RLxOrvfckmo2EYseEa+T6yW3tFSzidjj+oYv3hDq+EeIviHdhToRD3J93fNnhLnuli56imo2fovr61Y/I8x1t3T1U1Sz8Vtc//33S4ABAJtlFchXCwLyAAAAAElFTkSuQmCC" data-src="$Image.CroppedImage(350,197).URL" alt="An image representing $Title">
        </a>
    <% end_if %>
    </div>
    <div class="inner">
        <h3>
        <% if $ExternalLink %>
          <a href="$ExternalLink" target="_blank">
        <% else %>
          <a href="$AssociatedPage.Link">
        <% end_if %>
        	$Title</a>
      </h3>
        	$Content
    </div>
</div>
