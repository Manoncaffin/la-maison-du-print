<?= snippet('header') ?>
<?= snippet('head') ?>

<main class="container_contact">
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
    
    <div class="public">
        <p><?= $contact->about()->kti() ?></p>
    </div>

    <div class="address">
        <p>La Maison du print</p>
        <?php foreach ($contact->address()->toStructure() as $address) : ?>
            <p id="address-<?= $address->index() ?>" data-id="address-<?= $address->index() ?>"><?= $address->number()->kti() ?> <?= $address->street()->kti() ?> <?= $address->zipcode()->kti() ?> <?= $address->city()->kti() ?></p>
        <?php endforeach ?>
    </div>

    <div class="contact">
        <p><?= $contact->tel() ?></p>
        <p><a href="mailto:<?= $contact->email() ?>"><?= $contact->email() ?></a></p>
    </div>

    <!-- Horaires -->
    <?php if ($contact->open()->isNotEmpty()): ?>
        <section class="opening-hours">
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
        </section>
    <?php endif; ?>

    <!-- Règlement -->
    <?php if ($contact->buy()->isNotEmpty()): ?>
        <section class="payment-info">
            <h2>Règlement</h2>
            <p><?= $contact->buy()->kti() ?></p>
        </section>
    <?php endif; ?>

    <!-- Envoi -->
    <?php if ($contact->send()->isNotEmpty()): ?>
        <section class="shipping-info">
            <h2>Envoi</h2>
            <p><?= $contact->send()->kti() ?></p>
        </section>
    <?php endif; ?>

    <!-- Bons plans -->
<?php if ($contact->partners()->isNotEmpty()): ?>
    <section class="partners">
        <h2>Bons plans</h2>
        <ul>
            <?php foreach ($contact->partners()->toStructure() as $partner): ?>
                <li>
                    <strong><?= $partner->network()->html() ?></strong>: 
                    <a href="<?= $partner->link()->html() ?>" target="_blank"><?= $partner->link()->html() ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>

<!-- Réseaux sociaux -->
<?php if ($contact->networks()->isNotEmpty()): ?>
    <section class="networks">
        <h2>Réseaux sociaux</h2>
        <ul>
            <?php foreach ($contact->networks()->toStructure() as $network): ?>
                <li>
                    <strong><?= $network->network()->html() ?></strong>: 
                    <a href="<?= $network->link()->html() ?>" target="_blank"><?= $network->link()->html() ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>

</main>

<?= snippet('footer') ?>
