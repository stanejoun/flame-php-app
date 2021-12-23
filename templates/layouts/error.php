<!DOCTYPE html>
<html lang="<?= \Stanejoun\OPFramework\Lang::$PRIMARY; ?>">
    <head>
        <title>
            <?= $this->getBlock('title'); ?>
		</title>
        <meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="">
        <link rel="shortcut icon" href="/favicon.ico">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <section id="container" class="container-fluid">
            <?= $this->getBlock('content'); ?>
		</section>
        <?= $this->getBlock('script'); ?>
    </body>
</html>