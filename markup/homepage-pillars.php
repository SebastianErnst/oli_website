<?php

$sectionHeadline = <<<EOF
Säulen
EOF;

$introText = <<<EOF
Ex-Pain ist unser Konzept für ein schmerzfreieres Leben.
Dabei greifen vier Schwerpunkte ineinander.
EOF;


// Pillar 1 ////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pillars = [];
$pillars[] = [
    "intro" => 'Das Tolle ist, es passt eigent&shylich immer',
    "headline" => 'Live-Training',
    "subHeadline" => 'Das Tolle ist, es passt eigentlich immer',
    "text" => [
        'Online',
        '20 Minuten pro Training',
        'mit effizienten Methoden zu einem starken Rücken',
        'Motivation durch Gruppendynamik'
    ],
    "image" => PILLAR_IMG_1
];

// Pillar 2 ////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pillars[] = [
    "intro" => 'Jeder braucht sein eigenes Tempo',
    "headline" => 'Video-Training',
    "subHeadline" => 'Jeder braucht sein eigenes Tempo',
    "text" => [
        'Trainiere immer und überall so, wie es dir zeitlich passt',
        'Wiederholungen des Live-Trainings und Vertiefungen zur persönlichen Trainingsoptimierung',
        'Flexibel bis ins Detail'
    ],
    "image" => PILLAR_IMG_2
];


// Pillar 3 ////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pillars[] = [
    "intro" => 'Oft fehlen wichtige Hintergrund&shy;informationen',
    "headline" => 'Akademie',
    "subHeadline" => 'Oft fehlt wichtiges Grundwissen',
    "text" => [
        'Experten-Wissen rund um die Themen Schmerzen und Gesundheit ',
        'Anwendbares Wissen auf dem aktuellsten Stand',
        'Grundlagen für einen langfristig gesunden Rücken und weniger Schmerzen allgemein'
    ],
    "image" => PILLAR_IMG_3
];


// Pillar 4 ////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pillars[] = [
    "intro" => 'Gesunder Körper, gesunder Geist... ist klar, oder?',
    "headline" => 'Innere Stärke',
    "subHeadline" => 'Gesunder Körper, gesunder Geist... ist klar, oder?',
    "text" => [
        'Coaching',
        'Psychologische Grundlagen für einen gesunden Körper',
        'Lerne deinen "inneren-Stärke-Muskel" zu trainieren',
        'Alles geht besser ohne Schmerzen'
    ],
    "image" => PILLAR_IMG_4
];

?>

<section id="saeulen" class="homepage-pillars-section section-dark additional-content">
    <div class="inner-wrapper">
        <h2>Säulen</h2>
        <p class="keymessage"><?php echo $introText; ?></p>
        <div class="pillars">
            <ul class="pillars-list">
                <?php for ($i = 0; $i < count($pillars); $i++): ?>
                <li class="pillars-list-item">
                    <div class="pillar">
                        <span class="sub-heading"><?php echo htmlspecialchars($pillars[$i]['subHeadline']); ?></span>
                        <div class="image" style="background-image: url(<?php echo $pillars[$i]['image']; ?>)">
                            <div class="icon icon-play"></div>
                        </div>
                        <h3 class="h2"><?php echo $pillars[$i]['headline']; ?></h3>
                        <ul class="info-list">
                            <?php for ($j = 0; $j < count($pillars[$i]['text']); $j++): ?>
                                <li><?php echo $pillars[$i]['text'][$j]; ?></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </li>
                <?php endfor; ?>
            </ul>
        </div>
        <a href="./ueber-ex-pain" class="button">
            <span>
                Mehr erfahren
            </span>
        </a>
    </div>
</section>