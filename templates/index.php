<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<?php foreach ($css as $key => $value): ?>
		<link rel="stylesheet" href="css/<?php echo $value['file'] ?>" media="<?php echo $value['media'] ?>">
	<?php endforeach ?>
</head>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <ul class="tabs">
          <li class="active"><a href="#">Anúncios</a></li>
          <li><a href="#">Postar Anúncio</a></li>
          <div class="pull-right">
            Olá <i><?php echo $use ?></i>
          </div>
        </ul>
        
    </div>
    <?php include $content ?>
</div>
</body>
</html>