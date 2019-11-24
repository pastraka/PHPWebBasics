<?php

function answer(PDO $db, int $questionId, int $userId, string $body)
{
    $query = "INSERT INTO answers(body, author_id, question_id) VALUES (?, ?, ?);";
    $stmt = $db->prepare($query);
    $stmt->execute([$body, $userId, $questionId]);
}

function getAnswerByQuestionId(PDO $db, int $questionsId): array
{
    $query = "
    SELECT a.id, a.body, a.created_on, u.username AS 'author_name'
    FROM answers AS a
    INNER JOIN users u on a.author_id = u.id
    WHERE a.question_id = ?
    ORDER BY 
    a.created_on DESC,  a.id";


    $stmt = $db->prepare($query);
    $stmt->execute([$questionsId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}