<?= snippet('header') ?>
<?= snippet('head') ?>

<body>
    <main>

        <?php $contact = page('contact'); ?>

        <?php
        // Tableau de correspondance pour les jours en français
        $daysInFrench = [
            'monday'    => 'Lundi',
            'tuesday'   => 'Mardi',
            'wednesday' => 'Mercredi',
            'thursday'  => 'Jeudi',
            'friday'    => 'Vendredi',
            'saturday'  => 'Samedi',
            'sunday'    => 'Dimanche'
        ];
        ?>

        <div class="title-page">
            <h1>CONTACT ET INFOS PRATIQUES</h1>
            <div class="border"></div>
        </div>

        <section class="container_contact">
            <div class="address">
                <h2>La Maison du print</h2>
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
            <?php if ($contact->open()->isNotEmpty()): ?>
                <article class="opening-hours">
                    <h2>Horaires et jours d'ouverture</h2>
                    <ul>
                        <?php foreach ($contact->open()->toStructure() as $entry): ?>
                            <?php
                            // Traduction du jour en français
                            $dayInFrench = $daysInFrench[$entry->day()->value()] ?? $entry->day()->value();
                            ?>
                            <li>
                                <strong><?= $dayInFrench ?>:</strong>
                                <?= $entry->time_start()->toDate('H:i') ?> - <?= $entry->time_end()->toDate('H:i') ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            <?php endif; ?>

            <!-- Règlement -->
            <?php if ($contact->buy()->isNotEmpty()): ?>
                <article class="payment-info">
                    <h2>Règlement</h2>
                    <p><?= $contact->buy()->kti() ?></p>
                </article>
            <?php endif; ?>

            <!-- Envoi -->
            <?php if ($contact->send()->isNotEmpty()): ?>
                <article class="shipping-info">
                    <h2>Envoi</h2>
                    <p><?= $contact->send()->kti() ?></p>
                </article>
            <?php endif; ?>

            <!-- Clients -->
            <?php if ($contact->clients()->isNotEmpty()): ?>
                <article class="clients">
                    <h2>Ils·elles ont fait confiance à La Maison du print</h2>
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
                    <h2>Vous pouvez me retrouver sur ces réseaux</h2>
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
                <h2>La Maison du print partage ses bons plans !</h2>
                <p>
                    Cliquez ici si vous cherchez
                    <span id="selected-partner">[sélectionnez une option]</span>
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
</body>
<script src="<?= $site->url() ?>/assets/js/select-option.js"></script>