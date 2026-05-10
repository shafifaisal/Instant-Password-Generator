<?php
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, max-age=0');

$articleDir = __DIR__ . DIRECTORY_SEPARATOR . 'article';
$articles = [];

function getArticleTitle($articleFile, $filename)
{
    $html = file_get_contents($articleFile);

    if ($html !== false && preg_match('/<h1\b[^>]*>(.*?)<\/h1>/is', $html, $matches)) {
        return trim(html_entity_decode(strip_tags($matches[1]), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    }

    if ($html !== false && preg_match('/<title\b[^>]*>(.*?)<\/title>/is', $html, $matches)) {
        $title = trim(html_entity_decode(strip_tags($matches[1]), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
        return trim(preg_replace('/\s*\|\s*iPassGenerator\s*$/i', '', $title));
    }

    return ucwords(str_replace('-', ' ', pathinfo($filename, PATHINFO_FILENAME)));
}

foreach (glob($articleDir . DIRECTORY_SEPARATOR . '*.html') ?: [] as $articleFile) {
    $filename = basename($articleFile);
    $createdAt = filectime($articleFile);

    $articles[] = [
        'filename' => $filename,
        'title' => getArticleTitle($articleFile, $filename),
        'createdAt' => $createdAt * 1000,
        'year' => date('Y', $createdAt),
        'dateLabel' => date('d, M', $createdAt),
    ];
}

usort($articles, function ($a, $b) {
    return $b['createdAt'] <=> $a['createdAt'];
});

echo json_encode($articles, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
