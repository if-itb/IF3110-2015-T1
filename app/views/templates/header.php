<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple StackExchange</title>

    <!-- Main style -->
    <link rel="stylesheet" href="<?= ROOT_URL; ?>/css/style.css">

    <!-- Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:800italic,300,400,400italic,600,700' rel='stylesheet' type='text/css'>
</head>
<body>

    <div class="outer-container">
        
        <header class="main-title">
            <h1><a href="<?= ROOT_URL; ?>">Stack<span>Exchange</span></a></h1>
        </header>

        <form action="<?= ROOT_URL; ?>" method="GET" id="searchForm">
            <input type="text" name="s" placeholder="Search...">
            <input type="submit" class="btn-submit"value="Search">
        </form>

        <p class="ask-here">Can't find what you are looking for? <a href="<?= ROOT_URL; ?>/question/add" class="ask-here-link">Ask here</a></p>
