<?php $pager->setSurroundCount(3) ?>

<div class="d-inline-block float-right">
    <ul class="pagination pagination-rounded mb-0">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="Previous">
                    <i class="mdi mdi-chevron-left"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item">
                <a class="page-link <?= $link['active'] ? 'active' : '' ?>" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>
        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="Next">
                    <i class="mdi mdi-chevron-right"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</div>