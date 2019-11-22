<?php
function getQuestionsByCategoryId(PDO $db, int $categoryId): array
{
    $query = "
        SELECT q.id, q.titlle, q.author_id, u.username, c.name, q.created_on, COUNT(a.id) AS answers_count
        FROM questions AS q
        INNER JOIN users u ON q.author_id = u.id
        INNER JOIN categories c on q.category_id = c.id
        LEFT JOIN answers a on q.id = a.question_id
        WHERE c.id = ?
        GROUP BY q.id, q.titlle, q.author_id, u.username, c.name, q.created_on
        ORDER BY q.created_on DESC, answers_count DESC";

    $stmt = $db->prepare($query);
    $stmt->execute([$categoryId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

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