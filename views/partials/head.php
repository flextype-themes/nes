<?php
    namespace Flextype;
    use Flextype\Component\{Event\Event, Http\Http, Registry\Registry, Assets\Assets, Text\Text, Html\Html};
?>
<!doctype html>
<html lang="<?= Registry::get('settings.locale') ?>">
  <head>
    <meta charset="<?= Text::lowercase(Registry::get('settings.charset')) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= (isset($page['description']) ? Html::toText($page['description']) : Html::toText(Registry::get('settings.description'))) ?>">
    <meta name="keywords" content="<?= (isset($page['keywords']) ? $page['keywords'] : Registry::get('settings.keywords')) ?>">
    <meta name="robots" content="<?= (isset($page['robots']) ? $page['robots'] : Registry::get('settings.robots')) ?>">
    <meta name="generator" content="Powered by Flextype <?= Flextype::VERSION; ?>" />

	<?php Event::dispatch('onThemeMeta'); ?>

	<title><?= Html::toText($page['title']); ?> | <?= Html::toText(Registry::get('settings.title')) ?></title>

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>

    <?php Assets::add('css', 'https://unpkg.com/nes.css/css/nes.min.css', 'site', 1) ?>
    <?php Assets::add('css', Http::getBaseUrl() . '/site/themes/' . Registry::get('settings.theme') . '/assets/css/theme.css', 'site', 2) ?>
    <?php foreach(Assets::get('css', 'site') as $assets_by_priorities): ?>
        <?php foreach($assets_by_priorities as $assets): ?>
            <link href="<?= $assets['asset']; ?>" rel="stylesheet">
        <?php endforeach ?>
    <?php endforeach ?>

    <?php Event::dispatch('onThemeHeader') ?>
  </head>
  <body>
  <?php Themes::view('partials/navigation')->display() ?>
  <main role="main" class="container content">
