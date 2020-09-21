<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>
<nav class="header">
  <ul>
<?php
$thisPath = $c->getCollectionPath();
$home = Page::getByID(Page::getHomePageID());
display($home, $thisPath);
$children = $home->getCollectionChildren();
foreach ($children as $child) {
  display($child, $thisPath);
}


function startsWith ($string, $prefix) 
{ 
  return (substr($string, 0, strlen($prefix)) === $prefix); 
}

function display($page, $herePath) {
  if ($page->getAttribute('exclude_nav')) return;
  $title = $page->getAttribute('meta_title');
  if ($title) $title = ' title="'.$title.'"';
  $class = '';
  $path = $page->getCollectionPath();
  echo "\n<!-- $herePath $path -->";
  if (!$path) $class .= 'home';
  else if (startsWith($herePath, $path)) $class .= 'here';
  if($class) $class=' class="'.trim($class).'"';
  echo '
<li'.$class.'><a href="'.$page->getCollectionLink().'"'.$title.'>'.$page->getCollectionName().'</a></li>
';
}
?>
  </ul>
</nav>

