SELECT
  A.id_genre,
  B.name AS 'name_genre',
  A.id_distrib,
  C.name AS 'name_distrib',
  A.title AS 'title_film'
FROM
  film A
  LEFT JOIN genre B on A.id_genre = B.id_genre
  LEFT JOIN distrib C on A.id_distrib = C.id_distrib
WHERE
  A.id_genre BETWEEN 4 AND 8;
