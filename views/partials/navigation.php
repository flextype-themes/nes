<?php
    namespace Flextype;
    use Flextype\Component\{Http\Http, Registry\Registry};
?>

<div class="header">
    <h1><?= Registry::get('settings.title') ?></h1>
    <h4><?= Registry::get('settings.description') ?></h4>
</div>

<section class="container with-title">
    <h2 class="title">Navigation</h2>
    <div class="navigation">
        <?php foreach(Content::getPages('', false, 'slug') as $page): ?>
            <?php if($page['slug'] !== '404' && !(isset($page['visibility']) && ($page['visibility'] === 'draft' || $page['visibility'] === 'hidden'))): ?>
                <a class="btn <?php if(Http::getUriString() == $page['slug']): ?> is-success <?php endif ?>" href="<?= Http::getBaseUrl().'/'.$page['slug']; ?>"><?= $page['title']; ?></a>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</section>
