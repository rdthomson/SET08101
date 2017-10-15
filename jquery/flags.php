<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Flags</title>
</head>
<body>
    <?php foreach(glob('./*.gif') as $image): ?>
	<div>
		<div><?php echo basename($image, '.gif'); ?></div>
		<img src="<?php echo $image; ?>" alt="<?php echo basename($image, '.gif'); ?> flag">
	</div>
    <?php endforeach; ?>
</body>
</html>
