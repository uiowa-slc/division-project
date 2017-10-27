<?php

class RemoveDefaultContentTask extends BuildTask{

	protected $title = 'Removes old default content';
	protected $description = '';

	protected $enabled = true;

	function run($request){




		$needles[1] = '#<h1>H1. This is a very large header.</h1>
<p>The first paragraph directly after an H1 is the lede paragraph and is styled with a larger font size than other paragraphs.</p>
<h2>H2. This is a large header.</h2>
<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient.</p>
<h3>H3. This is a medium header.</h3>
<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh ut fermentum massa justo.</p>
<h4>H4. This is a moderate header.</h4>
<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl.</p>
<h5>H5. This is small header.</h5>
<p>Cum sociis natoque penatibus magnis parturient montes, nascetur ridiculus mus. Sed consectetur est.</p>
<h6>H6. This is very small header.</h6>
<p>Donec id elit non mi porta gravida at eget metus. Curabitur blandit tempus porttitor.</p>#';
		echo '<p>Gathering all pages..</p>';
		$needles[2] = '#<p>The first paragraph directly after an H1 is the lede paragraph and is styled with a larger font size than other paragraphs.</p><h2>H2. This is a large header.</h2><p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient.</p><h3>H3. This is a medium header.</h3><p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh ut fermentum massa justo.</p><h4>H4. This is a moderate header.</h4><p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl.</p><h5>H5. This is small header.</h5><p>Cum sociis natoque penatibus magnis parturient montes, nascetur ridiculus mus. Sed consectetur est.</p><h6>H6. This is very small header.</h6><p>Donec id elit non mi porta gravida at eget metus. Curabitur blandit tempus porttitor.</p>#';		
		$needles[3] = '#<p>The first paragraph directly after an H1 is the lede paragraph and is styled with a larger font size than other paragraphs.</p>
<h2>H2. This is a large header.</h2>
<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient.</p>
<h3>H3. This is a medium header.</h3>
<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh ut fermentum massa justo.</p>
<h4>H4. This is a moderate header.</h4>
<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl.</p>
<h5>H5. This is small header.</h5>
<p>Cum sociis natoque penatibus magnis parturient montes, nascetur ridiculus mus. Sed consectetur est.</p>
<h6>H6. This is very small header.</h6>
<p>Donec id elit non mi porta gravida at eget metus. Curabitur blandit tempus porttitor.</p>#
';
		$needles[4] = '<p>Welcome to SilverStripe! This is the default homepage. You can edit this page by opening <a href="admin/">the CMS</a>.</p><p>You can now access the <a href="http://docs.silverstripe.org">developer documentation</a>, or begin the <a href="http://www.silverstripe.org/learn/lessons">SilverStripe lessons</a>.</p>';
		$pages = SiteTree::get();
		echo '<ul>';
		$matches = array();
		if($pages->Count() == 0){
			echo '<li>all h1s have been destroyed, captain.</li>';
			echo '</ul>';
			return ;
		}

		
			foreach($pages as $page){
				foreach($needles as $needle){
				$pageContent = $page->Content;
				if (preg_match($needle, $pageContent, $matches)){
					echo '<li>Match found on <a href="'.$page->Link().'" target="_blank">'.$page->Title.'</a>, removing default content: "'.htmlentities($matches[0]).'".';

					$htmlReplaced = preg_replace($needle, '', $pageContent);

					//print_r($htmlReplaced);
					$page->Content = $htmlReplaced;
					// echo '<ul><li><pre>';
					// print_r($page->Content);
					// echo '</pre></li></ul>';
					$page->write();

					if($page->isPublished()){
						$page->publish('Stage', 'Live');
					}
				}
				// print_r($matches);
						
				}			
		}

		echo '</ul>';
		echo '<p>Done.</p>';

	}

}