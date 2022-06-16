<?php
use demo\functional\App;
?>
<head>
	<meta charset="utf-8">
	<base href="<?= App::urlbase(); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= App::siteTitle() ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	
	<link rel="apple-touch-icon" sizes="180x180" href="app/ui/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="app/ui/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="app/ui/images/favicon-16x16.png">
    <link rel="manifest" href="app/ui/images/site.webmanifest">    
    
    <style>
        .accordion-button-static
        {
            cursor: default !important;
        }
        .accordion-button-static table,
        .table-inputs
        {
            margin-bottom: 0rem !important;
        }
        .table-inputs tbody tr:first-of-type th
        {
            width: 20% !important;
        }
        .accordion-button-static::after
        {
            background-image: none;
        }
    </style>
</head>
