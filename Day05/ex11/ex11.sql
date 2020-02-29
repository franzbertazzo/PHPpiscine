SELECT
  UPPER(A.last_name) as NAME,
  A.first_name,
  C.price
FROM
  user_card A
  inner join `member` B on A.id_user = B.id_member
  inner join subscription C on B.id_sub = C.id_sub
WHERE
  C.price > 42
ORDER BY
  A.last_name,
  A.first_name;
