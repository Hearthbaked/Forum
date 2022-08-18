INSERT INTO `themen` (`id`, `titel`) VALUES (NULL, 'Katzen');
INSERT INTO `themen` (`id`, `titel`) VALUES (NULL, 'Hunde');

INSERT INTO `beitraege` (`id`, `thema_id`, `inhalt`, `zeitpunkt`, `autor`) VALUES (NULL, '1', 'Katzen sind tolle Tiere !\r\nDie besprechen wir hier.', current_timestamp(), 'Rémy');