<?= snippet('header') ?>
<?= snippet('head') ?>
<?= css('assets/css/redirection.css') ?>


<main class="container_redirection">
    <div class="text-redirection">
        <p><?= $page->redirection_content()->kti() ?></p>
    </div>
</main>

<!-- <script>
    setTimeout(function() {
        window.location.href = "<?= url('home') ?>";
    }, 5000);
</script> -->
