<?php if (!empty($flashMessage)): ?>
    <div class="msg msg-<?= $flashMessage["type"]; ?> Flex">
        <div class="msg-content Flex">
            <i class="<?= $flashMessage["icon"] ?>"></i>
            <p>
                <?= $flashMessage["msg"]; ?>
            </p>
        </div>
        <button class="btn-close-msg Button Flex">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
<?php endif; ?>