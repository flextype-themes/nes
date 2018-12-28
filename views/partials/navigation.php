<?php
    namespace Flextype;
    use Flextype\Component\{Http\Http, Registry\Registry};
?>

<div class="header">
    <h1><?= Registry::get('settings.title') ?></h1>
    <h4><?= Registry::get('settings.description') ?></h4>
</div>

<section class="nes-container with-title">
    <h2 class="title">Navigation</h2>
    <div class="navigation">
        <?php foreach(Entries::getEntries('', 'slug') as $entry): ?>
            <?php if($entry['slug'] !== '404' && !(isset($entry['visibility']) && ($entry['visibility'] === 'draft' || $entry['visibility'] === 'hidden'))): ?>
                <a class="nes-btn <?php if(Http::getUriString() == $entry['slug']): ?> is-success <?php endif ?>" href="<?= $entry['url']; ?>"><?= $entry['title']; ?></a>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</section>
