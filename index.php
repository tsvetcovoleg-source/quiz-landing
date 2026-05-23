<?php
$games = [
    [
        'date' => '28 мая',
        'time' => '19:30',
        'title' => 'MindGames Quiz #1',
        'venue' => 'Центр, Кишинев',
        'price' => 'Условия участия уточняются при регистрации',
        'register' => '#register-form',
    ],
    [
        'date' => '2 июня',
        'time' => '19:30',
        'title' => 'MindGames Quiz #2',
        'venue' => 'Ботаника, Кишинев',
        'price' => 'Условия участия уточняются при регистрации',
        'register' => '#register-form',
    ],
    [
        'date' => '6 июня',
        'time' => '19:30',
        'title' => 'MindGames Quiz #3',
        'venue' => 'Рышкановка, Кишинев',
        'price' => 'Условия участия уточняются при регистрации',
        'register' => '#register-form',
    ],
];
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindGames Quiz — командные квизы в Кишиневе</title>
    <meta name="description" content="Квизы MindGames в Кишиневе: соберите команду 2–10 человек, выберите ближайшую игру в расписании и зарегистрируйтесь.">
    <style>
        :root {
            --bg: #120f2c;
            --bg-soft: #1b1740;
            --bg-section: #18143a;
            --surface: rgba(245, 240, 255, 0.9);
            --surface-soft: rgba(240, 233, 255, 0.72);
            --text: #f8f6ff;
            --muted: #cbc4ed;
            --card-text: #2a244a;
            --pink: #ff4fb0;
            --orange: #ff8f57;
            --violet: #7f62ff;
            --blue: #4a6dff;
            --yellow: #ffd971;
            --radius-lg: 24px;
            --radius-md: 18px;
            --radius-sm: 14px;
            --shadow-soft: 0 16px 34px rgba(17, 11, 49, 0.25);
            --shadow-lift: 0 24px 56px rgba(8, 5, 29, 0.34);
            --gradient-brand: linear-gradient(130deg, var(--pink), var(--orange) 32%, var(--violet) 70%, var(--blue));
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            font-family: Inter, Segoe UI, Roboto, Arial, sans-serif;
            color: var(--text);
            background: radial-gradient(circle at 15% -12%, rgba(255, 79, 176, 0.24), transparent 34%),
                        radial-gradient(circle at 90% 8%, rgba(127, 98, 255, 0.3), transparent 28%),
                        radial-gradient(circle at 70% 35%, rgba(74, 109, 255, 0.14), transparent 33%),
                        var(--bg);
            line-height: 1.6;
        }

        .container { width: min(1120px, 92vw); margin: 0 auto; }
        section { padding: 72px 0; }

        .hero {
            padding: 38px 0 88px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0));
        }
        .hero::before {
            content: "";
            position: absolute;
            inset: -120px auto auto -140px;
            width: 400px;
            aspect-ratio: 1;
            border-radius: 46% 54% 60% 40%;
            background: radial-gradient(circle at 30% 30%, rgba(255, 143, 87, 0.52), rgba(255, 79, 176, 0.28) 48%, transparent 76%);
            filter: blur(10px);
            z-index: -1;
        }
        .hero::after {
            content: "";
            position: absolute;
            inset: auto -220px -280px auto;
            width: 520px;
            aspect-ratio: 1;
            background: var(--gradient-brand);
            border-radius: 40% 60% 50% 50% / 55% 45% 55% 45%;
            opacity: 0.55;
            filter: blur(20px);
            z-index: -1;
        }

        .hero-grid { display: grid; gap: 28px; grid-template-columns: 1.2fr 1fr; align-items: center; }

        .label {
            display: inline-flex;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(242, 236, 255, 0.16);
            border: 1px solid rgba(255,255,255,0.22);
            font-weight: 600;
            font-size: .86rem;
        }

        h1, h2, h3 { margin: 0 0 14px; line-height: 1.13; letter-spacing: -0.01em; }
        h1 { font-size: clamp(2.1rem, 5vw, 3.7rem); max-width: 19ch; }
        h2 { font-size: clamp(1.6rem, 4vw, 2.6rem); }
        p { margin: 0 0 14px; color: var(--muted); max-width: 66ch; }

        .cta-row { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 24px; }
        .btn {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 52px;
            padding: 0 24px;
            border-radius: 16px;
            font-weight: 700;
            transition: .22s ease;
        }
        .btn-primary {
            background: var(--gradient-brand);
            color: #fff;
            box-shadow: 0 14px 30px rgba(255, 79, 176, 0.36);
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 18px 34px rgba(255, 79, 176, 0.4); }
        .btn-secondary {
            color: #fff;
            border: 1px solid rgba(255,255,255,0.3);
            background: rgba(242, 236, 255, 0.1);
        }
        .btn-secondary:hover { background: rgba(242, 236, 255, 0.18); transform: translateY(-1px); }

        .hero-card {
            border-radius: var(--radius-lg);
            background: linear-gradient(160deg, rgba(255,255,255,.24), rgba(255,255,255,.06));
            border: 1px solid rgba(255,255,255,.26);
            padding: 22px;
            box-shadow: var(--shadow-lift);
            backdrop-filter: blur(12px);
        }
        .hero-points { display: grid; grid-template-columns: repeat(2, minmax(0,1fr)); gap: 12px; }
        .point {
            padding: 14px;
            border-radius: var(--radius-sm);
            background: rgba(25, 20, 60, 0.46);
            border: 1px solid rgba(255,255,255,0.16);
            color: #fff;
            font-weight: 600;
            font-size: .95rem;
        }

        .panel {
            background: linear-gradient(160deg, var(--surface), var(--surface-soft));
            color: var(--card-text);
            border-radius: var(--radius-lg);
            padding: 26px;
            box-shadow: var(--shadow-soft);
            border: 1px solid rgba(255,255,255,0.35);
        }
        .grid-3 { display:grid; gap:16px; grid-template-columns: repeat(3,minmax(0,1fr)); }
        .grid-2 { display:grid; gap:16px; grid-template-columns: repeat(2,minmax(0,1fr)); }

        .hook { background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.015)); }
        .timeline { display:grid; gap:12px; margin-top:22px; }
        .timeline li {
            list-style:none;
            background: rgba(247, 242, 255, .1);
            border: 1px solid rgba(255,255,255,.16);
            border-radius: var(--radius-sm);
            padding: 12px 14px;
        }

        .card {
            border-radius: var(--radius-md);
            padding: 20px;
            background: linear-gradient(170deg, rgba(248, 244, 255, 0.98), rgba(238, 232, 255, 0.9));
            color: #1f1a3f;
            border: 1px solid rgba(255,255,255,0.5);
            box-shadow: 0 12px 26px rgba(25, 18, 63, 0.13);
        }

        .steps .card { position: relative; padding-top: 56px; min-height: 172px; }
        .steps .num {
            position: absolute;
            top: 16px;
            left: 16px;
            width: 34px;
            height: 34px;
            border-radius: 999px;
            display: grid;
            place-items: center;
            font-size: 12px;
            font-weight: 700;
            background: var(--gradient-brand);
            color: #fff;
            box-shadow: 0 8px 20px rgba(129, 95, 255, 0.3);
        }

        .gallery {
            display:grid;
            gap:12px;
            grid-template-columns: 2fr 1fr 1fr;
            grid-auto-rows: 160px;
        }
        .shot {
            border-radius: 16px;
            background: linear-gradient(145deg, rgba(255,255,255,.74), rgba(240, 232, 255, .66)), var(--gradient-brand);
            color: #211b43;
            padding: 16px;
            display:flex;
            align-items:flex-end;
            font-weight: 600;
            min-height: 160px;
        }
        .shot:first-child { grid-row: span 2; }

        #schedule { background: linear-gradient(180deg, rgba(255,79,176,.18), rgba(74,109,255,.14)); }
        .schedule-grid { display:grid; gap:14px; }
        .schedule-item {
            background: linear-gradient(160deg, rgba(248,244,255,0.98), rgba(238,232,255,0.92));
            color: #1d1840;
            border-radius: var(--radius-md);
            padding: 18px;
            display:grid;
            grid-template-columns: 1fr auto;
            gap: 10px 18px;
            align-items:center;
            border: 1px solid rgba(255,255,255,0.5);
            box-shadow: 0 14px 30px rgba(23, 16, 56, 0.15);
        }
        .schedule-meta { color:#5f5b7d; font-size:.95rem; }

        details {
            background: rgba(247,241,255,.1);
            border: 1px solid rgba(255,255,255,.2);
            border-radius: var(--radius-sm);
            padding: 12px 14px;
        }
        details + details { margin-top: 10px; }
        summary { cursor:pointer; font-weight:600; }

        .final-cta {
            background: var(--gradient-brand);
            border-radius: 28px;
            padding: 36px;
            color: #fff;
            text-align: center;
            box-shadow: var(--shadow-lift);
        }
        .footer { padding: 28px 0 86px; color:#a7a1cc; font-size:.92rem; }

        .sticky-mobile {
            display: none;
            position: fixed;
            left: 12px;
            right: 12px;
            bottom: 12px;
            z-index: 60;
        }

        @media (max-width: 960px) {
            .hero-grid, .grid-3, .grid-2, .gallery, .schedule-item { grid-template-columns: 1fr; }
            .hero { padding-top: 16px; }
            .shot:first-child { grid-row: span 1; min-height: 220px; }
            section { padding: 56px 0; }
            .sticky-mobile { display: block; }
        }
    </style>
</head>
<body>
<header class="hero">
    <div class="container hero-grid">
        <div>
            <span class="label">Командные квизы в Кишиневе</span>
            <h1>Квизы MindGames — вечер, где команда играет, спорит и ловит момент «Мы знаем ответ!»</h1>
            <p>Соберите 2–10 человек, выберите ближайшую игру в расписании и приходите за эмоциями, живым общением и интеллектуальным драйвом без ощущения экзамена.</p>
            <div class="cta-row">
                <a class="btn btn-primary" href="#schedule">Посмотреть расписание игр</a>
                <a class="btn btn-secondary" href="#how">Как проходит игра</a>
            </div>
        </div>
        <aside class="hero-card">
            <h3>Что вас ждет на игре</h3>
            <div class="hero-points">
                <div class="point">Вопросы, версии и обсуждение за столом</div>
                <div class="point">2 часа плотного темпа и вовлечения</div>
                <div class="point">Команда 2–10 человек</div>
                <div class="point">Регистрация заранее через расписание</div>
            </div>
        </aside>
    </div>
</header>

<section class="hook">
    <div class="container">
        <h2>Это больше, чем «просто вопросы»</h2>
        <p>Вы садитесь за стол, ведущий запускает раунд, появляются первые версии, кто‑то вспоминает странный факт, команда спорит, сдает ответ и взрывается эмоциями, когда попадает в точку.</p>
        <ul class="timeline">
            <li>Команда в сборе — вечер уже начинается по‑другому.</li>
            <li>Каждый раунд добавляет динамику: идеи, сомнения, внезапные инсайты.</li>
            <li>Даже если ошиблись — следующая возможность уже через минуту.</li>
            <li>Игра заканчивается с ощущением «Надо повторить».</li>
        </ul>
    </div>
</section>

<section>
    <div class="container grid-2">
        <div class="panel">
            <h2>Что такое квиз MindGames</h2>
            <p>Это командная интеллектуально-развлекательная игра с вопросами на логику, эрудицию, ассоциации и внимательность.</p>
            <p>Не нужно быть энциклопедией: важнее слышать друг друга, собирать версии и принимать решения вместе.</p>
            <p>Обычно игра длится около 2 часов. Участвуют команды от 2 до 10 человек. Команду нужно зарегистрировать заранее.</p>
        </div>
        <div class="panel">
            <h2>Почему это заходит</h2>
            <div class="grid-2">
                <article class="card">Легко собрать друзей или коллег после рабочего дня.</article>
                <article class="card">Вечер не сводится к обычным посиделкам — вы постоянно в процессе.</article>
                <article class="card">Можно играть без специальной подготовки.</article>
                <article class="card">Командный формат держит вовлечение до финала.</article>
            </div>
        </div>
    </div>
</section>

<section id="how">
    <div class="container">
        <h2>Как проходит игра</h2>
        <div class="grid-3 steps">
            <article class="card"><span class="num">1</span>Собираете команду 2–10 человек.</article>
            <article class="card"><span class="num">2</span>Выбираете ближайшую игру в расписании.</article>
            <article class="card"><span class="num">3</span>Регистрируете команду.</article>
            <article class="card"><span class="num">4</span>Приходите в указанное место и время.</article>
            <article class="card"><span class="num">5</span>Играете около 2 часов, обсуждаете и отвечаете.</article>
            <article class="card"><span class="num">6</span>Получаете результат, эмоции и повод прийти снова.</article>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h2>Атмосфера MindGames</h2>
        <p>Живые командные вечера: обсуждения, смех, ответы на бланках и тот самый азарт после удачного раунда.</p>
        <div class="gallery">
            <div class="shot">Команды за столами и активное обсуждение в каждом раунде.</div>
            <div class="shot">Ведущий задает темп игре.</div>
            <div class="shot">Бланки и быстрые решения.</div>
            <div class="shot">Эмоции после правильных ответов.</div>
            <div class="shot">Городская вечерняя атмосфера.</div>
        </div>
    </div>
</section>

<section id="schedule">
    <div class="container">
        <h2>Ближайшие игры и регистрация команд</h2>
        <p>Выберите удобную дату, соберите команду и переходите к регистрации.</p>
        <div class="schedule-grid">
            <?php foreach ($games as $game): ?>
                <article class="schedule-item">
                    <div>
                        <h3><?= htmlspecialchars($game['title']) ?></h3>
                        <div class="schedule-meta">
                            <?= htmlspecialchars($game['date']) ?> · <?= htmlspecialchars($game['time']) ?> · <?= htmlspecialchars($game['venue']) ?><br>
                            <?= htmlspecialchars($game['price']) ?>
                        </div>
                    </div>
                    <a class="btn btn-primary" href="<?= htmlspecialchars($game['register']) ?>">Зарегистрировать команду</a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section>
    <div class="container grid-2">
        <div class="panel">
            <h2>Подходит для друзей и коллег</h2>
            <p>MindGames — формат, который удобно делать регулярной традицией: встречаться командами после работы, выбираться компанией друзей и проводить вечер, в котором постоянно что-то происходит.</p>
            <a class="btn btn-primary" href="#schedule">Выбрать игру в расписании</a>
        </div>
        <div>
            <h2>FAQ</h2>
            <details><summary>Нужно ли быть очень эрудированным?</summary><p>Нет. Главное — командная логика, обсуждение и внимательность.</p></details>
            <details><summary>Сколько человек может быть в команде?</summary><p>От 2 до 10 человек.</p></details>
            <details><summary>Сколько длится игра?</summary><p>Обычно около 2 часов.</p></details>
            <details><summary>Как зарегистрировать команду?</summary><p>Выберите игру в расписании и нажмите кнопку регистрации рядом с ней.</p></details>
            <details><summary>Можно ли прийти без опыта?</summary><p>Да, специальная подготовка не нужна.</p></details>
            <details><summary>Что нужно брать с собой?</summary><p>Команду и хорошее настроение — остальное объяснит ведущий на месте.</p></details>
            <details><summary>Где проходят игры?</summary><p>Локация указана в карточке каждой игры в расписании.</p></details>
        </div>
    </div>
</section>

<section>
    <div class="container final-cta" id="register-form">
        <h2>Соберите команду и приходите играть в MindGames</h2>
        <p style="color: rgba(255,255,255,.92);">Выберите ближайшую игру в расписании, зарегистрируйте команду и превратите обычный вечер в событие.</p>
        <div class="cta-row" style="justify-content:center;">
            <a class="btn btn-secondary" href="#schedule">Перейти к расписанию</a>
        </div>
    </div>
</section>

<a class="btn btn-primary sticky-mobile" href="#schedule">Выбрать игру</a>

<footer class="footer">
    <div class="container">© <?= date('Y') ?> MindGames Quiz, Кишинев.</div>
</footer>
</body>
</html>
