<?php
    namespace Flextype;
    use Flextype\Component\{Event\Event, Http\Http, Registry\Registry, Assets\Assets};
?>
<?php Assets::add('js', 'https://code.jquery.com/jquery-3.3.1.min.js', 'site', 1) ?>
<?php foreach(Assets::get('js', 'site') as $assets_by_priorities): ?>
    <?php foreach($assets_by_priorities as $assets): ?>
        <script src="<?= $assets['asset'] ?>"></script>
    <?php endforeach ?>
<?php endforeach ?>
<?php Event::dispatch('onThemeFooter') ?>
