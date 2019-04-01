SELECT COUNT(`id_sub`) AS `nb_susc`, FLOOR(SUM(`price`) / COUNT(`price`))
AS `av_susc`, (SUM(`duration_sub`) % 42) AS `ft` FROM `subscription`;
