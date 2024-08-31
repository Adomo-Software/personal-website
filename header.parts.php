<?php if ($INCLUDE_CSS): ?>
		body {
			margin: 0px;
			font-family: "Inter Display";
			background-color: black;
			color: white;
		}

		ul {
			list-style-type: none;
			padding: 0;
		}
		li {
			margin: 5px 0;
		}
		.navfile {
			display: inline;
		}
		.terminal {
			font-family: "Source Code Pro";
			font-size: 12px;
			background-color: black;
			color: white;
			padding: 2rem;
			margin: 0px;
			font-size: 1.25rem
		}
		.terminal a {
			color: white;
		}
		@keyframes blink {
			0% { opacity: 1; }
			50% { opacity: 0; }
			100% { opacity: 1; }
		}

		.blinking-text {
			display: inline;
			animation: blink 1s step-start infinite;
		}

		.heading {
			text-align: center;
			background-color: #303030;
			height: 100%;
			padding: 0.5rem;
			margin: 0px;
			font-size: 1.75rem;
			line-height: 3rem;
        }
        .selected-nav-element {
            background-color: #454545;
        }


        .title pre {
            scale: 1.5;
            padding: 1.5rem;
            text-align: center;
        }

        .title a {
            text-decoration: none;
            outline: none;
            color: white;
        }

        .title {
        	position: relative;
        }

        .title .back {
        	position: absolute;
        	top: 0;
        	padding: 1rem;
        	width: 100%;
        	height: 100%;
        }

        .title .back:hover{
        	text-decoration: underline;
        }


<?php $INCLUDE_CSS=false ?>
<?php endif; ?>
<?php if ($INCLUDE_HTML): ?>
<div class="title">
	<a href="/"> 
		<pre >
           _                                      _         _ _       
          | |                                    | |       (_) |      
  __ _  __| | ___  _ __ ___   ___   __      _____| |__  ___ _| |_ ___ 
 / _` |/ _` |/ _ \| '_ ` _ \ / _ \  \ \ /\ / / _ \ '_ \/ __| | __/ _ \
| (_| | (_| | (_) | | | | | | (_) |  \ V  V /  __/ |_) \__ \ | ||  __/
 \__,_|\__,_|\___/|_| |_| |_|\___/    \_/\_/ \___|_.__/|___/_|\__\___|
		</pre>
	</a>
	<a href="/" class="back">↩ back</a>
</div>

<?php

if ($_SERVER['REQUEST_URI'] == '/') {
	$mydir = 'root';
} else {
	$mydir = substr($_SERVER['REQUEST_URI'], 1);
}
// $command = 'tree -f -D --noreport ' . $_SERVER['DOCUMENT_ROOT'] . ' -I index.php';
$command = 'tree -f -D --noreport . -I index.php';
exec($command, $output);
echo '<pre class="terminal">';
echo '> tree -D --noreport ' . $mydir . "\n";
$firstLine = true;
foreach ($output as $line) {
	if ($firstLine) {
		$lastSpacePos = strrpos($line, ' ');
		$substringAfterLastSpace = substr($line, $lastSpacePos + 1);
		$substringBeforeLastSpace = substr($line, 0, $lastSpacePos);

		echo  htmlspecialchars($substringBeforeLastSpace);
		echo '<a class="navfile" href="/">' . $mydir . "</a>\n";
		$firstLine = false;
	} else {
		$lastSpacePos = strrpos($line, ' ');
		$lastSlashPos = strrpos($line, '/');
		$substringAfterLastSpace = substr($line, $lastSpacePos + 1);
		$substringAfterLastSlash = substr($line, $lastSlashPos + 1);
		$substringBeforeLastSpace = substr($line, 0, $lastSpacePos);
		echo htmlspecialchars($substringBeforeLastSpace) . 
			"<a class=\"navfile\" href=\"" . rtrim($substringAfterLastSpace, '.php') . "\">";
		echo htmlspecialchars(str_replace('.php', '.html', $substringAfterLastSlash)) . "</a>\n";
	}
}
echo '> <div class="blinking-text">' . '█' . "</div>\n";

echo '</pre>';

echo $mydir
?>
<?php $INCLUDE_HTML=false ?>
<?php endif; ?>