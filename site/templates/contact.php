<body class="page-enter">
    <?= snippet('header') ?>
    <?= snippet('head') ?>

    <?php
    function translateDay($day)
    {
        $translation = [
            'monday' => 'lundi',
            'tuesday' => 'mardi',
            'wednesday' => 'mercredi',
            'thursday' => 'jeudi',
            'friday' => 'vendredi',
            'lundi' => 'monday',
            'mardi' => 'tuesday',
            'mercredi' => 'wednesday',
            'jeudi' => 'thursday',
            'vendredi' => 'friday',
        ];
        return $translation[$day] ?? $day;
    }
    ?>

    <main>

        <?php $contact = page('contact'); ?>

        <?php
        // Fonction pour traduire le jour dynamiquement
        function getTranslatedDay($day)
        {
            return t('days.' . $day);
        }
        ?>


        <div class="title-page">
            <h2><?php echo t('contact_title'); ?></h2>
            <div class="border"></div>
        </div>

        <section class="container_contact">
            <div class="address">
                <h3>La Maison du print</h3>
                <?php foreach ($contact->address()->toStructure() as $address) : ?>
                    <p id="address-<?= $address->index() ?>" data-id="address-<?= $address->index() ?>"><?= $address->number()->kti() ?> <?= $address->street()->kti() ?></p>
                    <p><?= $address->zipcode()->kti() ?> <?= $address->city()->kti() ?></p>
                <?php endforeach ?>
                <div class="contact">
                    <p><a href="mailto:<?= $contact->email() ?>"><?= $contact->email() ?></a></p>
                    <p><?= $contact->tel() ?></p>
                </div>
            </div>

            <!-- Horaires -->

            <article class="opening-hours">
                <h3><?php echo t('opening_hours_title'); ?></h3>
                <ul>
                <?php
                    if ($contact->open()->isNotEmpty()):
                        foreach ($contact->open()->toStructure() as $entry):
                            var_dump($entry->day()->value()); 
                            // Accès aux jours traduits via la fonction 'translateDay'
                            $translatedDay = t('days.' . translateDay($entry->day()->value()));
                            $startTime = str_replace(":", "h", $entry->time_start()->toDate('H:i'));
                            $endTime = str_replace(":", "h", $entry->time_end()->toDate('H:i'));
                    ?>
                            <li>
                                <strong><?= $translatedDay ?>:</strong>
                                <?= $startTime ?> - <?= $endTime ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </article>



            <!-- Règlement -->
            <?php if ($contact->buy()->isNotEmpty()): ?>
                <article class="payment-info">
                    <h3><?php echo t('payment_title'); ?></h3>
                    <p><?= $contact->buy()->kti() ?></p>
                </article>
            <?php endif; ?>

            <!-- Envoi -->
            <?php if ($contact->send()->isNotEmpty()): ?>
                <article class="shipping-info">
                    <h3><?php echo t('shipping_title'); ?></h3>
                    <p><?= $contact->send()->kti() ?></p>
                </article>
            <?php endif; ?>

            <!-- Clients -->
            <?php if ($contact->clients()->isNotEmpty()): ?>
                <article class="clients">
                    <h3><?php echo t('clients_title'); ?></h3>
                    <?php foreach ($contact->clients()->toStructure() as $client): ?>
                        <div class="client-item">
                            <p class="client-name"><?php echo $client->client(); ?></p>
                            <div class="client-logo-container">
                                <!-- Utilisation d'une classe personnalisée pour chaque image -->
                                <img src="<?php echo $client->link()->toFile()->url(); ?>" class="client-logo <?php echo 'client-logo-' . $client->client()->slug(); ?>" />
                            </div>
                        </div>
                    <?php endforeach; ?>
                </article>
            <?php endif; ?>


            <!-- Réseaux sociaux -->
            <?php if ($contact->networks()->isNotEmpty()): ?>
                <article class="networks">
                    <h3><?php echo t('social_networks_title'); ?></h3>
                    <ul>
                        <?php foreach ($contact->networks()->toStructure() as $network): ?>
                            <li>
                                <a href="<?= $network->link()->html() ?>" target="_blank">
                                    <?= $network->network()->html() ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                <?php endif; ?>

                <!-- Bons plans -->
                <article class="partners">
                    <h3><?php echo t('partners_title'); ?></h3>
                    <p><?php echo t('partners_description'); ?>
                        <span id="selected-partner"><?php echo t('partners_select_option'); ?></span>
                    </p>
                    <ul id="partners-list" style="display: none;">
                        <?php if ($contact->partners()->isNotEmpty()): ?>
                            <?php foreach ($contact->partners()->toStructure() as $partner): ?>
                                <li>
                                    <a href="<?= $partner->link()->html() ?>"
                                        data-partner="<?= $partner->network()->html() ?>"
                                        target="_blank">
                                        <?= $partner->network()->html() ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </article>
                </article>
        </section>
    </main>

    <?= snippet('footer') ?>
    <script src="<?= url('assets/js/select-option.js') ?>"></script>
    <script src="<?= url('assets/js/transition.js') ?>"></script>
</body>