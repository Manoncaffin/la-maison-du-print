<body class="page-enter">
<?= snippet('header') ?>
<?= snippet('head') ?>
<?= css('assets/css/redirection.css') ?>


<main class="container_redirection page-enter">
    <div class="text-redirection">
        <p><?= $page->redirection_content()->kti() ?></p>
    </div>
</main>
<script src="<?= $site->url() ?>/assets/js/transition.js"></script>
</body>
<script>
    setTimeout(function() {
        window.location.href = "<?= url('home') ?>";
    }, 5000);
</script>
