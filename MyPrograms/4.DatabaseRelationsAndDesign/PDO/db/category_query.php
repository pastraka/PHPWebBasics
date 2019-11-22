<?php
function getAllCategories(PDO $db): array
{
    $query = "SELECT
         c.id, c.name, COUNT(q.id) AS questions_count
         FROM
         php_web_test.categories AS c
         LEFT JOIN
         questions AS q ON c.id = q.category_id 
         GROUP BY
         c.id, c.name
         ORDER BY questions_count DESC,
         c.name ";
    return $db->query($query)->fetchALL(PDO::FETCH_ASSOC);
}