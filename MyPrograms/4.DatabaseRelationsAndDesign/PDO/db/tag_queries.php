<?php
function getAllTags(PDO $db): array
{
    $query = "
    SELECT t.id, t.name, COUNT(q.id) AS 'questions_count'
    FROM questions_tags AS qt
    INNER JOIN tags t on qt.tag_id = t.id
    INNER JOIN questions q on qt.question_id = q.id
    GROUP BY t.id, t.name
    ORDER BY questions_count DESC, t.name
    ";

    return $db->query($query)->fetchAll(PDO::FETCH_ASSOC);

}